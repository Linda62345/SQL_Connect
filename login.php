<?php
// Check if email and password are set
if(isset($_POST['email']) && isset($_POST['password'])){
    // Include the necessary files
    require_once "conn.php";
    require_once "validate.php";
    // Call validate, pass form data as parameter and store the returned value
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    // Create the SQL query string
    $sql = "select * from worker where WORKER_Email='$email' and WORKER_Password='$password'";
    // Execute the query
    $result = $conn->query($sql);
    // If number of rows returned is greater than 0 (that is, if the record is found), we'll print "success", otherwise "failure"
    if($result->num_rows > 0){
        //$row = mysqli_fetch_assoc($result);
        //$Worker_Id = $row['WORKER ID'];
        //$result['Worker_Id'] = $Worker_Id;
        //$result["response"] = "success";
        //echo json_decode($result);
        echo "success";
    } else{
        // If no record is found, print "failure"
        echo "failure";
    }
}
?>