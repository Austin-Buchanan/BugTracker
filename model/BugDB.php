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

  public static function searchByBugID($bugID) {
    $db = Database::getDB();
    $query = "SELECT * FROM Bugs
              where BugID = '$bugID'";
    $result = $db->query($query);
    $bugs = array();
    foreach ($result as $row) {
      $bug = new Bug($row['BugID'], $row['UserID'], $row['SWName'], $row['Urgency'], $row['ShortDesc'], $row['LongDesc'], $row['time_created'], $row['time_modified'], $row['Resolution']);
      $bugs[] = $bug;
    }
    return $bugs[0];
  }

  public static function searchBySWName($swName) {
    $db = Database::getDB();
    $query = "SELECT * FROM Bugs
              where SWName = '$swName'";
    $result = $db->query($query);
    $bugs = array();
    foreach ($result as $row) {
      $bug = new Bug($row['BugID'], $row['UserID'], $row['SWName'], $row['Urgency'], $row['ShortDesc'], $row['LongDesc'], $row['time_created'], $row['time_modified'], $row['Resolution']);
      $bugs[] = $bug;
    }
    return $bugs[0];
  }

  public static function updateBug($bugID, $swName, $urgency, $shortDesc, $longDesc, $resolution) {
    $db = Database::getDB();
    $query = "UPDATE Bugs
              SET SWName = :swName, Urgency = :urgency, ShortDesc = :shortDesc, LongDesc = :longDesc, time_modified = CURRENT_TIMESTAMP, Resolution = :resolution
              WHERE BugID = :bugID";
    try {
      $statement = $db->prepare($query);
      $statement->bindValue(':bugID', $bugID);
      $statement->bindValue(':swName', $swName);
      $statement->bindValue(':urgency', $urgency);
      $statement->bindValue(':shortDesc', $shortDesc);
      $statement->bindValue(':longDesc', $longDesc);
      $statement->bindValue(':resolution', $resolution);
      $statement->execute();
      $statement->closeCursor();
    } catch (PDOException $e) {
      $error_message = $e->getMessage();
      include('../errors/database_error.php');
      exit();
    }
  }

  public static function deleteBug($bugID) {
    $db = Database::getDB();
    $query = 'DELETE FROM Bugs WHERE BugID = :bugID';
    try {
      $statement = $db->prepare($query);
      $statement->bindValue(':bugID', $bugID);
      $statement->execute();
      $statement->closeCursor();
    } catch (PDOException $e) {
      $error_message = $e->getMessage();
      include('../errors/database_error.php');
      exit();
    }
  }
}
