<?php

use Inputs\Input;

interface FormInterface {

    /**
     *  adds an input instance to the collection of inputs managed by this form object
     */
    public function addInput(Input $input): void;

    /**
     *  iterates over all inputs managed by this form and returns false if any of them don't validate
     */
    public function validate(): bool;

    /**
     * returns the value of the input by $name
     * @throws InvalidArgumentException
     */
    public function getValue(string $name);

    /**
     *  draws the outer form element, and the markup for each input, one input per row
     */
    public function display(): void;
}
