<?php

	namespace App\Maxserv_opdracht;
	
	class ToDoSanitizer {
		
		// Ik heb gekozen om standaard waardes te gebruiken voor foute input ipv foutmeldingen te genereren. 
		
		static public function sanitizeString($string) {
			$string = preg_replace("/[^a-zA-Z0-9 ]/", "", $string);
			return $string;
		}
		
		static public function sanitizeDate($date) {
			$output = strtotime($date) ? $date : date("Y-m-d");
			return $output;
		}
		
		// Deze wordt gebruikt om ids te controleren voordat deze in een query komen. Omdat er geen id's met 0 zijn zal de standaard waarde geen resultaten opleveren.
		static public function sanitizeInteger($integer) {
			$output = is_numeric($integer) ? $integer : 0;
			return $output;
		}
	}