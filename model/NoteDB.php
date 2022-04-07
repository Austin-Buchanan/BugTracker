<?php 
require_once('Note.php');
require_once('Database.php');

class NoteDB {
    public static function addNote($bugID, $noteText, $userID) {
        $db = Database::getDB();
        $query = 'INSERT INTO TicketNotes 
                    (BugID, Note_Text, UserID)
                  VALUES 
                    (:bugID, :noteText, :userID)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':bugID', $bugID);
            $statement->bindValue(':noteText', $noteText);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../errors/database_error.php');
            exit();
        }

    }

    public static function getAllBugNotes($bugID) {
        $db = Database::getDB();
        $query = "SELECT * FROM TicketNotes
                  WHERE BugID = '$bugID'";
        $result = $db->query($query);
        $notes = array();
        foreach ($result as $row) {
            $note = new Note($row['NoteID'], $row['BugID'], $row['Note_Text'], $row['Time_Written'], $row['UserID']);
            $notes[] = $note;
        }
        return $notes;
    }
}