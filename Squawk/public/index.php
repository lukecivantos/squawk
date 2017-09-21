<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '.. /google-api-php-client/src');

    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["entry_submission"]))
        {
            apologize("Please enter a post.");
        }
        if(!preg_match("/[a-z]/i",$_POST["entry_submission"]) && !preg_match('/\d/', $_POST["entry_submission"]))
        {
            apologize("You Need at least one letter or number.");
        }

        
        // update entries
        CS50::query("INSERT INTO entries (user_id, entry)
        VALUES(?, ?)", $_SESSION["id"], $_POST["entry_submission"]);


        // get entries
        $rows = CS50::query("SELECT * FROM entries ORDER BY time_made DESC");
        if ($rows === false)
        {
            apologize("Can't find entries.");
        }
        
        // Gets votes
        $votes = CS50::query("SELECT * FROM votes WHERE user_id = ?", $_SESSION["id"]);
        if ($votes === false)
        {
            apologize("Can't find entries.");
        }
        
        
        //store entries
        $entries = [];
        foreach ($rows as $row)
        {
            $entries[] = [
                "entry" => $row["entry"],
                "score" => $row["entry_score"],
                "id" => $row["id"],
                "time_made" => $row["time_made"],
                "number_comments" => $row["number_comments"]

               
            ];
        }
        $signs = [];
        foreach ($votes as $vote)
        {
            $signs[] = [ 
                "user_id" => $vote["user_id"],
                "entry_id" => $vote["entry_id"],
                "up_down" => $vote["up_down"]
            ];
        }
    
        // render portfolio  "score" => $score,
        render("portfolio.php", ["signs" => $signs, "entries" => $entries, "title" => "Squawk"]);
    }
    else
    {
        
        // get entries
        $rows = CS50::query("SELECT * FROM entries ORDER BY time_made DESC");
        if ($rows === false)
        {
            apologize("Can't find entries.");
        }
        
        // Get Votes
        $votes = CS50::query("SELECT * FROM votes WHERE user_id = ?", $_SESSION["id"]);
        if ($votes === false)
        {
            apologize("Can't find entries.");
        }
        
        
        // look up entry's info
        $entries = [];
        foreach ($rows as $row)
        {
            $entries[] = [
                "entry" => $row["entry"],
                "score" => $row["entry_score"],
                "id" => $row["id"],
                "time_made" => $row["time_made"],
                "number_comments" => $row["number_comments"]
               
            ];
        }
        
        // Look up vote's info
        $signs = [];
        foreach ($votes as $vote)
        {
            $signs[] = [ 
                "user_id" => $vote["user_id"],
                "entry_id" => $vote["entry_id"],
                "up_down" => $vote["up_down"]
            ];
        }
    
    
        // render portfolio "score" => $score,
        render("portfolio.php", ["signs" => $signs, "entries" => $entries, "title" => "Thought Bubble"]);
    }
?>