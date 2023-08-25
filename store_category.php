<?php
// include('functions.php');
// $result = array("success" => 0, "error" => 0);

// if (isset($_POST['CategoryName']) && isset($_POST['Description'])) {
//     $name = $_POST['CategoryName'];
//     $description = $_POST['Description'];
    

//     $fields = array("CategoryName", "Description" );
//     $values = array($name, $description);

//     $func = new functions();
//     $insert = $func->insert_data('category', $fields, $values);

//     if ($insert == true) {
//         $result["success"] = 1;
//         $result["msg_success"] = "Successfully Created Category";
//         echo json_encode($result); 

//     } else {
//         $result["error"] = 2;
//         $result["msg_error"] = "Failed to Create Category";
//         echo json_encode($result); 
//     }
// } else {
//     $result["error"] = 1;
//     $result["msg_error"] = "Access denied";
//     echo json_encode($result);
// }
include('functions.php');
$result = array("success" => 0, "error" => 0);

if (isset($_POST['CategoryName']) && isset($_POST['Description'])) {
    $name = $_POST['CategoryName'];
    $description = $_POST['Description'];

    $fields = array("CategoryName", "Description");
    $values = array($name, $description);

    $func = new functions();
    $insert = $func->insert_data('category', $fields, $values);

    if ($insert == true) {
        $result["success"] = 1;
        $result["msg_success"] = "Successfully Created Category";
    } else {
        $result["error"] = 2;
        $result["msg_error"] = "Failed to Create Category";
    }

    // Handle image upload if available
    if (isset($_POST['Image'])) {
        $imageData = $_POST['Image'];
        $imageData = base64_decode($imageData);

        // Generate a unique filename for the image
        $imageName = uniqid() . ".jpg";

        // Specify the path to save the image
        $imagePath = "images/category/" . $imageName;

        // Save the image to the server
        file_put_contents($imagePath, $imageData);

        // You can store the image path in the database if needed
        // For example: $func->insert_data('category', array("CategoryName", "Description", "ImagePath"), array($name, $description, $imagePath));
    }

} else {
    $result["error"] = 1;
    $result["msg_error"] = "Access denied";
}

echo json_encode($result);
?>

