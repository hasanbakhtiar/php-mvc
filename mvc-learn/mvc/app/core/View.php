<?php
class View{
    public static function renderView($module, $action, $data = null, $return = false){
            if ($return == false) {
                require (APP_DIR."/modules/{$module}/view/{action}View.php");
            }else{
                ob_start();
                require (APP_DIR."/modules/{$module}/view/{action}View.php");
                $text = ob_get_contents();
                ob_clean();

                return $text;
            }
    }
    public static function renderLayout($layout, $module, $action, $data = null){
        $data['VIEW'] = $action != NULL ? view::renderView($module, $action, $data, true) : null;

        require(APP_DIR."/layout/{$layout}Layout.php");
    }
}