<?php
require('Bug.php');
require('Database.php');

class BugDB {
  public static function add_bug($userID, $swName, $urgency, $shortDesc, $longDesc) {
    $db = Database::getDB();
    $query = 'INSERT INTO bugs
                (UserID, SWName, Urgency, ShortDesc, LongDesc)
              VALUES
                (:userID, :swName, :urgency, :shortDesc, :longDesc)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':swName', $swName);
    $statement->bindValue(':urgency', $urgency);
    $statement->bindValue(':shortDesc', $shortDesc);
    $statement->bindValue(':longDesc', $longDesc);
    $statement->execute();
    $statement->closeCursor(); 
  }

  public static function getAllBugs() {
    $db = Database::getDB();
    $query = "SELECT * FROM Bugs";
    $result = $db->query($query);
    $bugs = array();
    foreach ($result as $row) {
      $bug = new Bug($row['BugID'], $row['UserID'], $row['SWName'], $row['Urgency'], $row['ShortDesc'], $row['LongDesc'], $row['time_created'], $row['time_modified'], $row['Resolution']);
      $bugs[] = $bug;
    }
    return $bugs;
  }
}
