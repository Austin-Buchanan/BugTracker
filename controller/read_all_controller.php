<?php
require('../model/BugDB.php');

$bugs = BugDB::getAllBugs();

$action = filter_input(INPUT_POST, 'action');
if ($action == 'view_bug') {
    $bugID = filter_input(INPUT_POST, 'bugID2view', FILTER_VALIDATE_INT);

    if ($bugID == NULL) {
        $error = "No bug ID found. Please try again.";
        include('../errors/error.php');
    } else {
        $bug = BugDB::searchByBugID($bugID);
        include('../view/view_bug.php');
    }
}