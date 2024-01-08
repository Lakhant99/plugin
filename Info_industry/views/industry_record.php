<?php
 if(isset($_POST["submit"])){
  
  foreach ($_POST['ch_box'] as $i) {
   
    global $wpdb;
   
    $result = $wpdb->delete("wp_industrial_information",array("id" => $i,));

    if($result==''){

          echo"<script language='javascript'>
           sweetAlert('Delete', 'Checked All Record successfully delete', 'success');
          </script>";
       
       }
      
      else
        {
            echo"<script language='javascript'>
         swal('Oops!', 'Something went wrong! Please checked again', 'error')
      </script>";
        }   
    }
  }
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 body{
          background: #fff url(<?php echo $img; ?>) repeat top left;
      }
#industry {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    margin-left: -21%;

}

#industry td, #industry th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

#industry tr:nth-child(even){background-color: #f2f2f2;}

#industry tr:hover {background-color: #ddd;}

#industry th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    /*background-color:rgba(60, 157, 179, 1);*/
    background-color: #4CAF50;
    color: white;
     text-align: center;
}
#selectall{
   /* margin-left: 45%;
    width: 30px;
    height: 22px;
    margin-left: 45%;
    width: 32px;
    height: 19px;
    margin-bottom: -2%;
*/
margin-left: 45%;
    width: 21px;
    height: 22px;
}

</style>
<script>
$(document).ready(function(){
    $("#selectall").click(function(event){
       if(this.checked){
       $('.p').each(function(){
          this.checked = true;
        });
       }else{
         $('.p').each(function(){
          this.checked = false;
        });

       }
    });
    var $submit = $("#submit_prog").hide(),
            $cbs = $('input[name="prog"]').click(function() {
                $submit.toggle( $cbs.is(":checked") );
            });
});
</script>
<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete this?");
}
</script>
</head>
<body>
<br>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" >
  <table id="industry">
       
          <tr>
              <th>Industry Name</th>
              <th>Contact Number</th>
              <th>Email</th>
              <th>Current Location</th>
              <th>Sector/Function Area</th>
              <th>Qulification</th>
              <th>Number of Vacancies</th>
              <th>Work Expriance</th>
              <th>Annual CTC</th>
              <th>Job Location</th>
              <th>Vacancy</th>
              <th>Future Requirement</th>
              <th>Time</th>
              <th>action</th>
          </tr>
      
      <tr>
           <?php foreach($rows as $row){ ?>
            <td><?php echo $row->industry_name;?></td>
            <td><?php echo $row->contact_number;?></td>
            <td><?php echo $row->industry_email;?></td>
            <td><?php echo $row->main_branch_location;?></td>
            <td><?php echo $row->SectoreTitle;?></td>
            <td><?php echo $row->degree_qulification;?></td>
            <td><?php echo $row->emp_recruitment;?></td>
            <td><?php echo $row->Experience;?></td>
            <td><?php echo $row->salary;?></td>
            <td><?php echo $row->drop_location;?></td>
            <td><?php echo $row->vacancy_time;?></td>
            <td><?php echo $row->Feature_requirment;?></td>
            <td><?php echo $row->time;?></td>
            <td><button id="delete" name="delete" type="submit" style="border-radius: 12px;" value="<?php echo $row->id;?>" onclick="return confirmDelete()">Delete</button> <input type="checkbox" class="p" name="ch_box[]" value="<?php echo $row->id;?>">
           

            <a href="<?php echo home_url();?>/index.php/Check?id=<?php echo $row->id;?>">Edit</a>.</p>
           </td>

      </tr>
      <?php } ?> 
      <tr>
         <input type="checkbox" name="prog" id="selectall"> 
          <button type="submit" name="submit" id="submit_prog" value="" style="border-radius: 12px;" onclick="return confirmDelete()">Delete</button>

      </tr>

  </table>

</form>
</body>
</html>
<?php
    if (isset($_POST["delete"])){ 
     global $wpdb;

      $result = $wpdb->delete("wp_industrial_information",array("id" => $_POST["delete"],));
      if($result){

          echo"<script language='javascript'>
           sweetAlert('Delete', 'Your successfully delete', 'success');
          </script>";
           echo "<script type='text/javascript'>window.location.href='". home_url() ."/home/'</script>";
       
       }
      
      else
        {
            echo"<script language='javascript'>
         swal('Oops!', 'Something went wrong!', 'error')
      </script>";
        }
     
    }?>
