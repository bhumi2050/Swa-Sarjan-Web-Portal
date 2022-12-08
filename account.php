<?php 
        require_once "./DB.php";
        $error = array();
        $form_msg = '';
        if (!empty($_POST) ){
                $user = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                
                
                $val = array('username'=>$user,'password'=>$pass,'email'=>$email);

                if($_GET['type']=='register'){
                        $v = DB::query("select count(*) from account where username=:user OR email=:email",array('user'=>$user,'email'=>$email))[0];
                
                        if($v[0]){
                                $error[]='Username/Email already exists!!';
                                $form_success = false;
                        }
                        else{
                                DB::query('Insert Into account values (:username,:password,:email)',$val);
                                $form_success = true;
                                $form_msg = 'Your account is successfully registered.';
                        }

                        
                }

                if($_GET['type']=='login'){
                        $v = DB::query("select count(*) from account where email=:email",array('email'=>$email));
                        if($v[0]){
                                $form_success = true;
                                $form_msg = 'Your account is successfully logged In.';
                        }
                        
                }

                
        }
        
        include_once "./account.html";
        
        ?>