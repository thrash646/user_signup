<?php
require "app_config.php";

$conn = mysqli_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASS, DATABASE_NAME)
    or die ("<p>Error connecting to database! " .
           mysqli_error() . "</p>");
//echo "<p>Connected to MySQL!</p>";

mysqli_select_db($conn, DATABASE_NAME) 
    or die("<p>Sorry we couldn't find that database: " . DATABASE_NAME . "</p>");

//echo "<p>Connected to MySDQL using database " . DATABASE_NAME . "</p>";

?>