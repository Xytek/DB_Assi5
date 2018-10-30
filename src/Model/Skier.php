<?php
/**
  * This file is a part of the code used in IMT2571 Assignment 5.
  *
  * @author Rune Hjelsvold
  * @version 2018
  */

/**
  * Model class storing a skier information
  */
class Skier
{
    /** 
      * @var string The skier's unique user name
      */
    public $userName;

    /** 
      * @var string The skier's first name
      */
    public $firstName;

    /** 
      * @var string The skier's last name
      */
    public $lastName;

    /** 
      * @var integer The skier's year of birth
      */
    public $yearOfBirth;

    /** 
      * @var Affiliation[] The skier's affiliation history
      */
    public $affiliations = array();

    /** 
      * @var YearlyDistance[] The skier's yearly distance log
      */
    public $yearlyDistances = array();
    
    /**
      * Skier object constructor
      *
      * @param string $userName     The skier's unique user name.
      * @param string $firstName    The skier's first name.
      * @param string $lastName     The skier's last name.
      * @param integer $yearOfBirth The skier's year of birth.
      */
    public function __construct($userName, $firstName, $lastName, $yearOfBirth)
    {
        $this->userName = $userName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->yearOfBirth = $yearOfBirth;
    }
    
    /**
      * Adds an affiliation object to the affiliation history.
      *
      * @param Affiliation $affiliation The affiliation object to add to the history.
      */
    public function addAffiliation($affiliation)
    {
        $this->affiliations[] = $affiliation;
    }

    /**
      * Adds an array of affiliation object to the affiliation history.
      *
      * @param  Affiliation[] $affiliations The array of affiliation objects
      *                                     to add to the history.
      */
    public function addAffiliations($affiliations)
    {
        foreach ($affiliations as $affiliation) {
            $this->affiliations[] = $affiliation;
        }
    }
    
    /**
      * Adds a yearly distance object to the yearly distance log.
      *
      * @param YearlyDistance $yearlyDistance The yearly distance object
      *                                       to add to the log.
      */
    public function addYearlyDistance($yearlyDistance)
    {
        $this->yearlyDistances[] = $yearlyDistance;
    }

    /**
      * Adds an array of yearly distance object to the yearly distance log.
      *
      * @param YearlyDistance[] $yearlyDistances The array of affiliation objects
      *                                           to add to the log.
      */
    public function addYearlyDistances($yearlyDistances)
    {
        foreach ($yearlyDistances as $yearlyDistance) {
            $this->yearlyDistances[] = $yearlyDistance;
        }
    }
}

?>