<?php

function logIn($username, $password, $ip) {
    require_once('connect.php');
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);
    $loginstring = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND user_pass = '{$password}'";
    //echo $loginstring;

    $user_set = mysqli_query($link, $loginstring);
    if (mysqli_num_rows($user_set)) {
        $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);

        //Verify if the user is blocked --> You are getting the value "null" or "blocked" from the user_status colunm in the database
        $status = $found_user['user_status'];
        if ($status === 'blocked') {
            return $message = 'The user is blocked please contact the admin';
        }


        $id = $found_user['user_id'];
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $found_user['user_fname'];

        //Save date time login //
        $_SESSION['user_lastlogin'] = date("l jS \of F Y h:i:s A") ;
        //http://php.net/manual/en/function.date.php

        if (mysqli_query($link, $loginstring)) {
            $updatestring = "UPDATE tbl_user SET user_ip = '$ip' WHERE user_id = {$ip}";
            $updatequery = mysqli_query($link, $updatestring);

        }
        redirect_to("admin_index.php");
    } else {
        $message = "Username and or password incorrect. <br>Please make sure your cap lock key is turned off.";

        //Count fail attemps and update the user status field
        if (!isset($_SESSION['fail_attemps'])) {
            $_SESSION['fail_attemps'] = 0;
        }
        $_SESSION['fail_attemps'] = $_SESSION['fail_attemps'] + 1; // you are incramenting the value of the failed attemts
        if ($_SESSION['fail_attemps'] === 3) {
            $updatestring = "UPDATE tbl_user SET user_status = 'blocked' WHERE username = '{$username}'"; // update the feild user_status if the user has been blocked
            $updatequery = mysqli_query($link, $updatestring);
            $message = "3 failed attemps the user is blocked now";
            $_SESSION['fail_attemps'] = 0; // reset the failed attempts value if the user is blocked
        }

        return $message;
    }


    mysqli_close($link);
}

?>
