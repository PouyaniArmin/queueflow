<?php

namespace App;

use Exception;

class QueryBuilder
{
    private ?array $fillable;
    private ?string $table;
    public function __construct(string $table, array $fillable)
    {
        $this->table = $table;
        $this->fillable = $fillable;
    }
    protected function queryInsert(): string
    {
        $this->checkFillable();
        $query = "INSERT INTO {$this->table} ({$this->columnList()}) 
                    VALUES ({$this->placeholder()})";
        return $query;
    }
    protected function querySelectAll(): string
    {
        $query = "SELECT * FROM {$this->table}";
        return $query;
    }
    protected function queryFindOneBY(string $param)
    {
        $query = "SELECT * FROM {$this->table} WHERE $param=:$param";
        return $query;
    }
    protected function queryUpdate(array $data): string
    {
        $keys = $this->columnListUpdate($data);
        $query = "UPDATE {$this->table} SET {$keys} WHERE id=:id";
        return $query;
    }

    protected function queryDelete(): string
    {
        $query = "DELETE FROM {$this->table} WHERE id=:id";
        return $query;
    }
    private function columnListUpdate(array $data)
    {
        $keys = array_keys($data);
        $result = '';
        foreach ($keys as $col) {
            $result .= $col . "=:" . $col . ',';
        }
        return substr($result, 0, -1);
    }
    private function columnList(): string
    {
        return implode(",", $this->fillable);
    }
    private function placeholder(): string
    {
        return ":" . implode(",:", $this->fillable);
    }
    private function checkFillable()
    {
        if (!isset($this->fillable) || $this->fillable === null || empty($this->fillable)) {
            throw new Exception("No fillable fields defined for table");
        }
    }
}
