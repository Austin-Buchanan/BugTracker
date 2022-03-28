<?php
require('../model/BugDB.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == 'add_bug') {
    $userID = 'default';
    $swName = filter_input(INPUT_POST, 'softwareName');
    $urgency = filter_input(INPUT_POST, 'urgency');
    $shortDesc = filter_input(INPUT_POST, 'shortDesc');
    $longDesc = filter_input(INPUT_POST, 'longDesc');
    if ($swName == NULL || $urgency == NULL || $shortDesc == NULL || $longDesc == NULL) {
        $error = "Invalid data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        BugDB::add_bug($userID, $swName, substr($urgency, 0, 1), $shortDesc, $longDesc);
        include('../index.php');
    }
} else {
    $error = "No action given.";
    include('../errors/error.php');
}