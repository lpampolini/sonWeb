<?php

function generateEffortNumber(){
    
    $dbConnection = new connection();
    $dbConnection->newConnection();
    
    // Select last register's Id
    $sqlLastEffNum = ' Select Id from Efforts ORDER BY Id DESC Limit 1';
    $res = $dbConnection->execSql($sqlLastEffNum);
    $record = mysql_fetch_assoc($res);
    
    // Increment Id
    $nextId = (int)$record['Id']+1;
    $lenght = strlen($nextId);
    
    // Add the necessary zero's to the left
    $code = $nextId;
    while(strlen($code)<5){
        $code = '0'.$code;
    }
    
    // Actual year
    $year = date("Y");

    // Concatenate
    $effortNumber = $year.'-SAU-'.$code;
    //echo $effortNumber;

  return $effortNumber;
}

?>