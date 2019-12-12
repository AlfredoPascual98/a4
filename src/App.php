<?php


namespace Rentit;


//use http\Env\Request;

class App
{

    static function run()
    {
        //construir rutas

        //$routes=self::getRoutes();  //devuelve una array con todas las rutas disponibles


        //capturar Request
        $request=new Request();
        $controller=$request->getController();
        $action=$request->getAction();

        try{
            if(in_array($controller,$routes)){
                $nameController='\\Rentit\Controlers\\'. ucfirst($controller) .'Controller';
                $objCont= new $nameController($request);
                var_dump($objCont);
                die;
                if (is_callable([$objCont,$action])){
                    call_user_func([$objCont,$action]);
                }
                else{
                    call_user_func([$objCont,'error']);
                }
            }else{
                throw new \Exception("[ERROR]:Ruta no definida");
            }
        }
        catch( \Exception $e ){
            echo $e->getMessage();
    }

    }
/*
 * @return Array
 * prepares route array from directory Controllers
 */
static function getRoutes():Array{
    $dir=__DIR__.'/Controllers';
    $handle=opendir($dir);
    while(false!=($entry=readdir($handle))){
        if($entry!="." && $entry!=".."){
            $routes[]=strtolower(substr($entry,0,-14));
        }
    }
    return $routes;
}


/*
 * Extracts controller amb method
 * @return array
 */

        private function getArrayController(){
            $requestString=htmlentities($_SERVER['REQUEST_URI']);
            $requestArr=explode('/',$requestString);
            array_shift($requestArr);

            if ($requestArr[0]==null){
                $controller="Default";
                $method="index";
            }else{
                $controller=ucfirst($requestArr[0]);
                //print_r($controller);
                $method=$requestArr[1];
            }
            return [$controller,$method];
        }
}