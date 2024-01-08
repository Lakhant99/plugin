<?php
global $wpdb;
//$rows = $wpdb->get_results("SELECT * from `wp_industrial_information`");
//$data = $wpdb->get_results("SELECT * from `wp_education_information`");
$rows = $wpdb->get_results("SELECT i.*,t.SectoreTitle FROM `wp_industrial_information` i ,`WP_Sectore_data` t WHERE i.dept_sectore = t.SectoreID ");
$data = $wpdb->get_results("SELECT e.*,t.SectoreTitle from `wp_education_information` e, `WP_Sectore_data` t WHERE e.edu_sectore = t.SectoreID ");

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 body{
          background: #fff url(<?php echo $img; ?>) repeat top RIGHT;
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
    background-color: #4CAF50;
    color: white;
}
</style>
</head>
<body>
<br>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<table id="industry">
<h1>Industry</h1>
  <tr>
    <th>Industry_Name</th>
    <th>Contact Number</th>
    <th>Current Location</th>
    <th>Sectore/Function Area</th>
    <th>Qulification</th>
    <th>Number of Vacancies</th>
    <th>Work Expriance</th>
    <th>Annual CTC</th>
    <th>Job Location</th>
    <th>Vacancy</th>
    <th>Feature Requirement</th>
    <th>fild values</th>
  </tr>
  <tr>
  
     <?php foreach($rows as $row){ ?>
    <td><?php echo $row->industry_name;?></td>
    <td><?php echo $row->contact_number;?></td>
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

    </td>
  </tr>
  <?php } ?> 

</table>

<br>
<br>
<h1>Education Department</h1>
<table id="industry">
<tr>
    <th>Name of University</th>
    <th>Qulification</th>
    <th>Sectore</th>
    <th>Total Student</th>
    <th>Free Student</th>
  </tr>
  <tr>
  
     <?php foreach($data as $d){ ?>
    <td><?php echo $d->dept_name;?></td>
    <td><?php echo $d->degree_education;?></td>
    <td><?php echo $d->SectoreTitle;?></td>
    <td><?php echo $d->Total_student;?></td>
    <td><?php echo $d->free_student;?></td>

    </td>
  </tr>
  <?php }?>
</table>
</form>
</html>
