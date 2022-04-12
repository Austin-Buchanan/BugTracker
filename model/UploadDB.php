<?php
require_once('Database.php');

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
}