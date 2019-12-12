<?php


namespace Rentit;


abstract class Controller implements View
{

    protected $request;
   function __construct($request)
   {
       $this->request=$request;
   }

    function error(){
    echo 'Metodo no existe';
}

/**********/
    function render(array $dataview, string $template=null)
    {
        if ($dataview) {
            extract($dataview);
            include 'templates/' . $this->request->getController() . '.tpl.php';
            if ($template != "") {
                include 'templates/' . $template . '.tpl.php';
            }
        }
    }
}