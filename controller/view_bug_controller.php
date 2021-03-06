<?php
require_once('../model/BugDB.php');
require_once('../model/NoteDB.php');
require_once('../model/UploadDB.php');

$bugID2view = filter_input(INPUT_POST, 'bugID2view', FILTER_VALIDATE_INT);
$notes = NoteDB::getAllBugNotes($bugID2view);
$uploads = UploadDB::getAllBugUploads($bugID2view);

$action = filter_input(INPUT_POST, 'action');
if ($action == 'start_update') {
    $bugID2update = filter_input(INPUT_POST, 'bugID2update', FILTER_VALIDATE_INT);
    
    if ($bugID2update == NULL) {
        $error = "Update error: could not find bug ID.";
        include('../errors/error.php');
    } else {
        $ticketnotes = NoteDB::getAllBugNotes($bugID2update); 
        $ticketUploads = UploadDB::getAllBugUploads($bugID2update);
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
} elseif ($action == 'start_delete') {
    $bugID2delete = filter_input(INPUT_POST, 'bugID2delete', FILTER_VALIDATE_INT);
    if ($bugID2delete == NULL) {
        $error = "Deletion error: could not find bug ID.";
        include('../errors/error.php');
    } else {
        BugDB::deleteBug($bugID2delete);
        header('Location: //localhost/BugTracker/view/read_all_bugs.php');
    }
}
