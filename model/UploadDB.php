<?php
require_once('Database.php');
require_once('Upload.php');

class UploadDB {
    public static function add_upload($bugID, $userID, $filename, $displayName) {
        $db = Database::getDB();
        $query = 'INSERT INTO uploads
                    (BugID, UserID, Filename, DisplayName)
                  VALUES
                    (:bugID, :userID, :filename, :displayName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':bugID', $bugID);
        $statement->bindValue('userID', $userID);
        $statement->bindValue(':filename', $filename);
        $statement->bindValue(':displayName', $displayName);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function getAllBugUploads($bugID) {
      $db = Database::getDB();
      $query = "SELECT * FROM Uploads
                WHERE BugID = '$bugID'";
      $result = $db->query($query);
      $uploads = array();
      foreach ($result as $row) {
        $upload = new Upload($row['UploadID'], $row['BugID'], $row['UserID'], $row['TimeCreated'], $row['Filename'], $row['DisplayName']);
         $uploads[] = $upload;
      }
      return $uploads;
    }
}