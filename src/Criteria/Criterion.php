<?php

namespace Framework2\Criteria;

class Criterion
{
    const EQ = '=';

    const NOT_EQ = '!=';

    const IN = 'IN';

    const NOT_IN = 'NOT IN';

    const GT = '>';

    const GTE = '>=';

    const LT = '<';

    const LTE = '<=';
    private $target;

    private $operator;

    private $value;

    public function __construct($target, $operator, $value)
    {
        $this->target = $target;
        $this->operator = $operator;
        $this->value = $value;
    }

    public function __toString()
    {
        $value = is_array($this->value) ? '[' . implode(', ', $this->value) . ']'
                    : $this->value;

        return "{$this->target} {$this->operator} {$value}";
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
