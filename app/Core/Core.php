<?php 

    class Core {
        public function start($getURL){
            if(isset($_GET['page'])){
                $page = ucfirst($_GET['page']).'Controller';
            } else {
                $page = 'HomeController';
            }

            if(!class_exists($page)){
                $page = 'ErrorController';
            }

            if(isset($_GET['alter'])){

                $action = 'alterData';
                $id = $_GET['editar'];
                call_user_func_array(array(new $page, $action), array('id' => $id));
            
            } elseif(isset($_GET['delete'])){
            
                $action = 'deleteData';
                $id = $_GET['deletar'];
                call_user_func_array(array(new $page, $action), array('id' => $id));
            
            } else {
            
                $action = 'index';
                call_user_func_array(array(new $page, $action), array());
            
            }
        }
    }
?>