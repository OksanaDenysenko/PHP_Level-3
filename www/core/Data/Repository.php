<?php

namespace Core\Data;


abstract class Repository extends Database
{
    protected Database $db; // зєднання з БД

    protected string $nameTable;

//    public function __construct($nameTable) {
//        $this->db = Database::getInstance();
//        $this->nameTable=$nameTable;
//    }

    public function __construct() {
        $this->db = Database::getInstance();
    }

    abstract public function initializeNameTable();


    /**
     * Пошук однієї книги за $id
     * @param int $id
     * @return mixed
     */
    public function find(int $id): mixed
    {
        return $this->db->query('SELECT * FROM'. $this->nameTable.' WHERE id=?', [$id])->getOne();
    }

    /**
     * Вивід всього списку книг
     * @param string $nameColumns
     * @return bool|array
     */
    public function findAll(string $nameColumns='*'): bool|array
    {
        return $this->db->query("SELECT $nameColumns FROM $this->nameTable")->getAll();
    }

    /**
     * Додавання нової книги
     * @param array $data
     * @return void
     */
    public function insert(array $data): void
    {
        $keys = array_keys($data);

        $this->db->query('INSERT INTO'. $this->nameTable.'(' . implode(',', $keys) . ') 
                         VALUES (:' . implode(':,', $keys) . ')', $data);
    }

    /**
     * Оновлення запису в таблиці
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $keys = array_keys($data);

        $query = "UPDATE $this->nameTable SET ";

        foreach ($keys as $key) {
            $query = $query . "$key=:$key, ";
        }
        // show ($query);

        $query = rtrim($query, ", ") . " WHERE id=:id";
        //show($query);

        $data['id'] = $id;

        $this->db->query($query,$data);
    }

    /**
     * Видалення книги
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->db->query("DELETE FROM $this->nameTable WHERE id = ?", [$id]);
    }
}