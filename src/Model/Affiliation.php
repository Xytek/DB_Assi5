<?php
/**
  * This file is a part of the code used in IMT2571 Assignment 5.
  *
  * @author Rune Hjelsvold
  * @version 2018
  */

/**
  * Model class storing a skier's club affiliation
  */
class Affiliation
{
    /** 
      * @var string The club's id
      */
    public $clubId;
    /** 
      * @var integer The fall year of the skiing season, e.g., 2017 for the
      *              2017-2018 skiing season
      */
    public $season;
    
    /**
      * Club affiliation object constructor
      *
      * @param string $clubId      The club's id.
      * @param integer $season The fall year of the skiing season
      */
    public function __construct($clubId, $season)
    {
        $this->clubId = $clubId;
        $this->season = $season;
    }
}

?>