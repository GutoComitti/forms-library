<?php

namespace Inputs;

use FormRenderer;

include_once("autoload.php");

class TextInput extends Input {

    public function validate(): bool{
        if($this->getValue() === ""){
            return false;
        }
        return true;
    }

    public function render(): string{
        $inputStyle = FormRenderer::INPUT_MARGINS . " width: calc(100% - 1em);";
        return "<input type='text' value='" . $this->getValue() . "' name='" . $this->name() . "' style='" . $inputStyle . "'>";
    }
}
