<?php

namespace Core\Data\QueryBuilder;

abstract class QueryBuilder
{
    protected string $table = '';
    protected array $joins = [];
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
     * The function specifies the joining of tables in an SQL query
     * @param $table - name of the table to join
     * @param $on - condition for joining
     * @param string $type - join type
     * @return $this
     * @throws \Exception
     */
    public function join(string $table, string $on, string $type = 'INNER'): static
    {
        $types = ['INNER', 'LEFT', 'RIGHT', 'FULL OUTER'];
        $type = strtoupper($type);

        if (!in_array($type, $types)) {
            throw new \Exception("Type $type is not supported by the join function of the QueryBuilder class");
        }

        $this->joins[] = compact('table', 'on', 'type');

        return $this;
    }

    /**
     * The function clears the joins array
     * @return $this
     */
    public function clearJoins(): static
    {
        $this->joins = [];

        return $this;
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

    /**
     * The function adds a JOIN part to the SQL query
     * @param string $sql - part of the SQL query
     * @return string
     */
    public function addJoinToQuery(string $sql): string
    {
        if (!empty($this->joins)) {

            foreach ($this->joins as $join) {
                $sql .= ' ' . $join['type'] . ' JOIN ' . $join['table'] . ' ON (' . $join['on'] . ')';
            }
        }

        return $sql;
    }
    abstract function getQuery(): string;
}