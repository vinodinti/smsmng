<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Start Different Date Format Functions
if( ! function_exists('DateFormat')){
    function DateFormat($Date){
		return date('d M Y', strtotime($Date));
	}
}

if( ! function_exists('DateFormatCtrl')){
	
    function DateFormatCtrl($Date){
		$validDate = strtotime($Date);
		if($validDate > 0){
			return date('d/m/Y', strtotime($Date));
		}return false;
	}
	
}

if( ! function_exists('DateTimeFormatCtrl')){
    function DateTimeFormatCtrl($Date){
		//$Date = str_replace("-","/", $Date);
		return date('d/m/Y h:i:s A', strtotime($Date));
	}
}
if( ! function_exists('DateDmY_to_Ymd')){
    function DateDmY_to_Ymd($date = NULL){
		$date = str_replace("/","-", $date);
		if($date) return date('Y-m-d', strtotime($date));
		return false;
	}
}
if( ! function_exists('DateTimeDmY_to_Ymd')){
    function DateTimeDmY_to_Ymd($date = NULL){
		$date = str_replace("/","-", $date);
		if($date) return date('Y-m-d H:i:s', strtotime($date));
		return false;
	}
}

if( ! function_exists('TimeTwelve_to_TwentyFour')){
    function TimeTwelve_to_TwentyFour($time = NULL){
		
		if($time) return date("G:i", strtotime($time));
		return false;
	}
}

if( ! function_exists('DateTimeFormatMonth')){
    function DateTimeFormatMonth($Date){
		//$Date = str_replace("-","/", $Date);
		return date('d M Y h:i:s A', strtotime($Date));
	}
}

if( ! function_exists('DateTimeFormat')){
    function DateTimeFormat($Date = '', $Style = ''){
	
		if($Style == 'break')
			return date('d M Y', strtotime($Date)) . '<br />' . date('h:i A', strtotime($Date));
			
		return date('d M Y | h:i A', strtotime($Date));
	}
}

if( ! function_exists('Ymd_to_dmY')){
    function Ymd_to_dmY($date = NULL){
		
		$strdate =  preg_replace ('/[-\:\ ]/', '', $date);
		if($strdate > 0)
			return date('d/m/Y', strtotime($date));
		
		return false;
	}
}

if( ! function_exists('dmY_to_Ymd')){
    function dmY_to_Ymd($date = NULL){
		if($date){
			$dateInput = explode('/', $date);
			$date = $dateInput[2].'-'.$dateInput[1].'-'.$dateInput[0];
			return $date;
		}
		return false;
	}
}
//End Different Date Format Functions

//Start Time Format Functions
if( ! function_exists('time_twelve_to_twentyFour')){
    function time_twelve_to_twentyFour($TwelveHours = NULL){
		if($TwelveHours){
			$twentyFour  = date("H:i", strtotime($TwelveHours));
			return $twentyFour;
		}
		return false;
	}
}
if( ! function_exists('time_twentyFour_to_twelve')){
    function time_twentyFour_to_twelve($TwentyFourHours = NULL){
		if($TwentyFourHours){
			$twelve  = date("g:i A", strtotime($TwentyFourHours));
			return $twelve;
		}
		return false;
	}
}


//End Time Format Functions