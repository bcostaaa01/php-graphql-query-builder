<?php

class GraphQLField
{
    private $name;
    private $alias;
    private $arguments = [];
    private $subfields = [];

    /**
     * GraphQLField constructor.
     * @param $name
     * @param null $alias
     */
    public function __construct($name, $alias = null)
    {
        $this->name = $name;
        $this->alias = $alias;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addArgument($key, $value)
    {
        $this->arguments[$key] = $value;
        return $this;
    }

    /**
     * @param GraphQLField $field
     * @return $this
     */
    public function addSubfield(GraphQLField $field)
    {
        $this->subfields[] = $field;
        return $this;
    }

    /**
     * @return string
     */
    public function build()
    {
        $field = $this->alias ? "{$this->alias}: {$this->name}" : $this->name;

        $argumentString = '';
        if (!empty($this->arguments)) {
            $argumentString = '(' . $this->buildArgumentString() . ')';
        }

        $subfields = '';
        foreach ($this->subfields as $subfield) {
            $subfields .= $subfield->build();
        }

        return "{$field}{$argumentString}{$subfields} ";
    }

    private function buildArgumentString()
    {
        $arguments = [];
        foreach ($this->arguments as $key => $value) {
            $arguments[] = "{$key}: {$this->formatArgumentValue($value)}";
        }

        return implode(', ', $arguments);
    }

    private function formatArgumentValue($value)
    {
        // Add logic here to handle different types of values
        return is_string($value) ? "\"{$value}\"" : $value;
    }
}

?>