<?php

namespace Core\Data\QueryBuilder;

class DeleteQuery extends QueryBuilder
{
    private array $delete = [];

    /**
     * The function specifies the tables or alias to be deleted in an SQL query.
     * @param $tables - table names or alias
     * @return $this
     */
    public function delete(array $tables = []): static
    {
        $this->delete = $tables;

        return $this;
    }

    /**
     * The function adds tables or alias to an existing list of deleted columns
     * @param array $tables - table names or alias
     * @return $this
     */
    public function addDelete(array $tables): static
    {
        $this->delete = array_merge($this->delete, $tables);

        return $this;
    }

    /**
     * The function assembles the DELETE query
     * @return string
     */
    function getQuery(): string
    {
        $sql = 'DELETE ' . (empty($this->delete) ? '' : implode(', ', $this->delete)) . 'FROM ' . $this->table;
        $sql=$this->addJoinToQuery($sql);
        (!empty($this->where)) ? $sql .= ' WHERE ' . implode($this->where) : '';

        return $sql;
    }
}