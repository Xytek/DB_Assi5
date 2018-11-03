<?php
/**
  * This file is a part of the code used in IMT2571 Assignment 5.
  *
  * @author Rune Hjelsvold
  * @version 2018
  */

require_once('Club.php');
require_once('Skier.php');
require_once('YearlyDistance.php');
require_once('Affiliation.php');
/**
  * The class for accessing skier logs stored in the XML file
  */  
class XmlSkierLogs
{
  /**
      * @var DOMDocument The XML document holding the club and skier information.
      */  
    protected $doc;
    
    /**
      * @param string $url Name of the skier logs XML file.
      */  
    public function __construct($url)
    {
        $this->doc = new DOMDocument();
        $this->doc->load($url);
		$this->xpath = new DOMXpath($this->doc);
	}
    
    /**
      * The function returns an array of Club objects - one for each
      * club in the XML file passed to the constructor.
      * @return Club[] The array of club objects
      */
    public function getClubs()
    {
        $clubs = array();
		$elements = $this->xpath->query('/SkierLogs/Clubs/Club');		
		
		foreach ($elements as $club) { 
			$name = $club->getElementsByTagName("Name")->item(0)->nodeValue;
		    $city = $club->getElementsByTagName("City")->item(0)->nodeValue;
			$county = $club->getElementsByTagName("County")->item(0)->nodeValue;
						
			$c = new Club($club->getAttribute('id'), $name, $city, $county);
            array_push($clubs, $c); // appends new club
		}
		
        return $clubs;
    }
	

    /**
      * The function returns an array of Skier objects - one for each
      * Skier in the XML file passed to the constructor. The skier objects
      * contains affiliation histories and logged yearly distances.
      * @return Skier[] The array of skier objects
      */
    public function getSkiers()
    {
        $skiers = array();
		$count = 0;
    	$elements = $this->xpath->query('/SkierLogs/Skiers/Skier');		
    	$seasons = $this->xpath->query('/SkierLogs/Season');			
		
		// Adds every single skier
		foreach ($elements as $skier) {   
			$userName = $skier->getAttribute('userName');
			$firstName = $skier->getElementsByTagName("FirstName")->item(0)->nodeValue;
		    $lastName = $skier->getElementsByTagName("LastName")->item(0)->nodeValue;
			$yearOfBirth = $skier->getElementsByTagName("YearOfBirth")->item(0)->nodeValue;
			
			$s = new Skier($userName, $firstName, $lastName, $yearOfBirth);
		
			foreach($seasons as $season) {
				// For each season, check skiers
				foreach($season->getElementsByTagName("Skiers") as $skiersAffiliation) {
					// For each skiers, get skier
					foreach ($skiersAffiliation->getElementsByTagName("Skier") as $skierElement) { 
						// Checks if the skier is in this club this season
						if($userName == $skierElement->getAttribute('userName')) {
							// Checks that the skier has a club affiliation
							if($skiersAffiliation->getAttribute('clubId')) {
								// Adds the club and season as an affiliation of the skier
								$affiliation = new Affiliation($skiersAffiliation->getAttribute('clubId'), $season->getAttribute('fallYear'));
								$s->addAffiliation($affiliation);
							}
							// For each skier, find their logs then their entries and sum together the distances
							foreach($skierElement->getElementsByTagName('Log') as $log) { 
								foreach ($log->getElementsByTagName('Entry') as $entry) { 
									$distance = $entry->getElementsByTagName("Distance");
									$count += $distance->item(0)->nodeValue;
								}
							}
							// Adds the distance and season as an yearlyDistances of the skier
							$yearlyDistance = new yearlyDistance($season->getAttribute('fallYear'), $count);
							$s->addYearlyDistance($yearlyDistance); 
							// Reset count
							$count = 0;
						}
					}
				}
			}
		// Add the skier with his affiliation and yearlyDistances to the skiers array
		array_push($skiers, $s);
		}
        // Return the skiers array
        return $skiers;
    }
}
?>