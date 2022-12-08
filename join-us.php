<?php
        require "./DB.php";

        $form_success = false;
        
		if (!empty($_POST) ){
            // Taking all 5 values from the form data(input)
            $name = $_REQUEST['name'];
            $fname = $_REQUEST['fname'];
            $mname = $_REQUEST['mname'];
            $dob = $_REQUEST['dob'];
            $gender = $_REQUEST['gender'];
            $aadhar_no = $_REQUEST['aadhar_no'];
            $mobile = $_REQUEST['mobile'];
            $address = $_REQUEST['address'];
            $district = $_REQUEST['district'];
            $pin = $_REQUEST['pin'];
            
            // Performing insert query execution
            // here our table name is college
            $sql = "INSERT INTO joinus (`name`, `fname`, `mname`, `dob`, `gender`, `aadhar_no`, `mobile`, `address`, `district`, `pin`) VALUES ('$name',
                '$fname','$mname','$dob','$gender','$aadhar_no','$mobile','$address','$district','$pin')";
            
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
		

        include "./join-us.html";
		?>

