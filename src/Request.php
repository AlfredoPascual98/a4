<?php


namespace Rentit;


class Request
{
    private  $controller;
    private  $action;
    private  $method;
    private  $params;


    protected $arrURI;
    function __construct()
    {
        $requestString=htmlentities($_SERVER['REQUEST_URI']);
        $this->arrURI=explode('/',$requestString);
        array_shift($this->arrURI);
        $this->extractURI();
        var_dump($this->getController());
        var_dump($this->getAction());
        var_dump($this->getParams());
        die;
    }
private function extractURi(){
        $length=count($this->arrURI); //sacar longitud
        switch ($length){
            case 1:
                if($this->arrURI[0]==""){
                    $this->setController('default');
                }else{
                    $this->setController($this->arrURI[0]);
                }
                $this->setAction('index');
                break;
            case 2:
                $this->setController($this->arrURI[0]);
                if($this->arrURI[1]==""){
                    $this->setAction('index');
                }else{
                    $this->setAction($this->arrURI[1]);
                }
                break;
            default:
                //>2
                $this->setController($this->arrURI[0]);
                $this->setAction($this->arrURI[1]);
                //set params
                $this->Params();
                /*
                $this->setController($this->arrURI[0]);
                $this->setAction($this->arrURI[1]);
                //$this->setParams($this->arrURI[]);
                for ($c=0; $c<$length; $c++){
                    if ($length%2==0){
                        $this->setParams($this->arrURI[$c]);
                    }else{
                        $this->setParams($this->arrURI[$c]);
                    }
                }*/
                break;
        }
        $this->setMethod(htmlentities($_SERVER['REQUEST_METHOD']));
}

private function Params(){
        if($this->arrURI!=null){
            $arr_length=count($this->arrURI);
            if($arr_length>2){
                array_shift($this->arrURI);
                array_shift($this->arrURI);
                $arr_length=count($this->arrURI);
                if($arr_length%2==0){
                    for($i=0;$i<$arr_length;$i++){
                        if($i%2==0){
                            $arr_k[]=$this->arrURI[$i];
                        }else{
                            $arr_v[]=$this->arrURI[$i];
                        }
                    }
                    $res=array_combine($arr_k, $arr_v);
                    $this->setParams($res);
                }else{
                    //array asociativos no disponible
                    $this->setParams(null);
                }
            }
        }
}
    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method): void
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params): void
    {
        $this->params = $params;
    }

}