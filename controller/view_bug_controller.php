<?php
require_once('../model/BugDB.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == 'start_update') {
    $bugID2update = filter_input(INPUT_POST, 'bugID2update', FILTER_VALIDATE_INT);
    if ($bugID2update == NULL) {
        $error = "Update error: could not find bug ID.";
        include('../errors/error.php');
    } else {
        $bug_old = BugDB::searchByBugID($bugID2update);
        $urgency_set = "";
        $urgency_old = $bug_old->getUrgency();
        switch($urgency_old) {
            case "l":
                $urgency_set = "low";
                break;
            case "m":
                $urgency_set = "medium";
                break;
            case "h":
                $urgency_set = "high";
                break;
            default:
                break;
        }

        include('../view/update_bug.php');
    }
}
