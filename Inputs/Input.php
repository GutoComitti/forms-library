<?php

namespace Inputs;

use InvalidArgumentException;

include_once("autoload.php");

abstract class Input {
    protected string $_name;
    protected string $_label;
    protected string|int|float $_initVal;

    abstract public function validate();
    // abstract protected function _renderSetting();
    abstract public function render();

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(string $name, string $label, string|int|float $initVal) {
        $this->_name = $name;
        $this->_label = $label;
        $this->_initVal = $initVal;
        $this->validateInitialValues();
    }

    /**
     * returns the name of this input
     */
    public function name(): string {
        return $this->_name;
    }

    /**
     * returns the current value managed by this input
     * if the form was submitted, it takes the input from the user as the input value
     */
    public function getValue() {
        if($_SERVER['REQUEST_METHOD']=="POST"){
            return $_POST[$this->name()];
        }
        return $this->_initVal;
    }

    /**
     * returns the label of this input
     */
    public function label(): string {
        return $this->_label;
    }

    /**
     * @throws InvalidArgumentException
     */
    private function validateInitialValues(): void{
        if($this->_name === ''){
            throw new InvalidArgumentException("Input name cannot be empty");
        }
        if($this->_label === ''){
            throw new InvalidArgumentException("Input label cannot be empty");
        }
    }
}
