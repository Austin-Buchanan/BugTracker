<?php

class Note {
    private $noteID, $bugID, $noteText, $timeWritten, $userID;

    public function __construct($noteID_in, $bugID_in, $noteText_in, $timeWritten_in, $userID_in) {
        $this->noteID = $noteID_in;
        $this->bugID = $bugID_in;
        $this->noteText = $noteText_in;
        $this->timeWritten = $timeWritten_in;
        $this->userID = $userID_in;
    }

    public function getNoteID() { return $this->noteID; }
    public function getBugID() { return $this->bugID; }
    public function getNoteText() { return $this->noteText; }
    public function getTimeWritten() { return $this->timeWritten; }
    public function getUserID() { return $this->userID; }
}