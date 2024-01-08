<?php 
session_start();
 //print_r($_SESSION);
// exit;
?> 
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
                <h1><strong>Update Form For<span>Department</span></strong></h1>
       
            </header>
            <section>               
                <div id="container_demo" >
                    <div id="wrapper">
                        <div id="login" class="animate form">
                        <?php// print_r($Records);?>
                        <?php foreach ($Records as $res) {?>
                       
                       
                         <form  action="" method="post"> 
                                <p> 
                                    <label for="name of industry" class="uname" data-icon="u">Department Name:</label>
                                    <input id="usernamesignup" name="industry_name" value="<?php echo $res->dept_name;?>" required="required" type="text" />
                                </p>
                              
                               <p>
                                 <label for="Email" class="youremail" data-icon="p">Email</label>
                                 <input type="email" name="email" value="<?php echo $res->dept_email;?>" required="required">
                               </p>

                              <p>
                                 <label>Select the Degree</label>
                                <input type="checkbox" name="education[]" value="Graduate">Graduate<br>
                                <input type="checkbox" name="education[]" value="Post Graduate" checked>Post Graduate<br>
                                  </p> 
                                  

                                  <p>
                                  <label for="inputPassword3" class="col-sm-2 control-label">Sector/Function Area</label>
                                    <select class="form-control" name="sectore" required>
                                
                                    <option value="<?php echo $res->edu_sectore;?>"><?php echo $res->edu_sectore;?></option>

                                   <?php foreach($rows as $row){?>

                        
                                        <option value="<?php echo $row->SectoreID;?>"> <?php echo $row->SectoreTitle;?>
                                     <?php } ?> 
                                     </select>

                                  </p>

                                <p> 
                                  <label for="student" class="student">Total Student:</label>
                                   <input type="Number" name="total_student" value="<?php echo $res->Total_student;?>" placeholder="How Many Student Related To Branch" required="required">
                                </p> 
                               
                                <p> 
                                   <label for="pass" class="pass">Pass Students:</label>
                                   <input type="Number" name="total_pass" value="<?php echo $res->total_pass_student;?>" placeholder="Number of Pass Student" required="required">
                                </p>

                                <p> 
                                   <label for="pass" class="pass">fail Students:</label>
                                   <input type="Number" name="total_fail" value="<?php echo $res->total_fail_student;?>" placeholder="Number of Pass Student" required="required">
                                </p>

                               
                                <p>                                 
                                    <label for="placement" class="placement">Placements:</label>
                                   <input type="Number" name="total_placement" value="<?php echo $res->placement;?>" required="required">
                                </p>

                                <p>
                                <label for="placement" class="placement">Companies:</label>
                                   <input type="Number" name="company" value="<?php echo $res->company_name;?>" required="required">                                
                                </p>

                                
                                <p>
                                    <label for="placement" class="placement">Free Student:</label>
                                   <input type="Number" name="total_free" value="<?php echo $res->free_student;?>" required="">
                                </p> 
                              

                                <button type="submit" value="Sign up"  id="button" name="insert">Submit</button>                              
                            </form> 
                                 <?php } ?> 

                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>
</body>
</html>    
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
        $chk=""; 
        foreach($checkbox1 as $chk1)  
           {  
              $chk .= $chk1.",";  
           }
        global $wpdb;
            $result = $wpdb->update("wp_education_information",        
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
                        "free_student" =>$Free

                        ),array("id" => $submit_id));
  
if($result){
         
          echo"<script language='javascript'>
             sweetAlert('Congratulations!', 'Your update Successfull', 'success');
            </script>";
           // header("location: home.php");
             echo "<script type='text/javascript'>window.location.href='". home_url() ."/home/'</script>"; 
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
   