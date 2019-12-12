<?php


namespace Rentit\Controllers;

//use Rentit\Controller;

final class DefaultController extends Controller
{
    public function __construct($request){
        parent::__construct($request);
    }
    public function index(){
        $data=['title'=>'GUAY'];
        //$this->getDB();
        $this->render($data);
    }
    /*
    public function getResults(){

    }
    public function render($array_datos){
        echo $algo(datos);
    }
    */
}