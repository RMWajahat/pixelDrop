<?php

if(isset($_POST["login"])){
    include 'linkto.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['username']);
    $password = validate($_POST['pin']);

    if(empty($name) || empty($password)){
        header("Location: login.html"); 
    }
    else{
        $rec = "Select * from record where Name='$name' AND Password='$password'";
        $res = mysqli_query($conn,$rec);
        $exist = mysqli_num_rows($res);
        if($exist==1){
            header("Location: pixeldrop.html");
        }
        else{
            echo "<h1 style='font-size:50px;color:orange;text-align:center;max-width:100%; padding-top:70px; background-color:black;height:20vh; font-family:sans-serif;'>Invalid Credentials</h1>" ;
            echo "<a href='login.html' style='margin-left:3vw; color:red; font-size:20px; font-weight:500; text-decoration:none; font-family:sans-serif;'>Go Back</a>";
        }
    }

}

else{
    header("Location: login.html");
}

?>