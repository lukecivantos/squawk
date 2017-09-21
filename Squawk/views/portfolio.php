<script>
    
    // When up is clicked connects to the file that queries
    function upClick(postId) {
        
        var parameters = {
            id: postId,
        };
        
        if (document.getElementById("upForm" + postId).getAttribute("src") != "/img/up2.png")
        {
            if (document.getElementById("downForm" + postId).getAttribute("src") != "/img/down2.png")
            {
                // Connects to upvote.php
                $.get("upvote.php", parameters)
                .done(function(data, textStatus, jqXHR) {
                
                        // Changes image
                        document.getElementById("upForm" + postId).src = "/img/up2.png";
                       
                        // Updates the score
                        var current_score = $("#post_" + postId + " .score").text();
                        $("#post_" + postId + " .score").text(parseInt(current_score) + 1);
                    
                })
                
                // Check if JSON fails
                .fail(function(jqXHR, textStatus, errorThrown) {
                    
                    // log error to browser's console
                    console.log(errorThrown.toString());
                    
                });  
            }
            else
            {
                // Connects to upvote.php
                $.get("flipupvote.php", parameters)
                .done(function(data, textStatus, jqXHR) {
                
                    // Changes image
                    document.getElementById("upForm" + postId).src = "/img/up2.png";
                    document.getElementById("downForm" + postId).src = "/img/down.png";
                   
                    // Updates the score
                    var current_score = $("#post_" + postId + " .score").text();
                    $("#post_" + postId + " .score").text(parseInt(current_score) + 2);
                
                })
                
                // Check if JSON fails
                .fail(function(jqXHR, textStatus, errorThrown) {
                    
                    // log error to browser's console
                    console.log(errorThrown.toString());
                    
                });
            }
        }  
        else
        {
            
            $.get("unupvote.php", parameters)
            .done(function(data, textStatus, jqXHR) {
                        
            // Changes logo thing
            document.getElementById("upForm" + postId).src= "/img/up.png";
            
            // Updates score
            var current_score = $("#post_" + postId + " .score").text();
            $("#post_" + postId + " .score").text(parseInt(current_score) - 1);
            })
                
            // Check if JSON fails
            .fail(function(jqXHR, textStatus, errorThrown) {
                
                // log error to browser's console
                console.log(errorThrown.toString());
                    
            });
        }
    }
    
    // Connects if down is clicked
    function downClick(postId) {
        
        var parameters = {
            id: postId
        };
        
        if (document.getElementById("downForm" + postId).getAttribute("src") != "/img/down2.png")
        {
            if (document.getElementById("upForm" + postId).getAttribute("src") != "/img/up2.png")
            {
                
                // Connects to downvote.php
                $.get("downvote.php", parameters)
                .done(function(data, textStatus, jqXHR) {
                        
                        // Changes logo thing
                        document.getElementById("downForm" + postId).src= "/img/down2.png";
                
                        // Updates score
                        var current_score = $("#post_" + postId + " .score").text();
                        $("#post_" + postId + " .score").text(parseInt(current_score) - 1);
                })
                
                // Check if JSON fails
                .fail(function(jqXHR, textStatus, errorThrown) {
                    
                    // log error to browser's console
                    console.log(errorThrown.toString());
                    
                });
            }    
            else
            {
                $.get("flipdownvote.php", parameters)
                .done(function(data, textStatus, jqXHR) {
                        
                        // Changes logo thing
                        document.getElementById("upForm" + postId).src="/img/up.png";
                        document.getElementById("downForm" + postId).src="/img/down2.png";

                        // Updates score
                        var current_score = $("#post_" + postId + " .score").text();
                        $("#post_" + postId + " .score").text(parseInt(current_score) - 2);
                })
                
                // Check if JSON fails
                .fail(function(jqXHR, textStatus, errorThrown) {
                    
                    // log error to browser's console
                    console.log(errorThrown.toString());
                    
                });
            }
        }
        else
        {
            
            $.get("undownvote.php", parameters)
            .done(function(data, textStatus, jqXHR) {
                        
                // Changes logo thing
                document.getElementById("downForm" + postId).src="/img/down.png";
                
                // Updates score
                var current_score = $("#post_" + postId + " .score").text();
                $("#post_" + postId + " .score").text(parseInt(current_score) + 1);
            })
                
            // Check if JSON fails
            .fail(function(jqXHR, textStatus, errorThrown) {
                
                // log error to browser's console
                console.log(errorThrown.toString());
                    
            });
        }
    }
