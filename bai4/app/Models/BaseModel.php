<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $conn = null; //Đối tượng kết nối CSDL
    protected $table = ""; //tên bảng dữ liệu
    protected $primaryKey = "id"; //khóa chính
    protected $sqlBuilder; //Câu lệnh sql

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
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
}
