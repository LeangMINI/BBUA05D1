<?php
// include('functions.php');
// $result = array("success" => 0, "error" => 0);

// if (isset($_POST['UserNameLogin']) && isset($_POST['PasswordLogin'])) {
//     $username = $_POST['UserNameLogin'];
//     $password = md5($_POST['PasswordLogin']); 

//     $func = new functions();
//     $login = $func->login_user('user', $username, $password);

//     if ($login != false) {
//         $result["success"] = 1;
//         $result["msg_success"] = "Successfully logged in";
//         $result[" UserLoginID"] = $login[1];
//         $result[" UserLoginName"] = $login[2];
//         $result[" UserPassword"] = $login[3];
//         $result[" UserFullName"] = $login[4];
//         $result[" UserType"] = $login[5];
//         $result[" UserEmail"] = $login[6];
//         $result[" UserImage"] = $login[7];
//         print json_encode($result);

//     } else {
//         $result["error"] = 2;
//         $result["msg_error"] = "Invalid credentials";
//         print json_encode($result);

//     }
// } else {
//     $result["error"] = 1;
//     $result["msg_error"] = "Access denied";
//     print json_encode($result);
// }

include('functions.php');
$result = array("success" => 0, "error" => 0);

if (isset($_POST['UserNameLogin']) && isset($_POST['PasswordLogin'])) {
    $username = $_POST['UserNameLogin'];
    $password = md5($_POST['PasswordLogin']); 

    $func = new functions();
    $login = $func->login_user('user', $username, $password);

    if ($login != false) {
        $result["success"] = 1;
        $result["msg_success"] = "Successfully logged in";
        $result["UserLoginID"] = $login["UserID"];
        $result["UserLoginName"] = $login["UserName"];
        $result["UserPassword"] = $login["UserPassword"];
        $result["UserFullName"] = $login["FullName"];
        $result["UserType"] = $login["UserType"];
        $result["UserEmail"] = $login["UserEmail"];
        $result["UserImage"] = $login["UserImage"];
        echo json_encode($result);

    } else {
        $result["error"] = 2;
        $result["msg_error"] = "Invalid credentials";
        echo json_encode($result);

    }
} else {
    $result["error"] = 1;
    $result["msg_error"] = "Access denied";
    echo json_encode($result);
}
?>
