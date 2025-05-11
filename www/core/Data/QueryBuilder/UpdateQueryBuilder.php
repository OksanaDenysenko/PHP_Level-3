<?php

namespace Core\Data\QueryBuilder;

class UpdateQueryBuilder extends QueryBuilder
{
    private array $update = [];

    /**
     * The function specifies the columns to be updated in a table in an SQL query.
     * @param $columns - column names
     * @return $this
     */
    public function update(array $columns = []): static
    {
        $this->update = $columns;

        return $this;
    }

    /**
     * The function adds columns to an existing list of updated columns
     * @param array $columns - column names
     * @return $this
     */
    public function addUpdate(array $columns): static
    {
        $this->update = array_merge($this->update, $columns);

        return $this;
    }

    /**
     * The function assembles the UPDATE query
     * @return string
     */
    function getQuery(): string
    {
        $sql = 'UPDATE ' . $this->table . ' SET ' . implode(', ', $this->update);

        if (!empty($this->where)) $sql .= ' WHERE ' . implode($this->where);

        return $sql;
    }
}