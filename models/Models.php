<?php
namespace Models;

use App\QueryBuilder;
use Exception;
use PDO;

abstract class Models extends QueryBuilder
{
    protected string $table;
    protected array $fillable;
    private PDO $conn;
    public function __construct()
    {
        parent::__construct($this->table, $this->fillable);
        $this->conn = Database::connection();
    }

    public function insert($data)
    {
        if ($data === null || empty($data) || !isset($data)) {
            throw new Exception("Error No data for insert");
        }
        $data = array_intersect_key($data, array_flip($this->fillable));
        $query = $this->queryInsert();
        $stmt = $this->conn->prepare($query);
        foreach ($data as $key => $valeu) {
            if (is_string($valeu)) {
                $stmt->bindValue(":$key", $valeu, PDO::PARAM_STR);
            }
            if (is_int($valeu)) {
                $stmt->bindValue(":$key", $valeu, PDO::PARAM_INT);
            }
        }
        $stmt->execute();
    }
    public function select(): array
    {
        $query = $this->querySelectAll();
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function update(array $data, $id)
    {
        if ($data === null || empty($data) || !isset($data)) {
            throw new Exception("Error No data for update");
        }
        $data = array_intersect_key($data, array_flip($this->fillable));
        $query = $this->queryUpdate($data, $id);
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        foreach ($data as $key => $valeu) {
            if (is_string($valeu)) {
                $stmt->bindValue(":$key", $valeu, PDO::PARAM_STR);
            }
            if (is_int($valeu)) {
                $stmt->bindValue(":$key", $valeu, PDO::PARAM_INT);
            }
        }
        $stmt->execute();
    }
    public function delete($id)
    {
        $query = $this->queryDelete($id);
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
