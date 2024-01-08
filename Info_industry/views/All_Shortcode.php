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
    width: 100%;
}

#industry td, #industry th {
    border: 1px solid #ddd;
    padding: 8px;
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
}
#selectall{
     margin-left: 81%;

}
</style>
</head>
<body>
<br>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  <table id="industry">
       
          <tr>
               <th>Name</th>
               <th>Shortcode</th>
          </tr>
      
      <tr>
           <td>Registration Form Industry</td>
           <td>[Industry_form_register]</td>
      </tr>
      <tr>
           <td>Industrial Record</td>
           <td>[industrial_data_record]</td>
      </tr>
        <tr>
           <td>Education Form for Department</td>
           <td>[Education_department_form]</td>
      </tr>
       <tr>
           <td>Both Record</td>
           <td>[both_detail]</td>
      </tr>
      <tr>
           <td>Final Record</td>
           <td>[All_detail]</td>
      </tr>
      <tr>
           <td>Industry(Company) Registration</td>
           <td>[Register_Industry]</td>
      </tr>
       <tr>
           <td>Update Record For Industry </td>
           <td>[Industry_update_record]</td>
      </tr>
       <tr>
           <td>Industrial Login Page </td>
           <td>[In_industry_login]</td>
      </tr>
      <tr>
           <td>Department Registration </td>
           <td>[Department_register]</td>
      </tr>
      <tr>
           <td>Update Record For Education Department </td>
           <td>[education_update_record]</td>
      </tr>





  </table>
  <br><br><br><br><br>
    <h4>1.<?php echo $_SERVER['REQUEST_URI']; ?></h4>
    <h4>2.<?php echo site_url();?></h4>
    <h4>3.<?php echo home_url();?></h4>
    <h4>4.<?php echo basename($_SERVER['REQUEST_URI']);?></h4>
    <h4>5.<?php echo $_SERVER['REQUEST_URI']; ?></h4>
    <h4>6.<?php echo dirname(__FILE__);?></h4>
    <h4>7.<?php echo plugins_url();?></h4>
    <h4>8.<?php //wp_redirect( home_url() ); ?></h4>
    <h4>9.<?php echo home_url();?></h4>


</form>
</body>
</html>