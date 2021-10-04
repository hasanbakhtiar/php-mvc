<?php 

class userController extends Controller{
     public function indexAction()
    {
        $data = array();
        
           $this->RenderLayout("main", "user", "index", $data); 
       
    }
}