<?php


namespace Rentit;


interface View{
    public function render(Array $dataview, string $template);
    public function  json(Array $dataview);
}