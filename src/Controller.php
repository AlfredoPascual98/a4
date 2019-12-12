<?php


namespace Rentit;


abstract class Controller implements View,Model
{
    protected $request;
    function __construct($request)
    {
        $this->request=$request;
    }
    function error(){
        throw new \Exception("[ERROR::]:Non existent method");
    }
    public function render(array $dataview=null,string $template=null)
    {
        if ($dataview) {
            extract($dataview);
            include 'templates/' . $this->request->getController() . '.tpl.php';
            if ($template != "") {
                include 'templates/' . $template . '.tpl.php';
            }
        }
    }
    function getDB(){
        $db=DB::singleton();
        return $db;
    }
}