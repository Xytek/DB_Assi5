<?php 
require_once('src/Model/XmlSkierLogs.php');
/**
  * This file is a part of the code used in IMT2571 Assignment 5.
  *
  * @author Rune Hjelsvold
  * @version 2018
  */

/**
  * Unit test class. The tests assume that the provided XML file is loaded
  * in the XmlSkierLogs object.
  */
class Assignment5Test extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    /**
     * @var \XmlSkierLogs The assignment class to be tested
     */
    protected $model;
    
    protected function _before()
    {
        // Load the XML file for every test
        $this->model = new XmlSkierLogs('SkierLogs.xml');
    }

    protected function _after()
    {
    }

    /**
     * Function testing that club loading seem to work as expected.
     */
    public function testClubs()
    {
        $clubs = $this->model->getClubs();
        $this->assertEquals(4, sizeOf($clubs));
        $club = $clubs[1];
        $this->assertEquals('lhmr-ski', $club->id);
        $this->assertEquals('Lillehammer Skiklub', $club->name);
        $this->assertEquals('Lillehammer', $club->city);
        $this->assertEquals('Oppland', $club->county);  
    }

    /**
     * Function testing that basic skier information is loaded.
     */
    public function testSkiers()
    {
        $skiers = $this->model->getSkiers();
        $this->assertEquals(112, sizeOf($skiers));
        $skier = $skiers[9];
        $this->assertEquals('bent_svee', $skier->userName);
        $this->assertEquals('Bente', $skier->firstName);
        $this->assertEquals('Sveen', $skier->lastName);
        $this->assertEquals(2003, $skier->yearOfBirth);  
    }
    
    /**
     * Function testing skiers with no affiliation history.
     */
    public function testNoAffiliations()
    {
        $skiers = $this->model->getSkiers();
        $skier = $skiers[45];
        $this->assertEquals('henr_dale', $skier->userName);
        $this->assertEquals(0, sizeOf($skier->affiliations));
    }
        
    /**
     * Function testing that affiliation history is properly loaded.
     */
    public function testTwoAffiliations()
    {
        $skiers = $this->model->getSkiers();
        $skier = $skiers[20];
        $this->assertEquals('elis_ruud', $skier->userName);
        $this->assertEquals(2, sizeOf($skier->affiliations));
        $this->assertEquals(2015, $skier->affiliations[0]->season);
        $this->assertEquals('asker-ski', $skier->affiliations[0]->clubId);
        $this->assertEquals(2016, $skier->affiliations[1]->season);
        $this->assertEquals('skiklubben', $skier->affiliations[1]->clubId);
    }
        
    /**
     * Function testing that yearly distance is correctly computed for skiers
     * having logged distances in one season only.
     */
    public function testOneYearlyDistance()
    {
        $skiers = $this->model->getSkiers();
        $skier = $skiers[15];

        // Verify that this skier has user name bror_kals
        // That the user has logged skiing distances in one year only
        // That the yearly distance was 202 in 2016
    }
        
    /**
     * Function testing that yearly distance is correctly computed for skiers
     * having logged distances in multiple seasons.
     * @todo Implement this function.
     */
    public function testTwoYearlyDistances()
    {
        $skiers = $this->model->getSkiers();
        $skier = $skiers[0];

        // Verify that this skier has user name ande_andr
        // That the user has logged skiing distances in two different years
        // That the yearly distance was 23 in 2015 and 55 in 2016
    }
        
}