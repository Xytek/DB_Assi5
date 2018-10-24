<?php
/**
  * This file is a part of the code used in IMT2571 Assignment 5.
  *
  * @author Rune Hjelsvold
  * @version 2018
  */

/**
  * Model class storing a skiing club information
  */
class Club
{
    /** 
      * @var string The club's id
      */
    public $id;
 
    /** 
      * @var string The club's name
      */
    public $name;

    /** 
      * @var string The city where the club is located
      */
    public $city;

    /** 
      * @var string The county where the club is located
      */
    public $county;
    
    /**
      * Club object constructor
      *
      * @param string $id     The club's id.
      * @param string $name   The club's name.
      * @param string $city   The city where the club is located.
      * @param string $county The city where the club is located.
      */
    public function __construct($id, $name, $city, $county)
    {
        $this->id = $id;
        $this->name = $name;
        $this->city = $city;
        $this->county = $county;
    }
}

?>