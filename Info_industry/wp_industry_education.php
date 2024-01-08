<?php
	/*
		Plugin Name: Reinforce-Industrial and Education Record Data  
		Plugin URI: http;//reinforcewebsol.com
		Description: This plugin for WordPress allows you save all submitted Industrial and Education Record Data to database and display in Database menu
		Author: Reinforce Software Application
		Author URI: http;//reinforcewebsol.com
		Text-Domain: Reinforce 
		Version: 1.0.1
   */  
	
    define("PLUGIN_DIR_PATH", dirname(__FILE__));
    define("PLUGIN_URL", plugins_url());
    define("PLUGIN_VERSION", "1.0.1");
  


	function wp_register_industry_edu_menu_plugin(){

		add_menu_page('IndustrialPlugin','Industrial','manage_options','Industry-Database','industry_registration_form','dashicons-admin-multisite','11');
		add_submenu_page('Industrial-Database','Add-new','Add-new','manage_options','Industry-information','industry_registration_form');
		add_submenu_page('Industry-Database','Add-new','Industrial_Record','manage_options','information','show_industry_record');
		add_submenu_page('Industry-Database','department','Education_Form','manage_options','edu_form','education_department_registration');
	    add_submenu_page('Industry-Database','education_record','Education_Record','manage_options','edu_record','show_education_dept_record');
	    add_submenu_page('Industry-Database','both_record','Both_Record','manage_options','all_record','show_both_record');
	    add_submenu_page('Industry-Database','Final_record','Final_Record','manage_options','Final_record','wp_show_final_result');
	    add_submenu_page('Industry-Database','Industry_register','Industry_Register','manage_options','reg_industry','wp_industry_registration_form');
	    add_submenu_page('Industry-Database','edit_record','Industry_Update','manage_options','industry_update','wp_update_industry_record');
	    add_submenu_page('Industry-Database','industry_login','Login','manage_options','industrial_department_login','wp_industry_login');
	    add_submenu_page('Industry-Database','Department_register','Department_Register','manage_options','reg_department','wp_Department_registration_form');
	    add_submenu_page('Industry-Database','education_edit','Department_Update','manage_options','edit_department','wp_update_education_record');
	    add_submenu_page('Industry-Database','education_login','Department_Login','manage_options','education_department_login','wp_education_dept_login');  
        add_submenu_page('Industry-Database','short_code','Shortcode','manage_options','short_code_test','shortcode');
        //add_submenu_page('Industry-Database','login','login','manage_options','login','wp_login');

        //add_submenu_page('Industry-Database','test','Check','manage_options','check_test','wp_show_test');
	}	
	add_action('admin_menu', 'wp_register_industry_edu_menu_plugin');

	function add_industry_edu_assets(){


		wp_enqueue_style("font_style",PLUGIN_URL."/Reinforce/assets/css/font-awesome.min.css",array(),"PLUGIN_VERSION");
	    wp_enqueue_script("sweet_msg",PLUGIN_URL."/Reinforce/assets/js/sweet_msg.js",array(),"PLUGIN_VERSION",false);
	    wp_enqueue_script("jquery.min",PLUGIN_URL."/Reinforce/assets/js/jquery-3.1.1.min.js",array(),"PLUGIN_VERSION",false);    
	}
    add_action('init','add_industry_edu_assets');

 /* Add Industrial information */

	function industry_registration_form(){

		
		    include_once PLUGIN_DIR_PATH."/views/industry_form.php";	
	}
	add_shortcode( 'Industry_form_register', 'industry_registration_form' );

	function show_industry_record(){ 
		global $wpdb;
        //$rows = $wpdb->get_results("SELECT * FROM `wp_industrial_information`");
        //$rows = $wpdb->get_results("SELECT i.*,t.SectoreTitle FROM `wp_industrial_information` i ,`WP_Sectore_data` t WHERE i.dept_sectore = t.SectoreID");

       $rows = $wpdb->get_results("SELECT i.*,t.SectoreTitle FROM `wp_industrial_information` i ,`WP_Sectore_data` t, `wp_users` w WHERE i.dept_sectore = t.SectoreID AND w.user_login = i.user_name");
         
        include_once PLUGIN_DIR_PATH."/views/industry_record.php";
	}
	add_shortcode( 'industrial_data_record', 'show_industry_record' );

	function industrial_custome_table(){

	 	global $wpdb;

	 	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	 	if(count($wpdb->get_var('SHOW TABLES LIKE "wp_industrial_information"')) == 0 ){  
		 		
		 		$sql1="CREATE TABLE `wp_industrial_information` (
					`id` int(100) NOT NULL AUTO_INCREMENT,
					`industry_name` varchar(100) DEFAULT NULL,
					`contact_number` varchar(100) DEFAULT NULL,
					`industry_email` varchar(100) DEFAULT NULL,
					`main_branch_location` varchar(100) DEFAULT NULL,
					`dept_sectore` varchar(100) DEFAULT NULL,
					`degree_qulification` varchar(100) DEFAULT NULL,
					`emp_recruitment` int(100) DEFAULT NULL,
					`Experience` varchar(100) DEFAULT NULL,
					`salary` varchar(100) DEFAULT NULL,
					`drop_location` varchar(100) DEFAULT NULL,
					`vacancy_time` varchar(100) DEFAULT NULL,
					`Feature_requirment` varchar(100) DEFAULT NULL,
					`time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					`user_name` varchar(100) DEFAULT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1";
		       dbDelta($sql1);
		}
	}	 
	register_activation_hook( __FILE__, 'industrial_custome_table');

	function deactivate_industry_table(){

		global $wpdb;

		$wpdb->query('DROP TABLE IF EXISTS wp_industrial_information'); 
	} 
	//register_deactivation_hook(__FILE__,'deactivate_industry_table');
	register_uninstall_hook (__FILE__,'deactivate_industry_table');


  /* Add Education*/

	function education_department_registration(){
				
		    include_once PLUGIN_DIR_PATH."/views/edu_dept_form.php";
	}
	add_shortcode('Education_department_form', 'education_department_registration' );

	function show_education_dept_record(){

		global $wpdb;
        $rows = $wpdb->get_results("SELECT e.*,t.SectoreTitle from `wp_education_information` e, `WP_Sectore_data` t,`wp_users` w WHERE e.edu_sectore = t.SectoreID AND w.user_login = e.`user_name`");
        include_once PLUGIN_DIR_PATH."/views/edu_dept_record.php";

	}
	add_shortcode('Education_data_record', 'show_education_dept_record' );

	function education_dept_custome_table(){

	 	global $wpdb;

	 	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	 	if(count($wpdb->get_var('SHOW TABLES LIKE "wp_education_information"')) == 0 ){  
		 		
		 		$sql2="CREATE TABLE `wp_education_information` (
					 `id` int(100) NOT NULL AUTO_INCREMENT,
					 `dept_name` varchar(100) DEFAULT NULL,
					 `dept_email` varchar(100) DEFAULT NULL,
					 `degree_education` varchar(100) DEFAULT NULL,
					 `edu_sectore` varchar(100) DEFAULT NULL,
					 `Total_student` int(100) DEFAULT NULL,
					 `total_pass_student` int(100) DEFAULT NULL,
					 `total_fail_student` int(100) DEFAULT NULL,
					 `placement` varchar(100) DEFAULT NULL,
					 `company_name` varchar(100) DEFAULT NULL,
					 `free_student` int(100) DEFAULT NULL,
					 `user_name` varchar(100) DEFAULT NULL,
					 PRIMARY KEY (`id`)
					) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1
					";
		       dbDelta($sql2);
		}
	}	 
	register_activation_hook( __FILE__, 'education_dept_custome_table');
	
	function deactivate_education_dept_table(){

		global $wpdb;

		$wpdb->query('DROP TABLE IF EXISTS wp_education_information'); 
	} 
	//register_deactivation_hook(__FILE__,'deactivate_education_dept_table');
	register_uninstall_hook (__FILE__,'deactivate_education_dept_table');


   /* Add Both Field and Record*/

	function show_both_record(){
        
		include_once PLUGIN_DIR_PATH."/views/both_field_record.php";
	}
	add_shortcode('both_detail', 'show_both_record');

	// final result

	function wp_show_final_result(){
        
		include_once PLUGIN_DIR_PATH."/views/wp_final_result.php";
	}
	add_shortcode('All_detail', 'wp_show_final_result');

	function wp_sectore_table_show(){

		global $wpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	 	if(count($wpdb->get_var('SHOW TABLES LIKE "WP_Sectore_data"')) == 0 ){  
		 		
		 	$sectore_sql="CREATE TABLE `WP_Sectore_data` (
		IN
				 `SectoreID` int(11) NOT NULL AUTO_INCREMENT,
						 `SectoreTitle` text,
						 PRIMARY KEY (`SectoreID`)
						) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1";
		                dbDelta($sectore_sql);
		}		
	}
	register_activation_hook( __FILE__, 'wp_sectore_table_show');

	function deactivate_sectore_data_table(){

		global $wpdb;

		$wpdb->query('DROP TABLE IF EXISTS WP_Sectore_data'); 
	} 
	//register_deactivation_hook(__FILE__,'deactivate_sectore_data_table');
	register_uninstall_hook (__FILE__,'deactivate_sectore_data_table');

	///wokring Register industry and admin also login

	function industry_registration_createtbl(){

	 	global $wpdb;

	 	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	 	if(count($wpdb->get_var('SHOW TABLES LIKE "wp_industry_registration"')) == 0 ){  
		 		
		 		$sql2="CREATE TABLE `wp_industry_registration` (
					 `id` int(100) NOT NULL AUTO_INCREMENT,
					 `industry_name` varchar(100) NOT NULL,
					 `industry_email` varchar(100) NOT NULL,
					 `password` varchar(100) NOT NULL,
					 PRIMARY KEY (`id`)
					) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1";
		       dbDelta($sql2);
		}
	}	 
	register_activation_hook( __FILE__, 'industry_registration_createtbl');
	
	function deactivate_industry_registry_createtbl(){

		global $wpdb;

		$wpdb->query('DROP TABLE IF EXISTS wp_industry_registration'); 
	} 
	//register_deactivation_hook(__FILE__,'deactivate_industry_registry_createtbl');
	register_uninstall_hook (__FILE__,'deactivate_industry_registry_createtbl');


	function wp_industry_registration_form(){

	  include_once PLUGIN_DIR_PATH."/views/industry/wp_industry_reg.php";
	
	}
	add_shortcode('Register_Industry', 'wp_industry_registration_form');

	function wp_update_industry_record(){
		global $wpdb;
		$submit_id = $_GET['id'];
		$Records = $wpdb->get_results("SELECT * FROM `wp_industrial_information` WHERE `id` = '".$submit_id."' ");
		include_once PLUGIN_DIR_PATH."/views/industry/Edit_industry_record.php";
	}
	add_shortcode('Industry_update_record', 'wp_update_industry_record');

	function wp_industry_login(){

		include_once PLUGIN_DIR_PATH."/views/industry/industry_login.php";
	}
	add_shortcode('In_industry_login', 'wp_industry_login');

 /* Add Education Registration Form*/
	
	function wp_Department_registration_form(){

		include_once PLUGIN_DIR_PATH."/views/education/education_registration.php";
	}
	add_shortcode('Department_register', 'wp_Department_registration_form');

	function wp_education_dept_login(){

		include_once PLUGIN_DIR_PATH."/views/education/education_login.php";
	}
	add_shortcode('education_dept_login', 'wp_education_dept_login');

	
	function wp_update_education_record(){
		global $wpdb;
		$submit_id = $_GET['id'];
		$Records = $wpdb->get_results("SELECT * FROM `wp_education_information` WHERE `id` = '".$submit_id."' ");
		include_once PLUGIN_DIR_PATH."/views/education/Edit_education_record.php";
	}
	add_shortcode('education_update_record', 'wp_update_education_record');

	function shortcode(){
		global $wpdb;
		$submit_id = $_GET['id'];
		$Records = $wpdb->get_results("SELECT * FROM `wp_education_information` WHERE `id` = '".$submit_id."' ");
		include_once PLUGIN_DIR_PATH."/views/All_Shortcode.php";
	}
	add_shortcode('wp_shortcode', 'shortcode');

	// 	function wp_show_test(){
	// 	global $wpdb;
	// 	$submit_id = $_GET['id'];
	// 	$Records = $wpdb->get_results("SELECT * FROM `wp_education_information` WHERE `id` = '".$submit_id."' ");
	// 	include_once PLUGIN_DIR_PATH."/views/education/Edit_education_record.php";
	// }
	// add_shortcode('wp_login', 'wp_show_test');


	function Wp_login_page_wordpress(){

		$slug ='';

		$pages_includes = array("Industry-Database","information","edu_form","edu_record","all_record","Final_record","reg_industry","industry_update","industrial_department_login","reg_department","edit_department","education_department_login");
		$currentPage = $_GET['page'];

		if(in_array($currentPage, $pages_includes)){




		}
	}
	add_action('init','Wp_login_page_wordpress');

	function login(){
		include_once PLUGIN_DIR_PATH."/views/industry/login.php";
	}
	add_shortcode('wp_login', 'login');

	function wp_department_register(){
		include_once PLUGIN_DIR_PATH."/views/register_department.php";
	}
	add_shortcode('wp_reg_dep', 'wp_department_register');

	function wp_industry_register(){
		include_once PLUGIN_DIR_PATH."/views/industry_registration.php";
	}
	add_shortcode('wp_reg_industry', 'wp_industry_register');
























	