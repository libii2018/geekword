<?php

namespace Core\HTML;

class Form{

    private $data;
    public $surround;

    public function __construct($data = array()){

        $this->data = $data;

    }

    private function surround($html){

        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    public function getValue($index){

        if(is_object($this->data)){

            return $this->data->$index;
            
        }

        return isset($this->data[$index]) ? $this->data[$index] : null;  

    }

    public function input($name,$label,$option=[]){

        $type = isset($option['type']) ? $option['type'] : 'text';

        return $this->surround(

            '<input type="'. $type .'" name="' . $name . '" value="' . $this->getValue($name) . '">'

        );
    }

    public function submit(){

        return $this->surround('<button type="submit">Envoyer</button>');
    }

}