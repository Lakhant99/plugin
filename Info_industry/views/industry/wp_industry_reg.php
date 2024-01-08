<?php 
session_start();
print_r($_SESSION);
?> 
<html>
<head>
<title>Register From</title>
<body>
<script>
        function myfun(){ 
        var user = document.getElementById("User").value;
        var pass= document.getElementById("comf").value;
        if (user=="") {
          swal('Oops!', 'Please Fill..Password Is Empty', 'error')
         return false;
        }
        
        if (user.length<5) {
           swal({
                  type: 'error',
                  title: 'Oops!',
                  text: 'Password Length Be Fill More 5 Charecter',
                })
            return false;
        }
        
        if (user!=pass) 
            {
                   
              swal('Oops!', 'Password not match!', 'error')
              return false;

            }
        }
</script>
<?php wp_redirect( home_url() ); ?>
<?php dirname(__FILE__)."/industry_login.php/";
?>
<form action="" onsubmit="return myfun()"  method="POST">
<div class="container">
    <h1>Industry Register</h1>
    <p></p>
    <hr>

    <label for="email"><b>Industry Name</b></label>
    <input type="text" placeholder="Enter Your Industry Name" value="" name="industry_name" required> 

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" value="" name="email" id="txt_uname" required>
    <div id="uname_response" class="response"></div>


    <label for="psw"><b>Password</b></label>
    <input type="Password" placeholder="Enter Password" id="User" value="" name="pwd"><span id="message1" style="color:red"></span></br>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="Password" placeholder="Repeat Password" id="comf" value=""><span id="message" style="color:red"></span></br>
    <hr>

    <button type="submit" name="submit" value="submit" class="registerbtn">Register</button>
  </div>
 
  <div class="container signin">
    <p>Already have an account? <a href="<?php echo home_url();?>/index.php/industrial_department_login/">Sign in</a>.</p>
  </div>

</form>
</head>
</body>
</html>
<?php   
    if (isset($_POST["submit"])){   
        $name = $_POST["industry_name"];
        $email = $_POST["email"];
        $password =$_POST["pwd"];
       
        global $wpdb;
        $url = home_url();

        $result= $wpdb->get_results("SELECT * FROM `wp_industry_registration` WHERE `industry_email` = '".$email."'");
        $count = count($result);    
       if($count==0){
              $result = $wpdb->insert("wp_industry_registration",        
                          array(
                              "industry_name" => $name,
                              "industry_email" => $email,
                              "password" => $password
                              ));
              if($result){
                 echo"<script language='javascript'>
                   sweetAlert('Congratulations!', 'Your Registration Has Been Successfull', 'success');
                  </script>";
                 // echo "<script>location.href = '$url/index.php/in_login/';</script>";
                 //  exit;
               }
            else
              {

                echo"<script language='javascript'>
               swal('Oops!', 'Something went wrong!', 'error')
                </script>";
            }
        }
        else{

          echo"<script language='javascript'>
               swal('Oops!', 'You Have Already Register', 'error')
                </script>";
        }
 }
?>
 