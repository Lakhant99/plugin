<?php
global $wpdb;
$rows = $wpdb->get_results("SELECT i.`dept_sectore` as Sectore, p.`SectoreTitle`,SUM(i.emp_recruitment) as Requirment FROM `wp_industrial_information` i,`WP_Sectore_data` p WHERE p.SectoreID = i.dept_sectore GROUP By i.`dept_sectore`");
$educations = $wpdb->get_results("SELECT s.`edu_sectore` as Sectore, p.`SectoreTitle`, SUM(s.free_student) as FreeStudents, SUM(s.Total_student) as TotalStudents FROM `wp_education_information` s ,`WP_Sectore_data` p WHERE p.`SectoreID`= s.`edu_sectore` GROUP By s.`edu_sectore`"); 
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
    width: 100%;
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
}
#tab1_login{
    margin: auto;
    width: 53%;
    border: 3px solid #2ea731;
    background-color: #e6e6e6ed;
    padding: 10px;
}

</style>
</head>
<body>
<?php// print_r($rows);?>
<br>
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<table id="industry">
  <tr>
 <!--  <th>test</th> -->
    <th>Sectore / Function Area</th>
    <th>Total Student</th>
    <th>Free Student</th>
    <th>Total Requirment</th>
 </tr>
         <?php foreach ($educations as $edu) { //print_r($key); ?>
          <tr>
      
        
              <td><?php $a = $edu->SectoreTitle; echo $a;  ?></td>
              <td><?php echo $edu->TotalStudents;?></td>
              <td><?php echo $edu->FreeStudents;?></td>
               
                     <?php foreach($rows as $row){                        
                            $b=$row->SectoreTitle;?>
                        <?php if($a == $b){ ?>
                        
                            <td><?php echo $row->Requirment;?></td>
                        
                        <?php }
                    
                      else {?>
                       <!-- <td><?php //echo "no Requirment" ;?></td>  -->               
                       
                       <?php } }?>
                 
                 
   <?php } ?> 
 </tr>
</table>
</form>
<div id="login-register-password">

  <?php global $user_ID, $user_identity; if (!$user_ID) { ?>

  <ul class="tabs_login">
  <!--  <li class="active_login"><a href="#tab1_login">Login</a></li> -->
    <!-- <li><a href="#tab2_login">Register</a></li>
    <li><a href="#tab3_login">Forgot?</a></li> -->
  </ul>
  <div class="tab_container_login">
    <div id="tab1_login" class="tab_content_login">

      <?php $register = $_GET['register']; $reset = $_GET['reset']; if ($register == true) { ?>

      <h3>Success!</h3>
      <p>Check your email for the password and then return to log in.</p>

      <?php } elseif ($reset == true) { ?>

      <h3>Success!</h3>
      <p>Check your email to reset your password.</p>

      <?php } else { ?>

      <h3>Have an account?</h3>
      <p>Log in or sign up! It&rsquo;s fast &amp; <em>free!</em></p>

      <?php } ?>

      <form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
        <div class="username">
          <label for="user_login"><?php _e('Username'); ?>: </label>
          <input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
        </div>
        
        <div class="password">
          <label for="user_pass"><?php _e('Password'); ?>: </label>
          <input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
        </div>
        <div class="login_fields">
          <div class="rememberme">
            <label for="rememberme">
              <input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> Remember me
            </label>
          </div>
          <?php do_action('login_form'); ?>
          <input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />
          <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
          <input type="hidden" name="user-cookie" value="1" />
        </div>
      </form>
    </div>
    <div id="tab2_login" class="tab_content_login" style="display:none;">
      <h3>Register for this site!</h3>
      <p>Sign up now for the good stuff.</p>
      <form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
        <div class="username">
          <label for="user_login"><?php _e('Username'); ?>: </label>
          <input type="text" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="101" />
        </div>
        <div class="password">
          <label for="user_email"><?php _e('Your Email'); ?>: </label>
          <input type="text" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102" />
        </div>
        <div class="login_fields">
          <?php do_action('register_form'); ?>
          <input type="submit" name="user-submit" value="<?php _e('Sign up!'); ?>" class="user-submit" tabindex="103" />
          <?php $register = $_GET['register']; if($register == true) { echo '<p>Check your email for the password!</p>'; } ?>
          <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
          <input type="hidden" name="user-cookie" value="1" />
        </div>
      </form>
    </div>
    <div id="tab3_login" class="tab_content_login" style="display:none;">
      <h3>Lose something?</h3>
      <p>Enter your username or email to reset your password.</p>
      <form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
        <div class="username">
          <label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
          <input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
        </div>
        <div class="login_fields">
          <?php do_action('login_form', 'resetpass'); ?>
          <input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit" tabindex="1002" />
          <?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
          <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
          <input type="hidden" name="user-cookie" value="1" />
        </div>
      </form>
    </div>
  </div>

  <?php } else { // is logged in ?>

  <div class="sidebox">
    <h3>Welcome, <?php echo $user_identity; ?></h3>
    <div class="usericon">
      <?php global $userdata; echo get_avatar($userdata->ID, 60); ?>

    </div>
    <div class="userinfo">
      <p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
     <p>
        <!-- <a href="<?php //echo wp_logout_url(); ?>">Log out</a> | 
        <?php //if (current_user_can('manage_options')) { 
          //echo '<a href="' . admin_url() . '">' . __('Admin') . '</a>'; } else { 
          //echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>'; } ?> -->

      </p> 
    </div>
  </div>

  <?php } ?>

</div>

</body>
</html>
