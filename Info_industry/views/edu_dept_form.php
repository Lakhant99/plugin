  <?php global $user_ID, $user_identity;
 if (!$user_ID) { ?>
      <?php $register = $_GET['register']; $reset = $_GET['reset'];
 } 
  else { // is logged in ?>
  <div class="sidebox">
    <h3>Welcome, <?php echo $user_identity; ?></h3>
  </div>
 <?php } ?>
<?php 
global $wpdb;
$rows = $wpdb->get_results("SELECT * FROM `WP_Sectore_data` ");
?>
<!DOCTYPE html>
 <html> 
    <head>
        <meta charset="UTF-8" />
        <title>Reinforce</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="<?php echo PLUGIN_URL."/Reinforce/assets/css/sweet-alert.css" ?>" />
    </head>
    <body onload="initialize()">
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
            <?php //echo $_SERVER['REQUEST_URI']; ?>
                <div class="clr"></div>
            </div>
            <header>
                <h1><strong>Education Form For<span>Department</span></strong></h1>
       
            </header>
            <section>               
                <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form">

                         <form  action="" method="post"> 
                            
                                <p> 
                                    <label for="name of industry" class="uname" data-icon="u">Department Name:</label>
                                    <input id="usernamesignup" name="industry_name" value="" required="required" type="text" placeholder="Enter Your Industry Name" />
                                </p>
                              
                               <p>
                                 <label for="Email" class="youremail" data-icon="p">Email</label>
                                 <input type="email" name="email" value="" required="required" placeholder="eg.abc@gmail.com">
                               </p>

                              <p>
                                 <label>Select the Degree</label>
                                <input type="checkbox" name="education[]" value="Graduate">Graduate<br>
                                <input type="checkbox" name="education[]" value="Post Graduate" checked>Post Graduate<br>
                                  </p> 
                                  

                                  <p>
                                  <label for="inputPassword3" class="col-sm-2 control-label">Sectore/Function Area</label>
                                    <select class="form-control" name="sectore" required>
                                
                                    <option value="">Select an Option</option>

                                   <?php foreach($rows as $row){?>

                        
                                        <option value="<?php echo $row->SectoreID;?>"> <?php echo $row->SectoreTitle;?>
                                     <?php } ?> 
                                     </select>

                                  </p>

                                <p> 
                                  <label for="student" class="student">Total Student:</label>
                                   <input type="Number" name="total_student" value="" placeholder="How Many Student Related To Branch" required="required">
                                </p> 
                               
                                <p> 
                                   <label for="pass" class="pass">Pass Students:</label>
                                   <input type="Number" name="total_pass" value="" placeholder="Number of Pass Student" required="required">
                                </p>

                                <p> 
                                   <label for="pass" class="pass">fail Students:</label>
                                   <input type="Number" name="total_fail" value="" placeholder="Number of Pass Student" required="required">
                                </p>

                               
                                <p>                                 
                                    <label for="placement" class="placement">Placements:</label>
                                   <input type="Number" name="total_placement" placeholder="Number of placement Student" required="required">
                                </p>

                                <p>
                                <label for="placement" class="placement">Companies:</label>
                                   <input type="Number" name="company" placeholder="Number of placement Student" required="required">                                
                                </p>

                                
                                <p>
                                    <label for="placement" class="placement">Free Student:</label>
                                   <input type="Number" name="total_free" placeholder="Number of placement Student" required="">
                                </p> 

                                <p>
                                <input type="hidden" name="user" value="<?php echo $user_identity;?>" >
                                </p>

                                <button type="submit" value="Sign up"  id="button" name="insert">Submit</button>                              
                            </form> 
                            
                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>
    <?php   
    if (isset($_POST["insert"])){   
        $name = $_POST["industry_name"];
        $email = $_POST["email"];
        $checkbox1=$_POST['education']; 
        $sectore = $_POST["sectore"];
        $total_student=$_POST['total_student'];
        $total_pass=$_POST['total_pass'];
        $total_fail =$_POST['total_fail'];
        $total_placement=$_POST['total_placement'];
        $company =$_POST['company'];
        $Free=$_POST['total_free'];
        $primary=$_POST['user'];
        $chk=""; 
        foreach($checkbox1 as $chk1)  
           {  
              $chk .= $chk1.",";  
           }

        global $wpdb;
     
        $result = $wpdb->insert("wp_education_information",        
                    array(
                        "dept_name" => $name,
                        "dept_email" => $email,
                        "degree_education" => $chk,
                        "edu_sectore" => $sectore,
                        "Total_student" =>$total_student,
                        "total_pass_student" =>$total_pass,
                        "total_fail_student" =>$total_fail,
                        "placement" =>$total_placement,
                        "company_name" =>$company,
                        "free_student" =>$Free,
                        "user_name" =>$primary
                        ));
        if($result){
         
          echo"<script language='javascript'>
             sweetAlert('Congratulations!', 'Your Registration Has Been Successfull', 'success');
            </script>";
            echo "<script type='text/javascript'>window.location.href='". home_url() ."/home/'</script>"; 
            //header("location: home.php");
                exit;
            
         }
        else
          {

            echo"<script language='javascript'>
           swal('Oops!', 'Something went wrong!', 'error')
            </script>";
        }
 }
?>
</body>
</html>    
   