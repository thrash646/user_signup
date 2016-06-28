<?php
require "connect.php";

$query_text = $_REQUEST['query'];
$result = mysqli_query($conn, $query_text);

if (!$result) {
    die("<p>Error in searching the SQL query: " . $query_text  . " --> " . mysqli_error($conn) . "</p>");
}

$return_rows = true;
$uppercase_query_text = trim(strtoupper($query_text));

if (preg_match ("/^ \s*(CREATE|DESCRIBE|INSERT|UPDATE|DELETE|DROP)/i", trim($query_text))) {
    $return_rows = false;
}
if ($return_rows) {
    echo "<p>Results from your query:</p>";
    echo "<ul>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<li>{$row[0]}</li>";
    }
    echo "</ul>";
} else {
    // NO ROWS found. Just report if the query ran or not.
    echo "<p>Your query was processed successfully.</p>";
    echo "<p>$query_text</p>";
}


?>      