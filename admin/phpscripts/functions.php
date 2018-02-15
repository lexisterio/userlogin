<?php
	
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
    function welcomeTimeMessage(){
        $hourDay = date("G");
        if($hourDay <= 8){
            $message = "Good Mourning";
        }
        if($hourDay <= 17 ){
            $message = "Good Aftermoon";
        }
        
        if($hourDay > 18 ){
            $message = "Good Night";
        }
        
        return $message;
        
    }
?>