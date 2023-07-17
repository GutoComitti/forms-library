<?php

include_once("autoload.php");

use Inputs\Input;

class FormRenderer {

    private $formContent;
    private const LABEL_WRAPPER_STYLE = "background-color: rgb(235, 255, 235); margin: 2px; height: 2em;";
    public const INPUT_MARGINS = "margin: 0.5em 0.5em;";

    /**
     * @param Inputs[]
     */
    public function renderForm(array $inputs): void{
        $this->formContent = '';
        $this->addFormBeginning();
        foreach($inputs as $input){
            $this->addInputRow($input);
        }
        $this->addFormEnd();
        $this->render();
    }
    
    private function addFormBeginning(): void{
        $formStyle = "padding: 4px;border: 1px solid green; border-radius: 5px;";
        $this->add("<form method='POST' style='$formStyle'>");
        
        $wrappingDivStyle = "display: grid; grid-template-columns: 2fr 4fr;";
        $this->add("<div style='$wrappingDivStyle'>");
    }
    
    private function addFormEnd(): void{
        $this->addButtonRow();
        $this->add("</div></form>");
    }

    private function addButtonRow(): void{
        $buttonStyle = self::INPUT_MARGINS . 'border-width: 0;font-weight: 700;background: linear-gradient(lightgrey, green);;border-radius: 12px;color: white;cursor: pointer;';
        $this->add("<div style='" . self::LABEL_WRAPPER_STYLE . "'></div><div><button type='submit' style='$buttonStyle'>SUBMIT</button></div>");
    }

    private function addInputRow(Input $input): void{
        $inputName = $input->name();
        $inputLabel = $input->label();
        $labelStyle = "display: inline-block; margin-top: 4px; margin-left: 8px; font-weight: 600;";
        $this->add("<div style='" . self::LABEL_WRAPPER_STYLE . "'><label for='$inputName' style='$labelStyle'>$inputLabel</label></div>");
        $this->add("<div>");
        $this->add($input->render());
        $this->add("</div>");
    }

    private function render(){
        echo $this->formContent;
    }

    private function add($content){
        $this->formContent .= $content;
    }
}
