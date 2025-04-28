<?php

namespace Core\Data\QueryBuilder;

class SelectQuery extends QueryBuilder
{
    private array $select = [];
    //private string $from = '';
    private array $joins = [];
    //private array $where = [];
    private array $group = [];
    private array $order = [];
    //private array $params = [];
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

//    /**
//     * The function specifies the table from which to select data in the SQL query.
//     * @param $table - table name
//     * @return $this
//     */
//    public function table(string $table): static
//    {
//        $this->from = $table;
//
//        return $this;
//    }
//
//    /**
//     * The function receives the name of the table from which the query is built
//     * @return string
//     */
//    public function getTable(): string
//    {
//        return $this->from;
//    }

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

//    /**
//     * The function sets the WHERE conditions for an SQL query
//     * @param array $condition
//     * @return $this
//     */
//    public function where(array $condition = []): static
//    {
//        $this->where = $condition;
//
//        return $this;
//    }
//
//    /**
//     * The function adds a new WHERE condition to the where array
//     * @param string $condition
//     * @param string $operator - operator for combining conditions
//     * @return $this
//     */
//    public function addWhere(string $condition, string $operator = 'AND'): static
//    {
//        $this->where[] = " $operator $condition";
//
//        return $this;
//    }

//    /**
//     * The function specifies a set of parameters
//     * @param array $params
//     * @return $this
//     */
//    public function setParams(array $params = []): static
//    {
//        $this->params = $params;
//
//        return $this;
//    }
//
//    /**
//     * The function adds new parameters to an existing set
//     * @param array $params
//     * @return $this
//     */
//    public function addParams(array $params): static
//    {
//        $this->params = array_merge($this->params, $params);;
//
//        return $this;
//    }
//
//    /**
//     * The function returns an associative array of parameters
//     * that were accumulated when building an SQL query using the where() method
//     * @return array
//     */
//    public function getParams(): array
//    {
//        return $this->params;
//    }

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

        if (!empty($this->joins)) {

            foreach ($this->joins as $join) {
                $sql .= ' ' . $join['type'] . ' JOIN ' . $join['table'] . ' ON (' . $join['on'] . ')';
            }
        }

        (!empty($this->where)) ? $sql .= ' WHERE ' . implode($this->where) : '';
        (!empty($this->group)) ? $sql .= ' GROUP BY ' . implode(', ', $this->group) : '';
        (!empty($this->order)) ? $sql .= ' ORDER BY ' . implode(', ', $this->order) : '';
        (!empty($this->limit)) ? $sql .= ' LIMIT ' . $this->limit : '';
        (!empty($this->offset)) ? $sql .= ' OFFSET ' . $this->offset : '';

        return $sql;
    }
}