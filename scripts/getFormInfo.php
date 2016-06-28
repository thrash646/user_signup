<?php

require_once 'connect.php';

$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$facebook_url = str_replace('facebook.org', 'facebook.com', trim($_POST['first_name']));
// checks if user entered "www.facebook.com" or just entered their page name
$position = strpos($facebook_url, "facebook.com");
if ($position === false) {
    $facebook_url = "http://www.facebook.com/" . $facebook_url;
}

// checks if user entered the twitter handle with "@" symbol or not.
$twitter_handle = trim($_POST['first_name']);
$twitter_url = "http://www.twitter.com/";
$position = strpos($twitter_handle, "@");
if ($position === false) {
    $twitter_url = $twitter_url . $twitter_handle;
} else {
    $twitter_url = $twitter_url . substr($twitter_handle, position + 1);
}

// using INSERT to add user info into the database "users"

$insert_sql = "INSERT INTO users (
                    first_name,
                    last_name,
                    email,
                    facebook_url,
                    twitter_handle)
                VALUES (
                    '$first_name', 
                    '$last_name', 
                    '$email', 
                    '$facebook_url', 
                    '$twitter_handle');";

mysqli_query ($conn, $insert_sql)
    or die(mysqli_error());


?>