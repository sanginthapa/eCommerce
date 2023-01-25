<?php
//get the name of the upload file
$fileName = $_FILES['file']['name'];

//choose where to save the upload file
$location = "upload/" . $fileName;

// save the uploaded file to local file system
if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    echo "success";
}
else {
    echo "Failure";
}
?>