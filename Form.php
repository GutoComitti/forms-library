<?php

include_once("autoload.php");

use Inputs\Input;

class Form {

    /**
     * Input[]
     */
    protected $_inputs = [];
    private FormRenderer $formRenderer;

    public function __construct() {
        $this->formRenderer = new FormRenderer();
    }

    /**
     *  adds an input instance to the collection of inputs managed by this form object
     */
    public function addInput(Input $input): void {
        $this->_inputs[] = $input;
    }

    /**
     *  iterates over all inputs managed by this form and returns false if any of them don't validate
     */
    public function validate(): bool {
        foreach($this->_inputs as $input){
            if(!$input->validate()){
                return false;
            }
        }
        return true;
    }

    /**
     * returns the value of the input by $name
     * @throws InvalidArgumentException
     */
    public function getValue(string $name) {
        foreach($this->_inputs as $input){
            if($input->name() === $name){
                return $input->getValue();
            }
        }
        throw new InvalidArgumentException("Input with name $name not found.");
    }

    /**
     *  draws the outer form element, and the markup for each input, one input per row
     */
    public function display(): void {
        $this->formRenderer->renderForm($this->_inputs);
    }
}
