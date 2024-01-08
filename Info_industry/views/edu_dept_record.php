<?php
 if(isset($_POST["submit"])){
  
  foreach ($_POST['ch_box'] as $i) {
   
    global $wpdb;
   
    $result = $wpdb->delete("wp_education_information",array("id" => $i,));

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
        margin-left: 0%;

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
    text-align: left;
    /*background-color:rgba(60, 157, 179, 1);*/
    background-color: #4CAF50;
    color: white;
   
    text-align: center;
}
#selectall{
    margin-left: 45%;
    width: 21px;
    height: 22px;

}
</style>
<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete this?");
}
</script>
</head>
<body>
<br>
<?php //echo $_SERVER['REQUEST_URI']; ?>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
 <!-- <?php// print_r($rows);
//die();
?>  -->

<table id="industry">
  <tr>
    <th>Education Department Name</th>
    <th>Email</th>
    <th>Qulification</th>
    <th>Sector/Function Area</th>  
    <th>Total Student</th>
    <th>Pass Student</th>
    <th>Fail Student</th>
    <th>Number of Placement</th>
    <th>Campus</th>
    <th>Fee Student</th>
    <th>Action</th>
  </tr>
  <tr>
   <?php foreach($rows as $row){ ?>
    <td><?php echo $row->dept_name;?></td>
    <td><?php echo $row->dept_email;?></td>
    <td><?php echo $row->degree_education;?></td>
    <td><?php echo $row->SectoreTitle;?></td>
     <td><?php echo $row->Total_student;?></td>
     <td><?php echo $row->total_pass_student  ;?></td>
     <td><?php echo $row->total_fail_student;?></td>
     <td><?php echo $row->placement;?></td>
     <td><?php echo $row->company_name;?></td>
     <td><?php echo $row->free_student;?></td>
      <td><button id="delete" name="delete" type="submit" style="border-radius: 12px;" value="<?php echo $row->id;?>" onclick="return confirmDelete()">Delete</button> <input type="checkbox" class="p" name="ch_box[]" value="<?php echo $row->id;?>">
            <a href="<?php echo home_url();?>/index.php/eCheck?id=<?php echo $row->id;?>">Edit</a>.</p>
      </td>
    
  </tr>
  <?php } ?> 
   <tr>
          <input type="checkbox" name="prog" id="selectall">
          <button type="submit" name="submit" id="submit_prog" value="" style="border-radius: 12px;"onclick="return confirmDelete()">Delete</button>
      </tr>
</table>
</form>
</body>
</html>
<?php
    if (isset($_POST["delete"])){ 
     global $wpdb;

      $result = $wpdb->delete("wp_education_information",array("id" => $_POST["delete"],));
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
