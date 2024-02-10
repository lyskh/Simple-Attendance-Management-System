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