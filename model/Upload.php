<?php

class Upload {
    private $uploadID, $bugID, $userID, $timeCreated, $filename, $displayName;

    public function __construct($uploadID_in, $bugID_in, $userID_in, $timeCreated_in, $filename_in, $displayName_in) {
        $this->uploadID = $uploadID_in;
        $this->bugID = $bugID_in;
        $this->userID = $userID_in;
        $this->timeCreated = $timeCreated_in; $this->filename = $filename_in;
        $this->displayName = $displayName_in;
    }

    public function getUploadID() { return $this->uploadID; }
    public function getBugID() { return $this->bugID; }
    public function getUserID() { return $this->userID; }
    public function getTimeCreated() { return $this->timeCreated; }
    public function getFilename() { return $this->filename; }
    public function getDisplayName() { return $this->displayName; }
}