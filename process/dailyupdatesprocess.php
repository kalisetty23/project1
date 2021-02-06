<?php
//including the database connection file
require_once ('dbh.php');

//getting id of the data from url
id = $_GET['id'];
//echo $id;
$servicetype_update = $_POST['servicetype_update'];
//e9
$application_name_update = $_POST['application_name_update'];
//echo "$reason";
$location_update = $_POST['location_update'];

$customer_name_update = $_POST['customer_name_update'];

$work_done_update = $_POST['work_done_update'];

$problem_update = $_POST['problem_update'];
$sql = "INSERT INTO `daily_updates`(`id`,`token`, `servicetype_update`, `application_name_update`, `location_update`, `customer_name_update`,`work_done_update`,`problem_update`,`service_report_update`,`paid/unpaid_update`,`start_date`) VALUES ('$id','','$start_date','Pending')";

$result = mysqli_query($conn, $sql);

//redirecting to the display page (index.php in our case)
header("Location:..//eloginwel.php?id=$id");
?>

