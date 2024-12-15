<?php

namespace Core\Data;

use Core\Data\Database;

abstract class Repository extends Database
{
    abstract public function find($id);
    //abstract public function findAll();
    abstract public function insert($id);
    abstract public function update($id);
    abstract public function save($entity);
    abstract public function delete($id);
}