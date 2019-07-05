<?php
    session_start();
    $username = "";
    $email = ""; 
    $fid = ""; 
    $Quantity = "";
    $foodName = ""; 
    $manName = ""; 
    $locName = ""; 
    $manDate = ""; 
    $expDate= ""; 
    $errors = array();

    // connect to database in xampp
    $db = mysqli_connect('localhost', 'root', '', 'major');

    // if Register button is clicked
     if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password_1 = $_POST['password_1'];
        $password_2 = $_POST['password_2'];

        //checking if all the filed are fill
        if(empty($username)){
            array_push($errors, "username is required");
        }
        if(empty($email)){
            array_push($errors, "email is required");
        }
        if(empty($password_1)){
            array_push($errors, "password is required");
        }

        if($password_1 != $password_2){
            array_push($errors, "The two passwords must match");
        }
        // if no errors i.e all fields are filled
        if(count($errors) == 0){
            $password = md5($password_1); // encrpting password
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

            mysqli_query($db, $sql);
            $_SESSION['username']= $username;
            $_SESSION['success'] = "";
            header('location: service.php');
        }
     }
     if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
     

     // login user from login page
     if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        //checking if all the filed are fill
        if(empty($username)){
            array_push($errors, "username is required");
        }
        if(empty($password)){
            array_push($errors, "password is required");
        }
        if(count($errors)== 0){
            $password = md5($password);//encrypt password
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($db, $query);

            if(mysqli_num_rows($result)== 1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "";
                header('location:service.php');// redirect to home page
            }else{
                array_push($errors, "username or password is wrong");
                header('location: login.php');
            }
        }
     }

     function getFoodData(){
        $data = array();
        $data[0] = $_POST['fid'];
        $data[1] = $_POST['foodName'];
        $data[2] = $_POST['Quantity'];
        $data[3] = $_POST['manName'];
        $data[4] = $_POST['locName'];
        $data[5] = $_POST['manDate'];
        $data[6] = $_POST['expDate'];
        return $data;
     }

     //Clear Data
     function clear(){
        $fid = ""; 
    $foodName = ""; 
    $foodName = ""; 
    $manName = ""; 
    $locName = ""; 
    $manDate = ""; 
    $expDate= ""; 
     }
     //Log out user from index page
     if(isset($_POST['search'])){
         $infor = getFoodData();
        $search_query = "SELECT * FROM food_tbl WHERE fid = '$infor[0]'";
         $search_result = mysqli_query($db, $search_query);
         if($search_result){
             if(mysqli_num_rows($search_result)){
                 while($rows = mysqli_fetch_array($search_result)){
                     $fid = $rows['fid'];
                     $foodName= $rows['foodName'];
                     $Quantity= $rows['Quantity'];
                     $manName = $rows['manName'];
                     $locName = $rows['locName'];
                     $manDate = $rows['manDate'];
                     $expDate = $rows['expDate'];
                 }

             }else{
                array_push($errors, "No Data Available");
             }
         }else{
             echo("Error");
         }
     }

     //Insert Food 
     if(isset($_POST['addNew'])){
        $infor = getFoodData();
        $insert_query = "INSERT INTO `food_tbl`(`foodName`,`Quantity`, `manName`, `locName`, `manDate`, `expDate`) VALUES ('$infor[1]','$infor[2]','$infor[3]','$infor[4]','$infor[5]','$infor[6]')";
     
            $insert_result = mysqli_query($db, $insert_query);
            if($insert_result == 1){
                array_push($errors, "Insert Successfull");
                header('location:service.php');
                clear();
            }else {
                array_push($errors, "unable to insert Data");
            }
    }

     //Update
     

     if(isset($_POST['update'])){
   $infor = getFoodData();

   $update = "UPDATE food_tbl SET foodName='$infor[1]', Quantity='$infor[2]',
    manName= '$infor[3]',locName='$infor[4]',manDate='$infor[5]',expDate='$infor[6]' WHERE fid='$infor[0]'";

        $result = mysqli_query($db, $update);
    if($result== 1){
        array_push($errors, "Update Successfull");
        header('location:service.php');
       
    }else{
        array_push($errors, "unable to Update");
    }
    

   }
   
?>