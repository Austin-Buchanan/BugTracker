<?php
require_once('../model/UploadDB.php');

if (isset($_POST['submit'])) {
    // get bug and user IDs
    $bugID = filter_input(INPUT_POST, 'bugID', FILTER_VALIDATE_INT);
    $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);

    // get file data
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // restrict file types
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'txt', 'csv', 'xlsx', 'doc', 'docx');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;
                try {
                    move_uploaded_file($fileTmpName, $fileDestination);

                    // Add file information to the database
                    UploadDB::add_upload($bugID, $userID, $fileNameNew, $fileName);
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    include('../errors/error.php');
                    exit();
                }
                header("Location: /BugTracker/index.php?uploadsuccess");
            } else {
                echo "Your file is too large to upload.";
            }
        } else {
            echo "There was an unexpected error uploading the file.";
        }
    } else {
        echo "You cannot upload files of this type.";
    }
}