<?php
include('functions.php');
$result = array("success" => 0, "error" => 0);

if (isset($_POST['UserNameRegister']) && isset($_POST['PasswordRegister'])) {
    $username = $_POST['UserNameRegister'];
    $userpass = md5($_POST['PasswordRegister']); // Corrected variable name
    $fullname = $_POST['FullNameRegister'];
    $email = $_POST['EmailRegister']; // Removed unnecessary md5() function
    $userimage = $_POST['UserImage']; // New field for UserImage

    $fields = array("UserName", "UserPassword", "FullName", "UserEmail", "UserImage"); // Added UserImage
    $values = array($username, $userpass, $fullname, $email, $userimage); // Added UserImage value

    $func = new functions();
    $insert = $func->insert_data('user', $fields, $values);

    if ($insert == true) {
        $result["success"] = 1;
        $result["msg_success"] = "Successfully registered";
        echo json_encode($result); // Corrected function name

    } else {
        $result["error"] = 2;
        $result["msg_error"] = "Failed to register";
        echo json_encode($result); // Corrected function name

    }
} else {
    $result["error"] = 1;
    $result["msg_error"] = "Access denied";
    echo json_encode($result); // Corrected function name
}
?>
