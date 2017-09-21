<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["keyguess"]))
        {
            apologize("You must enter the code.");
        }

        // get key from database
        $emailkey = CS50::query("SELECT emailkey FROM users WHERE id = ?", $_SESSION["id"]);
        
        // check if they match
        if (strcmp($_POST["keyguess"], $emailkey[0]["emailkey"]) !== 0)
        {
            apologize("Codes did not match.");
        }
        else
        {
            CS50::query("UPDATE users SET active = 18 WHERE id = ?", $_SESSION["id"]);
            redirect("index.php");
        }
        
    }
    else
    {
        // get email
        $useremail = CS50::query("SELECT email FROM users WHERE id = ?", $_SESSION["id"]);
        
        // get code
        $emailkey = CS50::query("SELECT emailkey FROM users WHERE id = ?", $_SESSION["id"]);
        $to = $useremail[0]["email"];
        
        $subject = "Squawk Confirmation Code";
        
        $message = "Here is your code!/r/n
            " . $emailkey[0]["emailkey"] . "/r/n
            Copy and paste into the confirmation box to confirm your account/r/n";
            
        mail($to, $subject, $message);
        
        render("confirm_form.php", ["title" => "Confirm"]);
        
    }

?>
