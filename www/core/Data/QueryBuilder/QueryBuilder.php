<?php

namespace Core\Data\QueryBuilder;

abstract class QueryBuilder
{
    protected string $table = '';
    protected array $where = [];
    protected array $params = [];

    /**
     * The function specifies the table from which to select data in the SQL query.
     * @param $table - table name
     * @return $this
     */
    public function table(string $table): static
    {
        $this->table = $table;

        return $this;
    }

    /**
     * The function receives the name of the table from which the query is built
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * The function sets the WHERE conditions for an SQL query
     * @param array $condition
     * @return $this
     */
    public function where(array $condition = []): static
    {
        $this->where = $condition;

        return $this;
    }

    /**
     * The function adds a new WHERE condition to the where array
     * @param string $condition
     * @param string $operator - operator for combining conditions
     * @return $this
     */
    public function addWhere(string $condition, string $operator = 'AND'): static
    {
        $this->where[] = " $operator $condition";

        return $this;
    }

    /**
     * The function specifies a set of parameters
     * @param array $params
     * @return $this
     */
    public function setParams(array $params = []): static
    {
        $this->params = $params;

        return $this;
    }

    /**
     * The function adds new parameters to an existing set
     * @param array $params
     * @return $this
     */
    public function addParams(array $params): static
    {
        $this->params = array_merge($this->params, $params);;

        return $this;
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
    abstract function getQuery(): string;
}