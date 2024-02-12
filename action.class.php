<?php
class Actions{
    private $conn;
    function __construct(){
        require_once(realpath(__DIR__.'/../db-connect.php'));
        $this->conn = $conn;
    }
    /**
     * Class Actions
     */
    public function save_class(){
        foreach($_POST as $k => $v){
            if(!is_array($_POST[$k]) && !is_numeric($_POST[$k]) && !empty($_POST[$k])){
                $_POST[$k] = addslashes(htmlspecialchars($v));
            }
        }
        extract($_POST);

        if(!empty($id)){
            $check = $this->conn->query("SELECT id FROM `class_tbl` where `name` = '{$name}' and `id` != '{$id}' ");
            $sql = "UPDATE `class_tbl` set `name` = '{$name}' where `id` = '{$id}'";
        }else{
            
            $check = $this->conn->query("SELECT id FROM `class_tbl` where `name` = '{$name}' ");
            $sql = "INSERT `class_tbl` set `name` = '{$name}'";
        }
        if($check->num_rows > 0){
            return ['status' => 'error', 'msg' => 'Class Name Already Exists!'];
        }else{
            $qry = $this->conn->query($sql);
            if($qry){
                if(empty($id)){
                    $_SESSION['flashdata'] = [ 'type' => 'success', 'msg' => "New Class has been added successfully!" ];
                }else{
                    $_SESSION['flashdata'] = [ 'type' => 'success', 'msg' => "Class Data has been updated successfully!" ];
                }
                return [ 'status' => 'success'];
            }else{
                if(empty($id)){
                    return ['status' => 'error', 'msg' => 'An error occurred while saving the New Class!'];
                }else{
                    return ['status' => 'error', 'msg' => 'An error occurred while updating the Class Data!'];
                }
            }
        }
        
    }
    public function delete_class(){
        extract($_POST);
        $delete = $this->conn->query("DELETE FROM `class_tbl` where `id` = '{$id}'");
        if($delete){
            $_SESSION['flashdata'] = [ 'type' => 'success', 'msg' => "Class has been deleted successfully!" ];
            return [ "status" => "success" ];
        }else{
            $_SESSION['flashdata'] = [ 'type' => 'danger', 'msg' => "Class has failed to deleted due to unknown reason!" ];
            return [ "status" => "error", "Class has failed to deleted!" ];
        }
    }