<?php
        require "./DB.php";

        $form_success = false;
        
		if (!empty($_POST) ){
            // Taking all 5 values from the form data(input)
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $pan_card = $_REQUEST['pan_card'];
            $amount = $_REQUEST['amount'];
            $certificate = $_REQUEST['certificate'];
            $description = $_REQUEST['description'];
            $mobile = $_REQUEST['mobile'];
            $address = $_REQUEST['address'];
            $city = $_REQUEST['city'];
            $pin = $_REQUEST['pin'];
            
            // Performing insert query execution
            // here our table name is college
            $sql = "INSERT INTO donation (`name`, `email`, `pan_card`, `amount`, `certificate`, `mobile`, `address`, `city`, `pin`, `description`) VALUES ('$name',
                '$email','$pan_card','$amount','$certificate','$mobile','$address','$city','$pin','$description')";
            
            if(mysqli_query($conn, $sql)){
                $form_success = true;
    
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
            
            // Close connection
            mysqli_close($conn);
            unset($_POST);
            
        }
		

        include "./donate.html";
		?>

