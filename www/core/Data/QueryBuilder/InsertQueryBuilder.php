<?php

namespace Core\Data\QueryBuilder;

class InsertQueryBuilder extends QueryBuilder
{
    private array $insert = [];
    private array $values = [];
    private array $duplicateUpdate = [];

    /**
     * The function specifies the columns to be inserted from a table in an SQL query.
     * @param $columns - column names
     * @return $this
     */
    public function insert(array $columns = []): static
    {
        $this->insert = $columns;

        return $this;
    }

    /**
     * The function adds columns to an existing list of inserted columns
     * @param array $columns - column names
     * @return $this
     */
    public function addInsert(array $columns): static
    {
        $this->insert = array_merge($this->insert, $columns);

        return $this;
    }

    /**
     * The function specifies the values to be inserted into the corresponding columns
     * @param array $values - values to be inserted
     * @return $this
     */
    public function values(array $values = []): static
    {
        $this->values = $values;

        return $this;
    }

    /**
     * The function adds values to the existing list of values to be inserted
     * @param array $values -additional values to be inserted
     * @return $this
     */
    public function addValues(array $values): static
    {
        $this->values = array_merge($this->values, $values);

        return $this;
    }

    /**
     * The function specifies the columns and values to be updated if a duplicate key
     * @param array $data -data to update
     * @return $this
     */
    public function duplicateUpdate(array $data = []): static
    {
        $this->duplicateUpdate = $data;

        return $this;
    }

    /**
     * The function adds more columns and values to the existing set of updates
     * @param array $data - data to update
     * @return $this
     */
    public function addDuplicateUpdate(array $data): static
    {
        $this->duplicateUpdate = array_merge($this->duplicateUpdate, $data);

        return $this;
    }

    /**
     * The function assembles the INSERT query
     * @return string
     */
    function getQuery(): string
    {
        $sql = 'INSERT INTO ' . $this->table .
            (empty($this->insert) ? ' ' : (' (' . implode(', ', $this->insert) . ') ')) .
            'VALUES (:' . implode(', :', $this->insert) . ')';

        if (!empty($this->duplicateUpdate))
            $sql .= " ON DUPLICATE KEY UPDATE " . implode(', ', $this->duplicateUpdate);

        return $sql;
    }
}