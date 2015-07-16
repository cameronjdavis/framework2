<?php

namespace Framework2\Rest;

class ExampleRestfulObject
{
    /**
     * @var int
     */
    public $id;

    /**
     * Example property
     * @var string
     */
    public $prop1;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ExampleRestfulObject
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getProp1()
    {
        return $this->prop1;
    }

    /**
     * @param string $prop1
     * @return ExampleRestfulObject
     */
    public function setProp1($prop1)
    {
        $this->prop1 = $prop1;

        return $this;
    }
}
