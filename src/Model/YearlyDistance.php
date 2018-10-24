<?php
/**
  * This file is a part of the code used in IMT2571 Assignment 5.
  *
  * @author Rune Hjelsvold
  * @version 2018
  */

/**
  * Model class storing the distance a skier skied a given year.
  */
class YearlyDistance
{
    /** 
      * @var integer The fall year of the skiing season, e.g., 2017 for the
      *              2017-2018 skiing season
      */
    public $season;
    
    /** 
      * @var integer The distance skied, in kilometers
      */
    public $distance;
    
    /**
      * Yearly distance object constructor
      *
      * @param integer $season   The fall year of the skiing season
      * @param integer $distance The distance skied, in kilometers
      */
    public function __construct($season, $distance)
    {
        $this->season = $season;
        $this->distance = $distance;
    }
}

?>