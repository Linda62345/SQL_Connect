<?php
// Check if newpassword are set
if(isset($_POST['id'])){
    // Include the necessary files
    require_once "conn.php";
    require_once "validate.php";
    // Call validate, pass form data as parameter and store the returned value
    $id = validate($_POST['id']);
    // Create the SQL query string
    $sql = "select * from gas where `GAS_Id`='$id'";
    // Execute the query
    $result = $conn->query($sql);
    // If number of rows returned is greater than 0 (that is, if the record is found), we'll print "success", otherwise "failure"
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $GAS_Id = $row['GAS_Id'];
        $GAS_Volume = $row['GAS_Volume'];
        $GAS_Type = $row['GAS_Type'];
        $gas_data = array();
        $gas_data['GAS_Id'] = $GAS_Id;
        $gas_data['GAS_Volume'] = $GAS_Volume;
        $gas_data['GAS_Type'] = $GAS_Type;
        $gas_data['response'] = 'success';
        echo json_encode($gas_data);

        //echo "success";
    } else{
        // If no record is found, print "failure"
        echo json_encode(["response" => "failure"]);
        //echo "failure";
    }
}
?>