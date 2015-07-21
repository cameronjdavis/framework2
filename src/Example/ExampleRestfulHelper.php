<?php

namespace Framework2\Example;

use Framework2\Input;
use Framework2\Rest\CrudInterface;
use Framework2\Example\ExampleRestfulObject;
use Framework2\ErrorBuffer;

class ExampleRestfulHelper implements CrudInterface
{
    const ID = 'example_id';
    const PROP_1 = 'prop1';
    /**
     * @var Input
     */
    private $input;

    /**
     * @var ErrorBuffer
     */
    private $errors;

    /**
     * @param Input $input Input channel to read values during create/update.
     * @param ErrorBuffer $errors
     */
    public function __construct(Input $input, ErrorBuffer $errors)
    {
        $this->input = $input;
        $this->errors = $errors;
    }

    public function create()
    {
        if ($this->input->get(self::PROP_1) == 'bad value') {
            $this->errors->addError('ERR_001', 'You specified a bad value.');
            $this->errors->addError('ERR_002', 'Thank you, come again.');

            return;
        }

        return (new ExampleRestfulObject())
                        ->setId(999)
                        ->setProp1($this->input->get(self::PROP_1,
                                        'default prop 1'));
    }

    public function delete($id)
    {
        // nothing to delete in this example

        return true;
    }

    /**
     * @param int $id
     * @return ExampleRestfulObject
     */
    public function get($id)
    {
        if ($id == 666) {
            $this->errors->addError('ERR_003',
                    "Record could not be found. ID: {$id}");
        } else {
            return (new ExampleRestfulObject())
                            ->setId($id)
                            ->setProp1('sample value');
        }
    }

    public function getMultiple()
    {
        $object1 = (new ExampleRestfulObject())
                ->setId(23)
                ->setProp1('value 1');

        $object2 = (new ExampleRestfulObject())
                ->setId(24)
                ->setProp1('value 2');

        return [$object1, $object2];
    }

    public function update($id)
    {
        $object = $this->get($id);

        return $object->setProp1(
                        $this->input->get(self::PROP_1));
    }
}
