<?php

class Bug {
    private $bugID, $userID, $swName, $urgency, $shortDesc, $longDesc, $timeCreated, $timeModified, $resolution;

    public function __construct($bugID_in, $userID_in, $swName_in, $urgency_in, $shortDesc_in, $longDesc_in, $timeCreated_in, $timeModified_in, $resolution_in) {
        $this->bugID = $bugID_in;
        $this->userID = $userID_in;
        $this->swName = $swName_in;
        $this->urgency = $urgency_in;
        $this->shortDesc = $shortDesc_in;
        $this->longDesc = $longDesc_in;
        $this->timeCreated = $timeCreated_in;
        $this->timeModified = $timeModified_in;
        $this->resolution = $resolution_in;
    }

    public function getBugID() { return $this->bugID; }
    public function getUserID() { return $this->userID; }
    public function getSWName() { return $this->swName; }
    public function getUrgency() { return $this->urgency; }
    public function getShortDesc() { return $this->shortDesc; }
    public function getLongDesc() { return $this->longDesc; }
    public function getTimeCreated() { return $this->timeCreated; }
    public function getTimeModified() { return $this->timeModified; }
    public function getResolution() { return $this->resolution; }
}