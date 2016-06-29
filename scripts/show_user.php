 <?php 
    require_once "connect.php";

    $user_id = $_REQUEST['user_id'];
    
    //BUILDING the SELECT statement
    $select_query = "SELECT * FROM users
                    WHERE user_id = " . $user_id;

    //Run the query
    $result = mysqli_query($conn, $select_query);
    $first_name="Lebron";
    $last_name="James";
    $user_image="not/yet/here.jpg";
    $email="kingjames@gmail.com";
    $bio = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
    Similique, enim ipsum harum suscipit itaque ipsam nihil cupiditate doloremque ipsa labore, 
    dignissimos hic obcaecati earum. Voluptatibus maxime accusantium 
    numquam veritatis ipsa reprehenderit voluptatem, nulla deserunt, 
    magnam laborum modi architecto minima nemo placeat cumque eveniet 
    reiciendis delectus aspernatur est. Odit itaque culpa laboriosam porro, 
    aperiam libero quasi perspiciatis, et sit. Illo ratione obcaecati accusamus, 
    harum dignissimos rem illum placeat veritatis voluptas soluta, deserunt expedita 
    ab natus culpa quidem animi alias. Repellat maxime reprehenderit odit dicta magnam, 
    quasi consequatur pariatur commodi voluptates a, officiis laborum laudantium recusandae 
    reiciendis, voluptate modi tempora doloribus. Voluptatibus.";
    $facebook_url="www.facebook.com/jp.nuyens.16";
    $twitter_url="www.twitter.com/thrash646";
    
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