<?php

    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // update entries
        //CS50::query("INSERT INTO entries (user_id, entry)
        //VALUES(?, ?)", $_SESSION["id"], $_POST["entry_submission"]);

        // get entries
        $rows = CS50::query("SELECT * FROM entries ORDER BY entry_score DESC");
        if ($rows == false)
        {
            apologize("Can't find entries.");
        }
    
        $votes = CS50::query("SELECT * FROM votes WHERE user_id = ?", $_SESSION["id"]);
        
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
                "up_down" => $vote["up_down"],
                "entry_id" => $vote["entry_id"],
                "user_id" => $vote["user_id"]
            ];
        }
    
        // render portfolio   "score" => $score,
        render("portfolio.php", ["signs" => $signs, "entries" => $entries, "title" => "Squawk"]);
    }
    else
    {
        // get entries
        $rows = CS50::query("SELECT * FROM entries ORDER BY entry_score DESC");
        if ($rows === false)
        {
            apologize("Can't find entries.");
        }
    
        $votes = CS50::query("SELECT * FROM votes WHERE user_id = ?", $_SESSION["id"]);
        
        // look up stocks' names and prices
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
                "up_down" => $vote["up_down"],
                "entry_id" => $vote["entry_id"],
                "user_id" => $vote["user_id"]
            ];
        }
    
        // render portfolio   "score" => $score,
        render("portfolio.php", ["signs" => $signs, "entries" => $entries, "title" => "Squawk"]);
    }
?>