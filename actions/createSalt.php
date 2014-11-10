<?php
//
///*
//
//Step # 2 call generateSaltWithKey($key) from login and/or adduser functions !
//it should look like this;
//
//$salt = generateSaltWithKey( $password ); $password is what user entered !!
//
//$passwd = hash("sha512", $password . $salt);
//
//Now you generated a salt with very complex method and added to user's password! 
//no one can break that :P
//
//I have a field in my user table to keep $salt number as well. 
//I use it for password recovery !
//
//*/
//
//
//// Define constants
//define(MAX_LENGTH, 256);
//define (alphabet,'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVxXwWyYzZ') ;
//define (numbers,'1234567890');
//define (specials,'~!@#$%^&*()-_{}[]|;:?<>.,');
//
//function generateRandomKey(){
//
//    // Define ranges for random selection
//    $alphabetRange = strlen(alphabet)-1;
//    $numbersRange = strlen(numbers)-1;
//    $specialRange = strlen(specials)-1;
//
//    $randKey = '';
//
//    for($i=0; $i<5; $i++){
//        $index = rand(0, $alphabetRange-1);
//        $randKey = $randKey.substr(alphabet, $index, 1);
//
//        $index = rand(0, $numbersRange-1);
//        $randKey = $randKey.substr(numbers, $index, 1);
//
//        $index = rand(0, $specialRange-1);
//        $randKey = $randKey.substr(specials, $index, 1);
//    }
//
//    return $randKey;
//
//}
//    
function generateSalt($key){
    
    $keyPass = "h9)E1#M5,H9Sn5#Q7>H3}s4!w0(D3.";
    
    // Random value used to create salt value
    $piece = md5($keyPass);

    // Salt for the key encryption
    $salt = substr($piece, 0, MAX_LENGTH);

    // Return Salt key
    return hash("sha512", $key.$salt);
    
}