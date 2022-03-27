<?php
require('Bug.php');

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
}
