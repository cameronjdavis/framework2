<?php

namespace Framework2\Example;

use Framework2\Input;
use Framework2\Rest\RestfulInterface;
use Framework2\Example\ExampleRestfulObject;

class ExampleRestfulHelper implements RestfulInterface
{
    const ID = 'example_id';
    const PROP_1 = 'prop1';
    /**
     * @var Input
     */
    private $input;

    public function __construct(Input $input)
    {
        $this->input = $input;
    }

    public function create()
    {
        return (new ExampleRestfulObject())
                        ->setId(999)
                        ->setProp1($this->input->get(self::PROP_1, 'default prop 1'));
    }

    public function delete($id)
    {
        // @todo
    }

    /**
     * @param int $id
     * @return ExampleRestfulObject
     */
    public function get($id)
    {
        return (new ExampleRestfulObject())
                        ->setId($id)
                        ->setProp1('sample value');
    }
}
