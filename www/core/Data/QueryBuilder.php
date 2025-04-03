<?php

namespace Core\Data;

class QueryBuilder
{
    private array $select = [];
    private string $from = '';
    private array $joins = [];
    private array $where = [];
    private array $group = [];
    private array $order = [];
    private array $params = [];

    /**
     * The function specifies the columns to be selected from a table in an SQL query.
     * @param $columns - column names
     * @return $this
     */
    public function select(array|string $columns): static
    {
        $this->select = is_array($columns) ? $columns : func_get_args();

        return $this;
    }

    /**
     * The function specifies the table from which to select data in the SQL query.
     * @param $table - table name
     * @return $this
     */
    public function from(string $table): static
    {
        $this->from = $table;

        return $this;
    }

    public function getFrom():string
    {
        return $this->from;
    }

    /**
     * The function specifies the joining of tables in an SQL query
     * @param $table - name of the table to join
     * @param $on - condition for joining
     * @param string $type - join type
     * @return $this
     */
    public function join($table, $on, string $type = 'INNER'): static
    {
        $this->joins[] =  compact('table', 'on', 'type');

        return $this;
    }

    /**
     * The function sets the WHERE conditions for an SQL query
     * @param $condition
     * @param array $params - parameters for prepared query
     * @return $this
     */
    public function where($condition, array $params = []): static
    {
        $this->where[] = $condition;
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /**
     * The function specifies the columns by which to group query results in an SQL query
     * @param $columns - column names
     * @return $this
     */
    public function group($columns): static
    {
        $this->group = is_array($columns) ? $columns : func_get_args();

        return $this;
    }

    /**
     * The function specifies the sort order of query results in an SQL query.
     * @param $columns - column names
     * @param string $direction - sorting direction
     * @return $this
     */
    public function order($columns, string $direction = 'ASC'): static
    {
        $this->order[] = $columns . ' ' . $direction;

        return $this;
    }

    /**
     * The function assembles the SQL query
     * @return string
     */
    public function getQuery(): string
    {
        $sql = 'SELECT ' . (empty($this->select) ? '*' : implode(', ', $this->select)) . ' FROM ' . $this->from;

        if (!empty($this->joins)) {

            foreach ($this->joins as $join) {
                $sql .= ' ' . $join['type'] . ' JOIN ' . $join['table'] . ' ON (' . $join['on'].')';
            }
        }

        if (!empty($this->where)) {
            $sql .= ' WHERE ' . implode(' AND ', $this->where);
        }

        if (!empty($this->group)) {
            $sql .= ' GROUP BY ' . implode(', ', $this->group);
        }

        if (!empty($this->order)) {
            $sql .= ' ORDER BY ' . implode(', ', $this->order);
        }

        return $sql;
    }

    /**
     * The function returns an associative array of parameters
     * that were accumulated when building an SQL query using the where() method
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
}