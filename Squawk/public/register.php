<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate inputs
        if (empty($_POST["email"]))
        {
            apologize("You must provide a email.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        else if (empty($_POST["confirmation"]) || $_POST["password"] != $_POST["confirmation"])
        {
            apologize("Those passwords did not match.");
        }
        else if (!strpos ($_POST["email"], "@college.harvard.edu"))
        {
            apologize("You must provide a Harvard College email.");
        }

        // try to register user
        $rows = CS50::query("INSERT IGNORE INTO users (emailkey, email, hash, score) VALUES(?, ?, ?, ?)",
            rand(1000, 9999), $_POST["email"], password_hash($_POST["password"], PASSWORD_DEFAULT), 0
        );
        if ($rows !== 1)
        {
            apologize("That email appears to be taken.");
        }

        // get new user's ID
        $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
        if (count($rows) !== 1)
        {
            apologize("Can't find your ID.");
        }
        $id = $rows[0]["id"];

        // log user in
        $_SESSION["id"] = $id;

        // redirect to email confirmation
        redirect("/confirm.php");
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>
