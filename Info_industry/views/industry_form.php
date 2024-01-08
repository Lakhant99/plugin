  <?php global $user_ID, $user_identity;
 if (!$user_ID) { ?>
  
      <?php $register = $_GET['register']; $reset = $_GET['reset'];
 } 
  else { // is logged in ?>
  <div class="sidebox">
    <h3>Welcome, <?php echo $user_identity; ?></h3>
    <div class="userinfo">
      <p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
    </div>
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

        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBS06-JprKOuNZv-2Nzco2tXbogr4YN2B0&libraries=places&callback=initAutocomplete" async defer></script>
          <script>

                   var placeSearch, autocomplete, dropLocation;

                   function initAutocomplete() {
                        autocomplete = new google.maps.places.Autocomplete(
                        (document.getElementById('autocomplete')), {
                          types: ['geocode']
                        });
                        dropLocation = new google.maps.places.Autocomplete(
                        (document.getElementById('Drop_Location')), {
                          types: ['geocode']
                        });
                    }          
        </script>
       
    </head>
    <body onload="initialize()">
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
            <?php// echo $_SERVER['REQUEST_URI']; ?>
                <div class="clr"></div>
            </div>
            <header>
                
       
            </header>
            <section>               
                <div id="container_demo" >
                    <div id="wrapper">
                    <h1><strong>Registration Form For <span>Industry</span></strong></h1>
                        <div id="login" class="animate form">

                         <form  action="" method="post"> 
                        
                                <p> 
                                    <label for="name of industry" class="uname" data-icon="u">Industry Name:</label>
                                    <input id="usernamesignup" name="industry_name" value="" required="required" type="text" placeholder="Enter Your Industry Name" />
                                </p>
                              
                               
                                <p> 
                                    <label for="Contant Number" class="youcontact" data-icon="p">Contact Number : </label>
                                    <input id="number" name="contact_number" value="" required="required" type="text" placeholder="eg.1234567890" required/>
                               </p>

                               <p>
                                 <label for="Email" class="youremail" data-icon="p">Email</label>
                                 <input type="email" name="email" value="" required="required" placeholder="eg.abc@gmail.com">
                               </p>

                              <p id="locationField">
                                 <label for="" class="youlocation" data-icon="p">Current Location :</label>
                                 <input type="text" value="" name="location" id="autocomplete" placeholder="Enter your address" required>
                                  </p> 
                                  

                                  <p>
                                  <label for="inputPassword3" class="col-sm-2 control-label">Sector/Function Area</label>
                                    <select class="form-control" name="sectore" required>
                                
                                    <option value="">Select an Option</option>

                                   <?php foreach($rows as $row){?>

                        
                                        <option value="<?php echo $row->SectoreID;?>"> <?php echo $row->SectoreTitle;?>
                                     <?php } ?> 
                                     </select>
                                  </p>

                                <p> 
                                  <label for="Qulification" class="youqulification" >Qulification :</label><br>
                                <input type="checkbox" name="qulification[]" value="Graduate" checked=""> Graduate<br>
                                <input type="checkbox" name="qulification[]" value="Post Graduate"> Post Graduate Degree & Masters <br>
                                </p> 
                               
                                <p> 
                                    <label for="Requirement" class="your" data-icon="p">Number of Vacancies :</label>
                                    <input id="required" name="emp_recruitment" value="" required="required" type="text" placeholder="eg. Currently Requirement"/>
                                </p>

                               
                                <p>                                 
                                    <label for="Expriance" class="youexpriance" data-icon="p">Work Expriance :</label>
                                    <select class="form-control" name="Experience" required>
                                       <option value="">Select an Option</option>
                                        <option value="less then 1">less then 1 year</option>
                                        <option value="1 year">1 year</option>
                                        <option value="2 year">2 year</option>
                                        <option value="3 year">3 year</option>
                                        <option value="4 year">4 year</option>
                                        <option value="5 year">5 year</option>
                                        <option value="6 year">6 year</option>
                                        <option value="7 year">7 year</option>
                                        <option value="8 year">8 year</option>
                                        <option value="9 year">9 year</option>
                                        <option value="10 year">10 year</option>
                                        <option value="10 year More++">10 year More++</option>
                                        
                                    </select>
                                </p>

                                <p>
                                <label for="Salary" class="yoursalary" data-icon="p">Annual CTC:</label>
                                <select class="form-control" name="salary" required>
                                       <option value="">Select an Option</option>
                                         <option value="less then 1 lakh">less then 1 lakh</option>
                                        <?php
                                            for ($i=1; $i<=30; $i++)
                                            {
                                                ?>
                                                    <option value="<?php echo $i.'&nbsp;lakh';?>"><?php echo $i.'&nbsp;lakh';?></option>
                                                <?php
                                            }
                                        ?> 
                                        <option value="less then 1">3o more++</option>                                     
                                    </select>                                   
                                </p>

                                
                                <div id="locationField">
                                   <label for="Location" class="youlocation" data-icon="p">Job Location:</label>
                                   <input type="text" value="" name="drop_location" id="Drop_Location" placeholder="Enter location" class="rsform-input-box" required>
                                </div> 

                                <p>
                                <label for="Salary" class="yoursalary" data-icon="p">How Long You Have This Vacancy:</label>
                                <select class="form-control" name="vacancy" required>
                                       <option value="">Select an Option</option>
                                       <option value="less then 1 Months">less then 1 Months</option>
                                        <option value="1 Month">1 Month</option>
                                        <option value="2 Month">2 Month</option>
                                        <option value="3 Month">3 Month</option>
                                        <option value="4 Month">4 Month</option>
                                        <option value="5 Month">5 Month</option>
                                        <option value="6 Month">6 Month</option>
                                        <option value="7 Month">7 Month</option>
                                        <option value="8 Month">8 Month</option>
                                        <option value="9 Month">9 Month</option>
                                        <option value="10 Month">10 Month</option>
                                        <option value="11 Month">11 Month</option>
                                        <option value="12 Month">12 Month</option>
                                        <option value="12 Month">12 Months More++</option>
                                    </select>
                                </p>
                               

                                 <p>                                 
                                    <label for="Requirement" class="youexpriance" data-icon="p">Future Requirement :</label>
                                    <select class="form-control" name="Feature" required>
                                       <option value="">Select an Option</option>
                                         <?php
                                            for ($i=1; $i<=30; $i++)
                                            {
                                                ?>
                                                    <option value="<?php echo $i.'&nbsp;';?>"><?php echo $i.'&nbsp;';?></option>
                                                <?php
                                            }
                                        ?> 
                                        <option value="30 More++">30 More++</option>
                                        
                                    </select>
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
        $contact = $_POST["contact_number"];
        $email = $_POST["email"];
        $location = $_POST["location"];
        $sectore = $_POST["sectore"];
        $requirment = $_POST["emp_recruitment"];
        $vacancy = $_POST["vacancy"];
        $drop_location = $_POST["drop_location"];
        $checkbox1=$_POST['qulification']; 
        $Experience=$_POST['Experience'];
        $salary=$_POST['salary'];
        $Feature=$_POST['Feature'];
        $primary=$_POST['user'];
        $chk=""; 
        foreach($checkbox1 as $chk1)  
           {  
              $chk .= $chk1.",";  
           }

        global $wpdb;
     
        $result = $wpdb->insert("wp_industrial_information",        
                    array(
                        "industry_name" => $name,
                        "contact_number" => $contact,
                        "industry_email" => $email,
                        "main_branch_location" => $location,
                        "dept_sectore" => $sectore,
                        "degree_qulification" => $chk,
                        "emp_recruitment" => $requirment,
                        "Experience" => $Experience,
                         "salary" => $salary,
                         "vacancy_time" => $vacancy,
                         "drop_location" => $drop_location,
                        "Feature_requirment" => $Feature,
                        "user_name" =>$primary
                        // "noties_period" => $noties

                        ));
        if($result){
         
          echo"<script language='javascript'>
             sweetAlert('Congratulations!', 'Your Registration Has Been Successfull', 'success');
            </script>";
            //header("location: home.php");
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
</body>
</html>    
   