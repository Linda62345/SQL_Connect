<?php
// Check if newpassword are set
if(isset($_POST['phone'])){
    // Include the necessary files
    require_once "conn.php";
    require_once "validate.php";
    // Call validate, pass form data as parameter and store the returned value
    $phone = validate($_POST['phone']);
    // Create the SQL query string
    $sql = "select * from worker where `WORKER_PhoneNum`='$phone'";
    // Execute the query
    $result = $conn->query($sql);
    // If number of rows returned is greater than 0 (that is, if the record is found), we'll print "success", otherwise "failure"
    if($result->num_rows > 0){
        echo "success";
    } else{
        // If no record is found, print "failure"
        echo "failure";
    }
}
?>