{"filter":false,"title":"flipupvotec.php","tooltip":"/finalproject/public/flipupvotec.php","ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":5,"column":54},"end":{"row":5,"column":54},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"hash":"db4b60094a2c5d909d378bcd9e6f277f6328844c","undoManager":{"mark":10,"position":10,"stack":[[{"start":{"row":0,"column":0},"end":{"row":8,"column":2},"action":"insert","lines":["<?php","","    // configuration","    require(\"../includes/config.php\"); ","","    CS50::query(\"UPDATE comments SET comment_score = comment_score + 1 WHERE id = ?\", $_GET[\"id\"]);","    CS50::query(\"DELETE FROM votes2 WHERE (user_id = ? AND entry_id = ? AND comment_id = ?)\", $_SESSION[\"id\"], $_GET[\"entry_id\"], $_GET[\"id\"]);","    $results = CS50::query(\"INSERT INTO votes2 (user_id, entry_id, comment_id, up_down) VALUES(?,?,?)\", $_SESSION[\"id\"], $_GET[\"entry_id\"], $_GET[\"id\"], 0);","?>"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":8,"column":2},"action":"remove","lines":["<?php","","    // configuration","    require(\"../includes/config.php\"); ","","    CS50::query(\"UPDATE comments SET comment_score = comment_score + 1 WHERE id = ?\", $_GET[\"id\"]);","    CS50::query(\"DELETE FROM votes2 WHERE (user_id = ? AND entry_id = ? AND comment_id = ?)\", $_SESSION[\"id\"], $_GET[\"entry_id\"], $_GET[\"id\"]);","    $results = CS50::query(\"INSERT INTO votes2 (user_id, entry_id, comment_id, up_down) VALUES(?,?,?)\", $_SESSION[\"id\"], $_GET[\"entry_id\"], $_GET[\"id\"], 0);","?>"],"id":2},{"start":{"row":0,"column":0},"end":{"row":8,"column":2},"action":"insert","lines":["<?php","","    // configuration","    require(\"../includes/config.php\"); ","","    CS50::query(\"UPDATE comments SET comment_score = comment_score - 2 WHERE id = ?\", $_GET[\"id\"]);","    CS50::query(\"DELETE FROM votes2 WHERE (user_id = ? AND entry_id = ? AND comment_id = ?)\", $_SESSION[\"id\"], $_GET[\"entry_id\"], $_GET[\"id\"]);","    $results = CS50::query(\"INSERT INTO votes2 (user_id, entry_id, comment_id, up_down) VALUES(?,?,?)\", $_SESSION[\"id\"], $_GET[\"entry_id\"], $_GET[\"id\"], 2);","?>"]}],[{"start":{"row":5,"column":67},"end":{"row":5,"column":68},"action":"remove","lines":["-"],"id":3}],[{"start":{"row":5,"column":67},"end":{"row":5,"column":68},"action":"insert","lines":["+"],"id":4}],[{"start":{"row":7,"column":99},"end":{"row":7,"column":100},"action":"insert","lines":["?"],"id":5}],[{"start":{"row":7,"column":100},"end":{"row":7,"column":101},"action":"insert","lines":[","],"id":6}],[{"start":{"row":7,"column":155},"end":{"row":7,"column":156},"action":"remove","lines":["2"],"id":7}],[{"start":{"row":7,"column":155},"end":{"row":7,"column":156},"action":"insert","lines":["1"],"id":8}],[{"start":{"row":4,"column":0},"end":{"row":5,"column":0},"action":"insert","lines":["",""],"id":9}],[{"start":{"row":5,"column":0},"end":{"row":5,"column":4},"action":"insert","lines":["    "],"id":10}],[{"start":{"row":5,"column":4},"end":{"row":5,"column":54},"action":"insert","lines":["// Sets the score and database votes appropriately"],"id":11}]]},"timestamp":1449420239000}