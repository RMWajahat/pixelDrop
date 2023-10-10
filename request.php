<?php
if(isset($_POST['reg'])){
    include 'linkto.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['username']);
    $email = validate($_POST['Email']);
    $number = validate($_POST['Mobile_number']);
    $password = validate($_POST['pin']);
    $cpassword = validate($_POST['cpin']);
    $rec = "Select * from record where Password='$password'";
    $res = mysqli_query($conn,$rec);
    $exist = mysqli_num_rows($res);
    if($exist==1){
        header("Location: signin.html");}
    else if(empty($name) || empty($email) || empty($password) || empty($cpassword) || empty($number)){
        header("Location: signin.html"); 
    }
    else if($password!=$cpassword){
        header("Location: signin.html"); 
    }
    else{
        
        $sql = "INSERT INTO record(Name,Email,Phone,Password) VALUES('$name','$email','$number','$cpassword')";
        $res = mysqli_query($conn,$sql);

        if($res){
            echo "<h1 style='font-size:50px;color:orange;text-align:center; width:70%; margin:auto; padding-top:70px; background:linear-gradient(rgb(0,0,23,0.7),rgb(0,0,1,0.7));height:20vh; font-family:sans-serif;'>Thanks!<br><small style='color:aliceblue; font-size:22px;'>Your Form has been submitted succesfully</small></h1>" ;
            echo "<a href='login.html' style='margin-left:15vw;padding-top:40px; color:brown;border-radius:50px; font-size:20px; font-weight:500; text-decoration:none; font-family:sans-serif;'>Go Back</a>";
        
        }
        else{
            echo "<b>Oops! Something went wrong<br>Response not sent.</b>";
        }
    }





}



else{
    header("Location: signin.html"); 
}





?>