<?php 
        require_once "./DB.php";
        $error = array();
        $form_msg = '';
        $form_success = false;
        $user_data = DB::query("SELECT * FROM account",array(),PDO::FETCH_ASSOC);
        
        if (!empty($_GET) ){
                $delete = $_GET['delete'];
                DB::query("DELETE FROM account WHERE username=:username",array('username'=>$delete));
                $form_msg="User deleted successfully!!";
                $form_success = True;
                
         }
        
        include_once "./admin.html";
        
        ?>