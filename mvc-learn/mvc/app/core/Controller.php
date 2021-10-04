<?php 

class Controller {

        public function renderView($module, $action, $params=[]){
                return view::renderView($module, $action, $params);
        }

        public function RenderLayout($layout, $module, $action, $params=[]){
            return view::renderView($layout, $module, $params);

        }

        public static function redirect($path){
                header("Location: {$path}");
        }


}
