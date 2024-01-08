  <?php
   global $wpdb, $user_ID;  
    
    if ($user_ID) 
    {  
       
        header( 'Location:' . home_url() );  
       
    } 
    else
     {  
            
       $errors = array();  
       
        if( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
          {  
       
            $username = $wpdb->escape($_REQUEST['username']);  
       
            if (strpos($username, ' ') !== false)
            {   
                $errors['username'] = "Sorry, no spaces allowed in usernames";  
            }  
           
            if(empty($username)) 
            {   
                $errors['username'] = "Please enter a username";  
            } 
            
            elseif(username_exists( $username )) 
            {  
                $errors['username'] = "Username already exists, please try another";  
            }  
       
            // Check email address is present and valid  
            
            $email = $wpdb->escape($_REQUEST['email']);  
            
            if(!is_email($email)) 
            {   
                $errors['email'] = "Please enter a valid email";  
            } 

            elseif( email_exists( $email ) ) 
            {  
                $errors['email'] = "This email address is already in use";  
            }  
       
            // Check password is valid  
            if(0 === preg_match("/.{6,}/", $_POST['password']))
            {  
              $errors['password'] = "Password must be at least six characters";  
            }  
       
            // Check password confirmation_matches  
            if(0 !== strcmp($_POST['password'], $_POST['password_confirmation']))
             {  
              $errors['password_confirmation'] = "Passwords do not match";  
            }  
       
            // Check terms of service is agreed to  
            if($_POST['terms'] != "Yes")
            {  
                $errors['terms'] = "You must agree to Terms of Service";  
            }  
       
            if(0 == count($errors)) 
             {  
       
                $password = $_POST['password'];  
       
                //$new_user_id = wp_create_user( $username, $password, $email );
                 $user_id = wp_insert_user( array ('user_login' => apply_filters('pre_user_user_login', $username),'user_pass' => apply_filters('pre_user_user_pass', $password),'user_email' => apply_filters('pre_user_user_email', $email),'role' => 'author'));
            
            if( is_wp_error($user_id) ) {
                $error= 'Error on user creation.';
            } 

            else {
                do_action('user_register', $user_id);
                
                $success = 'You\'re successfully register';

                header( 'Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username ); 
                return $user_id;
            }
       
            }  
       
        }  
    }  
      
    ?>  
      <h1>Education Department</h1>
    <form id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">  
    
            <label for="username">Username</label>  
            <input type="text" name="username" id="username" required="" placeholder="ex.abc@gmail.com"><br>  
            <label for="email">Email address</label>  
            <input type="text" name="email" id="email" required="" placeholder="ex.abc@gmail.com">  <br>
            <label for="password">Password</label>  
            <input type="password" name="password" id="password" required="" placeholder="Password Minimum 6 characters"><br>  
            <label for="password_confirmation">Confirm Password</label>  
            <input type="password" name="password_confirmation" id="password_confirmation">  <br>
      
            <input name="terms" id="terms" type="checkbox" value="Yes">  
            <label for="terms">I agree to the Terms of Service</label> <br> 
      
            <input type="submit" id="submitbtn" name="submit" value="Sign Up" />  
      
    </form>  