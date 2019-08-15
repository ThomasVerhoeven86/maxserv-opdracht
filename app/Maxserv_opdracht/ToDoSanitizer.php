<?php

	namespace App\Maxserv_opdracht;
	
	class ToDoSanitizer {
		
		// Deze class schoont userinput op. Ik heb gekozen om standaard waardes te gebruiken voor foute input ipv foutmeldingen te genereren. 
		
		static public function sanitizeString($string) {
			// Toegestande karakters zijn (hoofd)letters, getallen en spaties
			$string = preg_replace("/[^a-zA-Z0-9 ]/", "", $string);
			return $string;
		}
		
		static public function sanitizeDate($date) {
			$output = strtotime($date) ? $date : date("Y-m-d");
			return $output;
		}
		
		// Deze functie wordt gebruikt om ids te controleren voordat deze in een query komen. Omdat er geen id's met 0 zijn zal de standaard waarde geen resultaten opleveren uit de database
		static public function sanitizeInteger($integer) {
			$output = is_numeric($integer) ? $integer : 0;
			return $output;
		}
	}