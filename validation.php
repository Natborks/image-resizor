<?php

// Check if upload was clicked and if resize param was given
if (isset($_POST["upload"]) && isset($_POST["resize"])) {
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );


    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);


    // Validate file input to check if is not empty
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        return array(
            "code" => 400,
            "message" => "No Image Uploaded"
        );


    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
        return array(
            "code" => 400,
            "message" => "Upload valid images. Only PNG, JPG, and JPEG are allowed."
        );


    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 2000000)) {
        return array(
            "code" => 400,
            "message" => "Image size exceeds 2MB"
        );


    }    // Validate image file dimension -- optional
    else if ($width > "300" || $height > "200") {
        return array(
            "code" => 400,
            "message" => "Image dimension should be within 300X200"
        );

        // validate file uploaded successfully
    } else {
        $target = "image/" . basename($_FILES["file-input"]["name"]);
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
            return array(
                "code" => 200,
                "message" => "Image uploaded successfully."
            );
        } else {
            return array(
                "code" => 400,
                "message" => "Problem in uploading image files."
            );
        }
    }
}
?>
