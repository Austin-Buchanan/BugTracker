<?php
require_once('../model/BugDB.php');
require_once('../model/NoteDB.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == 'update_bug') {
    $bugID = filter_input(INPUT_POST, 'bugID', FILTER_VALIDATE_INT);   
    if ($bugID == NULL) {
        $error = "Update error: could not find bug ID.";
        include('../errors/error.php');
        exit();
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
            BugDB::updateBug($bugID, $swName, substr($urgency, 0, 1), $shortDesc, $longDesc, $resolution);
        }
    
        // Handle new work note if there is one
        $noteText = filter_input(INPUT_POST, 'workNote');
        if ($noteText != NULL) {
            // make sure the input has content besides spaces
            $noteText_trimmed = trim($noteText);
            if ($noteText != "") {
                // add note to TicketNotes table
                $userID = 0; // default... replace later
                try {
                    NoteDB::addNote($bugID, $noteText, $userID);
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    include('../errors/error.php');
                    exit();
                }
            }
        }
    }

    include('../view/read_all_bugs.php');
}