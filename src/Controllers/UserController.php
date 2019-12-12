<?php


namespace Rentit\Controllers;


//use Rentit\Controller;

class UserController extends  Controller
{
    public function __construct($request){
        parent::__construct($request);
        var_dump($this->request->getParams());
        die;
    }
    public function index(){
        echo 'accion';
    }

}