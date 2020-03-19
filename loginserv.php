<?php
include 'connect.php';
session_start();

$error=''; //Variable to Store error message;
/*$secretkey='6Lfrem0UAAAAAACn9uavRdhT2ELqB6dZ0gddNwPd';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['g-recaptcha-response'])){}
}    */

    if(empty($_POST['username1']) || empty($_POST['password1'])){
        header("location:Loginpage.php?Empty= Please Fill in the Blanks");   
        // complete this error check yourself
    }
    else
    {
        //Define $user and $pass
        $user=$_POST['username1'];
        $pass=$_POST['password1'];

        //sql query to fetch information of registerd user and finds user match.
        $query = mysqli_query($conn, "select * from guestuser where username='".$_POST['username1']."' and password='".$_POST['password1']."'");
        $rows = mysqli_num_rows($query);
        
    if($rows == 1){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['usertype'] = $row['User_type'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['user_ID'];
        $_SESSION['firstname'] = $row['first_name'];
        $_SESSION['lastname'] = $row['last_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['mobile'] = $row['mobile_number'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['user_status'] = $row['user_status'];
        
    
        $_SESSION["is_auth"] = true;
        
        if($_SESSION['user_status'] === 'Deactive'){
            header("location: Loginpage.php?deacterror='User account is currently deactive. Please contact admin for activation.");} 
            else{
                    if($_SESSION['usertype'] === 'guest'){        
                    header("location: homepage.php");
                    }elseif($_SESSION['usertype'] === 'admin'){
                        header("location: adminpage.php");
                    }else{header("location: homepage.php");

                    }
                }
            
        }else
        {
              header("location:Loginpage.php?Invalid= Please Enter Correct User Name and Password ");
        }
    }
        
    
        mysqli_close($conn); // Closing connection
    

?>