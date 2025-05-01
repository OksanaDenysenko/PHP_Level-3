<?php

namespace Core\Data\QueryBuilder;

class SelectQuery extends QueryBuilder
{
    private array $select = [];
    private array $group = [];
    private array $order = [];
    private ?int $limit = null;
    private ?int $offset = null;


    /**
     * The function specifies the columns to be selected from a table in an SQL query.
     * @param $columns - column names
     * @return $this
     */
    public function select(array $columns = []): static
    {
        $this->select = $columns;

        return $this;
    }

    /**
     * The function adds columns to an existing list of selected columns
     * @param array $columns - column names
     * @return $this
     */
    public function addSelect(array $columns): static
    {
        $this->select = array_merge($this->select, $columns);

        return $this;
    }

    /**
     * The function specifies the columns by which to group query results in an SQL query
     * @param $columns - column names
     * @return $this
     */
    public function group(array $columns = []): static
    {
        $this->group = $columns;

        return $this;
    }

    /**
     * The function adds a new grouping criterion
     * @param array $columns - column names
     * @return $this
     */
    public function addGroup(array $columns): static
    {
        $this->group = array_merge($this->group, $columns);

        return $this;
    }

    /**
     * The function specifies the sort order of query results in an SQL query.
     * @param $columns - column names
     * @param string $direction - sorting direction
     * @return $this
     */
    public function order(string $columns = null, string $direction = 'ASC'): static
    {
        $this->order = ($columns != null) ? [$columns . ' ' . $direction] : [];

        return $this;
    }

    /**
     * The function adds a new sorting criterion
     * @param string $columns - column names
     * @param string $direction - sorting direction
     * @return $this
     */
    public function addOrder(string $columns, string $direction = 'ASC'): static
    {
        $this->order[] = $columns . ' ' . $direction;

        return $this;
    }

    /**
     * The function sets the limit value for an SQL query
     * @param int|null $limit
     * @return $this
     */
    public function limit(int $limit = null): static
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * The function sets the offset value for an SQL query
     * @param int|null $offset
     * @return $this
     */
    public function offset(int $offset = null): static
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * The function assembles the SELECT query
     * @return string
     */
    public function getQuery(): string
    {
        $sql = 'SELECT ' . (empty($this->select) ? '*' : implode(', ', $this->select)) . ' FROM ' . $this->table;
        $sql=$this->addJoinToQuery($sql);
        (!empty($this->where)) ? $sql .= ' WHERE ' . implode($this->where) : '';
        (!empty($this->group)) ? $sql .= ' GROUP BY ' . implode(', ', $this->group) : '';
        (!empty($this->order)) ? $sql .= ' ORDER BY ' . implode(', ', $this->order) : '';
        (!empty($this->limit)) ? $sql .= ' LIMIT ' . $this->limit : '';
        (!empty($this->offset)) ? $sql .= ' OFFSET ' . $this->offset : '';

        return $sql;
    }
}