</script>
    <div>
        <script>
        $('#question').emojiPicker('toggle');
        $('<input/>').attr({ type: 'text', id: 'test', name: 'test' }).appendTo('#form');
        </script>
        <form action= "index.php" method="post">
        <fieldset>
            <div style="" id="question">
                <input autocomplete="off" autofocus class="form-control" name="entry_submission" placeholder="Add a post..." type="text"/>
            </div>
        </fieldset>
        </form>
    </div>
<p>
            <form action="sortnew.php" method="post">
            <div style="text-align: center" class="form-group">
                <button class="btn btn-default" type="New">
                    <span aria-hidden="true"></span>
                    New
                </button>
            </form>
            </div>

       
            <form action="sortpopular.php" method="post">
            <div style="text-align: center" class="form-group">
                <button class="btn btn-default" type="Popular">
                    <span aria-hidden="true"></span>
                    Popular
                </button>
            </div>
            </form>
            
            <div>
<form action="logout.php" method="post">
    <div style="float: none" class="form-group">
        <button class="btn btn-danger" type="Log Out">
            <span aria-hidden="true"></span>
            Log Out
        </button>
    </div>
</form>

<table class="table table-striped">
    
    <tbody>
        <?php
        $counter = 0;
        foreach ($entries as $entry)
        {
            $voteup = "/img/up.png";
            $votedown = "/img/down.png";
            // Check for updown
            
            foreach ($signs as $sign)
            {
                if ($sign["entry_id"] == $entry["id"])
                {
                    if ($sign["up_down"] == 1)
                    {
                        $voteup = "/img/up2.png";
                        $votedown = "/img/down.png";
                        break;
                    }
                    else if ($sign["up_down"] == 2)
                    {
                        $voteup = "/img/up.png";
                        $votedown = "/img/down2.png";
                        break;
                    }
                    else
                    {
                        $voteup = "/img/up.png";
                        $votedown = "/img/down.png";
                        break;
                    }
                }    
            }
            
            printf("<tr id=post_%d>", htmlspecialchars($entry["id"]));
            printf("<td>%s</td>", getElapsedTime($entry["time_made"]));
            printf("<td>%s</td>", htmlspecialchars($entry["entry"]));
            printf("<td><form method=\"get\" action=\"comments.php\"><input type=\"hidden\" name=\"entry_id\" value=\"%d\"><input type=\"submit\" value= \"%d Comment(s)...\"\></form></td>", htmlspecialchars($entry["id"]),htmlspecialchars($entry["number_comments"]));
            printf("<td><input type=\"image\" onclick=\"upClick(%d)\" src=\"%s\" name=\"saveForm\" class=\"btTxt submit\" id=\"upForm%d\"/></td>", htmlspecialchars($entry["id"]), $voteup, htmlspecialchars($entry["id"]));
            printf("<td class='score'>%s</td>", htmlspecialchars($entry["score"]));
            printf("<td><input type=\"image\" onclick=\"downClick(%d)\" src=\"%s\" name=\"saveForm\" class=\"btTxt submit\" id=\"downForm%d\"/></td>", htmlspecialchars($entry["id"]), $votedown, htmlspecialchars($entry["id"]));
            printf("</tr>");
            $counter++;
            //if ($counter == 20)
            //{
            //    break;
            //}
        }
        printf("<td><input type=\"button\" onclick=\"loadForm($counter)\" value= \"Load More...\" name=\"loadForm\" class=\"btTxt submit\" id=\"loadForm\"/></td>");
        
        // elapsed time function (http://stackoverflow.com/questions/2915864/php-how-to-find-the-time-elapsed-since-a-date-time)
        function getElapsedTime($eventTime)
        {   
            $totaldelay = time() - strtotime($eventTime);
            if($totaldelay <= -1)
            {
                return '';
            }
            else
            {
                if($days=floor($totaldelay/86400))
                {
                    $totaldelay = $totaldelay % 86400;
                    return $days.' days ago';
                }
                if($hours=floor($totaldelay/3600))
                {
                    $totaldelay = $totaldelay % 3600;
                    return $hours.' hours ago';
                }
                if($minutes=floor($totaldelay/60))
                {
                    $totaldelay = $totaldelay % 60;
                    return $minutes.' minutes ago';
                }
                if($seconds=floor($totaldelay/1))
                {
                    $totaldelay = $totaldelay % 1;
                    return $seconds.' seconds ago';
                }
            }
        }

        ?>
    </tbody>
</table>

<!-- offensive comment reporter -->
<div class= "help">
    <a href="mailto:squawkhelp@gmail.com">Report Offensive Content</a>
</div>

<script>
    function loadForm(value)
    {
        $('#myTable > tbody:last-child').append();
    }
</script>