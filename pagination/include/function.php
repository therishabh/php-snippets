<?php
include 'include/db.php';
session_start();



// ***************** start ********************
// ************ admin_login.php ****************
//fetch password from admin table..

/*
	Name :: admin_password_fetch
	Arguments :: $username [String]
	//Return :: $result [Password for Admin]
*/

function admin_password_fetch($username)
{
	$query = "SELECT password FROM admin WHERE username = '$username' AND status = '1'";
	$result = mysql_query($query);
	return $result;
}

// ************ admin_login.php ****************
// ***************** end ********************



// ********************* start **********************
// ************** header.php ********************

function select_admin_info($username)
{
	$query = "SELECT * FROM admin WHERE username = '$username' AND status = '1'";
	$result = mysql_query($query);
	return $result;
}

// ************** header.php ********************
// ********************* end **********************
?>