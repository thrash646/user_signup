<?php

require_once 'connect.php';

$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$facebook_url = str_replace('facebook.org', 'facebook.com', trim($_POST['facebook_url']));
// checks if user entered "www.facebook.com" or just entered their page name
$position = strpos($facebook_url, "facebook.com");
if ($position === false) {
    $facebook_url = "http://www.facebook.com/" . $facebook_url;
}

// checks if user entered the twitter handle with "@" symbol or not.
$twitter_handle = trim($_POST['twitter_handle']);
$twitter_url = "http://www.twitter.com/";
$position = strpos($twitter_handle, "@");
if ($position === false) {
    $twitter_url = $twitter_url . $twitter_handle;
} else {
    $twitter_url = $twitter_url . substr($twitter_handle, $position + 1);
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
    or die(mysqli_error($conn));

//$get_user_query = "SELECT * FROM USERS WHERE ..."
//mysqli_query ($conn, $get_ser_query)
//    or die(mysqli_error());
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Information</title>
</head>
<body>
    <div class="header">
        <h1+>User Information Page</h1+>
    </div>
    <div class="content">
        <p>Here's a record of the information you submitted:</p>
        <p>Name: <?php echo $first_name . " " . $last_name; ?><br/>
        Email Address: <?php echo $email; ?><br />
        <a href="<?php echo $facebook_url; ?>">Your Facebook Page</a> <br />
        <a href="<?php echo $twitter_url; ?>">Your twitter feed</a> <br />
        </p>
    </div>
    <footer></footer>
    
    
</body>
</html>