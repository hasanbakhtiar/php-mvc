<?php 
class defaultModel extends Model{
    public function indexModel($id){
        // echo "Index Model File";
        $this->db->where("id", $id);
       return $this->db->get("user");
    }
}