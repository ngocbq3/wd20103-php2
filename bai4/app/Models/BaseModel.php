<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $conn = null; //Đối tượng kết nối CSDL
    protected $table = ""; //tên bảng dữ liệu
    protected $primaryKey = "id"; //khóa chính
    protected $sqlBuilder; //Câu lệnh sql
    protected $params = []; //Chứa các tham số cho câu lệnh SQL

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=utf8; port=" . PORT, USERNAME, PASSWORD);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    //Hàm all dùng để lấy toàn bộ dữ liệu của 1 bảng
    public static function all()
    {
        $model = new static;
        $sql = "SELECT * FROM {$model->table}";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    /**
     * @method find: lấy ra 1 bản ghi theo khóa chính
     * @param $id: giá trị của khóa cần lấy
     */
    public static function find($id)
    {
        $model = new static;
        $sql = "SELECT * FROM {$model->table} WHERE 
                    {$model->primaryKey} = :{$model->primaryKey}";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute(["{$model->primaryKey}" => $id]); //truyền id vào tham số
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result[0] ?? null;
    }

    /**
     * @method select: lựa chọn các cột muốn lấy ra
     * @param $columns: tham số là các tên cột của bảng
     */
    public static function select(...$columns)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT ";
        //Chuyển mảng columns thành chuỗi được phân tách mỗi phần tử bởi dấu ,
        $columns = implode(', ', $columns);

        //Nối chuỗi các phẩn tử cột vào câu lệnh
        $model->sqlBuilder .= $columns . " FROM {$model->table} ";
        return $model;
    }

    /**
     * @method join: dùng để nối bảng
     * @param $tableName: bảng cần join
     * @param $refKey: khóa ngoại
     */
    public function join($tableName, $refKey)
    {
        $this->sqlBuilder .= " JOIN {$tableName} 
            ON {$this->table}.{$this->primaryKey}={$tableName}.{$refKey}";
        return $this;
    }

    /**
     * @method get: thực thi và trả về dữ liệu của lệnh SQL Select
     */
    public function get()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute($this->params);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    /**
     * @method orderBy: phương thức để sắp xếp dữ liệu
     * @param @name: tên cột
     * @param @sort: điều kiện sắp xếp
     */
    public function orderBy($name, $sort = 'ASC')
    {
        $this->sqlBuilder .= " ORDER BY $name $sort";
        return $this;
    }
    /**
     * @method limit: hạn chế cố lượng bạn ghi lấy ra
     * @param $limit: số lượng bản ghi
     */
    public function limit($limit = 10)
    {
        $this->sqlBuilder .= " LIMIT $limit ";
        return $this;
    }
    /**
     * @method where: điều kiện
     * @param $column: tên cột
     * @param $operator: toán tử điều kiện
     * @param $value: giá trị
     */
    public function where($column, $operator, $value)
    {
        $this->sqlBuilder .= " WHERE `{$column}` $operator :{$column}";
        //Thêm dữ liệu vào thuộc params
        $this->params["$column"] = $value;

        return $this;
    }

    /**
     * @method andWhere: thêm điều kiện AND
     * @param $column: tên cột
     * @param $operator: toán tử điều kiện
     * @param $value: giá trị
     */
    public function andWhere($column, $operator, $value)
    {
        $this->sqlBuilder .= " AND `{$column}` $operator :{$column}";
        //Thêm dữ liệu vào thuộc params
        $this->params["$column"] = $value;
        return $this;
    }

    /**
     * @method orWhere: thêm điều kiện OR
     * @param $column: tên cột
     * @param $operator: toán tử điều kiện
     * @param $value: giá trị
     */
    public function orWhere($column, $operator, $value)
    {
        $this->sqlBuilder .= " OR `{$column}` $operator :{$column}";
        //Thêm dữ liệu vào thuộc params
        $this->params["$column"] = $value;
        return $this;
    }

    /**
     * @method create: thêm 1 bản ghi mới
     * @param $data: là 1 mảng dữ liệu bao gồm có key: tên cột và value
     */
    public static function create($data)
    {
        $model = new static;
        $sql = "INSERT INTO $model->table(";

        $columnNames = ""; //Danh sách các cột
        $params = ""; //Danh sách các tham số
        foreach ($data as $key => $value) {
            $columnNames .= " `{$key}`, ";
            $params .= " :{$key}, ";
        }
        //Xóa dấu , ở cuối các chuỗi
        $columnNames = rtrim($columnNames, ", ");
        $params = rtrim($params, ", ");

        //Nối vào câu lệnh SQL
        $sql .= $columnNames . ") VALUES (" . $params . ")";

        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);
        return $model->conn->lastInsertId();
    }
}
