<?php
class defaultController extends Controller{
    public function indexAction($id){
        // echo 'IndexAction';
        $data = array();
        $indexModel = new defaultModel();
        echo $id;
        $data['user'] = $indexModel->indexModel();
        $this->renderLayout("main", "default", "index", $data);
        
    }

    public function detailAction(){
        $data = array();
        $this->RenderLayout("main", "default", "detail", $data);
    }

    public function loginAction(){
        $data = array();
        $this->RenderLayout("main", "default", "login", $data);
    }
}
?>