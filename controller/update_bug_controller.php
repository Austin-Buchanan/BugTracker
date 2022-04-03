<?php
require_once('../model/BugDB.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == 'update_bug') {
    $bugID2update = filter_input(INPUT_POST, 'bugID2update', FILTER_VALIDATE_INT);
    if ($bugID2update == NULL) {
        $error = "Update error: could not find bug ID.";
        include('../errors/error.php');
    } else {
        $swName = filter_input(INPUT_POST, 'softwareName');
        $urgency = filter_input(INPUT_POST, 'urgency');
        $shortDesc = filter_input(INPUT_POST, 'shortDesc');
        $longDesc = filter_input(INPUT_POST, 'longDesc');
        $resolution = filter_input(INPUT_POST, 'resolution');
        if ($resolution == NULL)
            $resolution = "";
        if ($swName == NULL || $urgency == NULL || $shortDesc == NULL || $longDesc == NULL) {
            $error = "Invalid data. Check all fields and try again.";
            include('../errors/error.php');
        } else {
            BugDB::updateBug($bugID2update, $swName, $urgency, $shortDesc, $longDesc, $resolution);
            //header('Location: //localhost/BugTracker/view/read_all_bugs.php');
        }
    }   
}