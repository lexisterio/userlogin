<?php

	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

    function welcomeTimeMessage(){
        $hourDay = date("G"); // "G" returns the hour of the day
        if($hourDay <= 10){
            $message = "Good Morning";
        }
        if($hourDay  >= 17 ){
            $message = "Good Afternoon";
        }

        if($hourDay > 20 ){
            $message = "Good Night";
        }

        return $message;

    }
?>
