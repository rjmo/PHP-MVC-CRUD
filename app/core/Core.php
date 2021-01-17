<?php
class Core
{
    public function start($urlGet)
    {
        if (isset($urlGet['pagina'])) {
            $acao = 'index';
            $controller = ucfirst($urlGet['pagina'].'Controller');
        } else {
            $controller = 'HomeController';
        }

        if (!class_exists($controller))
        {
            $controller = 'ErrorController';
        }
        if (isset($urlGet['id']) && $urlGet['id'] != null){
            $id = $urlGet['id'];
        }else{
            $id = null;
        }
        call_user_func_array(array(new $controller, $acao), array($id));
    }
}