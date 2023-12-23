<?php

class GraphQLQueryBuilder
{
    private $operation;
    private $fields = [];

    /**
     * GraphQLQueryBuilder constructor.
     * @param $operation
     */
    public function __construct($operation)
    {
        $this->operation = $operation;
    }

    /**
     * @param GraphQLField $field
     * @return $this
     */
    public function addField(GraphQLField $field)
    {
        $this->fields[] = $field;
        return $this;
    }

    /**
     * @return string
     */
    public function build()
    {
        $query = "{$this->operation} {";

        foreach ($this->fields as $field) {
            $query .= $field->build();
        }

        $query .= '}';

        return $query;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->build();
    }
}

?>