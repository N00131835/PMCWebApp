<?php
class Property {
    private $address1;
    private $address2;
    private $town;
    private $county;
    private $description;
    private $rent;
    private $bedrooms;
    private $AreaID;
    /*private classes*/

    public function __construct($a1, $a2, $tn, $ct, $d, $r, $b, $aID) {
        $this->address1 = $a1;
        $this->address2 = $a2;
        $this->town = $tn;
        $this->county = $ct;
        $this->description = $d;
        $this->rent = $r;
        $this->bedrooms = $b;
        $this->AreadID = $aID;
    } /*default construstor*/
    
    public function getAddress1() { return $this->address1; }
    public function getAddress2() { return $this->address2; }
    public function getTown() { return $this->town; }
    public function getCounty() { return $this->county; }
    public function getDescription() { return $this->description; }
    public function getRent() { return $this->rent; }
    public function getBedrooms() { return $this->bedrooms; }
    public function getAreaID() { return $this->AreaID; }
    /*get methods for each individual fields*/
}

//ADDED AreaID