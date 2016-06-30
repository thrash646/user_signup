<?php 
    require "connect.php";

    // Get the user ID of the user to show
    $user_id = $_REQUEST['user_id'];

    // Build the SELECT statement
    $select_query = "SELECT * FROM users WHERE user_id = " . $user_id;

    // Run the query
    $result = mysqli_query($conn, $select_query);
    if ($result) {
        $row = mysqli_fetch_array($result);
        $first_name     = $row['first_name'];
        $last_name      = $row['last_name'];
        $bio            = preg_replace("/[\r\n]+/", "</p><p>", $row['bio']);
        $email          = $row['email'];
        $facebook_url   = $row['facebook_url'];
        $twitter_handle = $row['twitter_handle'];

          // Turn $twitter_handle into a URL
        $twitter_url = "http://www.twitter.com/";
        $position = strpos($twitter_handle, "@");
        if ($position === false) {
            $twitter_url = $twitter_url . $twitter_handle;
        } else {
            $twitter_url = $twitter_url . substr($twitter_handle, $position + 1);
        }
        // To be added later
        $user_image = "../../images/missing_user.png";
    } else {
        die("Error locating user with ID {$user_id}");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Showing User Profile</title>
    <link rel="stylesheet" href="../css/phpMM.css">
</head>
<body>
  
    
    <div class="example">User Profile</div>
    <div class="content">
        <div class="user_profile">
            <h1><?php echo $first_name . " " . $last_name; ?></h1>
            <p><img src="<?php echo $user_image; ?>" class="user_pic" alt="user profile image">
            <?php echo $bio; ?></p>
            <p class="contact_info">Contact <?php echo $first_name . " " . $last_name; ?>:</p>
            <ul>
                <l1>Email: <a href="<?php echo $email; ?>"></a><?php echo $email; ?></l1>
                <l1>Twitter:<a href="<?php echo $facebook_url; ?>">Check them out on facebook.</a></l1>
                <l1><a href="<?php echo $twitter_url; ?>">Follow them on twitter</a></l1>
            </ul>
        </div>
    </div>
</body>
</html>