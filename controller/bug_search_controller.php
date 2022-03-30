<?php
require_once('../model/BugDB.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == 'search_bug') {
    $bugID = filter_input(INPUT_POST, 'bugID', FILTER_VALIDATE_INT);
    $swName = filter_input(INPUT_POST, 'swName');

    // validate input
    if ($bugID == NULL && $swName == NULL) {
        $error = "No result found. Please check input fields and try again.";
        include('../errors/error.php');
    } elseif ($bugID != NULL) {
        $bug = BugDB::searchByBugID($bugID);
        include('../view/view_bug.php');
    } elseif ($swName) {
        $bug = BugDB::searchBySWName($swName);
        include('../view/view_bug.php');
    }
}