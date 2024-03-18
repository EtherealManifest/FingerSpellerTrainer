<?php
require('db.php');
require('sign.php');
$action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
$message = filter_input(INPUT_GET, 'message', FILTER_UNSAFE_RAW);
$time = filter_input(INPUT_GET, 'time', FILTER_UNSAFE_RAW);
$letter = filter_input(INPUT_GET, 'letter', FILTER_UNSAFE_RAW);

if($message){
    echo $message;
}
if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action) {
        $action = 'stats';
    }
}
if(!$time) {
    $time = filter_input(INPUT_GET, 'time', FILTER_UNSAFE_RAW);
}
if(!$letter) {
    $letter = filter_input(INPUT_GET, 'letter', FILTER_UNSAFE_RAW);
}
if($letter && $time){
    write_alpha_data($letter, $time);
    $action = 'test';
}


#echo($action);
 switch($action) {
    case 'test':
        //if the user wishes to test, then create an array with the data for each letter. the test should 
        //include each letter at least once, but even if not, it wont be that complicated to just load 
        //them all in. Create the array, then send that to the page, then using php, have it display the
        //letter in question. The array is formatted as:list[item['letter_id']]
        $letter_data = array();
        for($i = 97; $i<=122; $i++){
            //i will correspond to the ascii value of a lower-case letter, whish is needed to pass
            //to teh read_alpha_data. use that here, reading 26 letters and adding each to the pile. 
            $letter_data[] = read_alpha_data(chr($i));
        }
        include('view/display.php');
        //next hop over to the display page, where the php will handle input. 
        break;
    case 'stats':
        $letter_data = array();
        for($i = 97; $i<=122; $i++){
            //i will correspond to the ascii value of a lower-case letter, whish is needed to pass
            //to teh read_alpha_data. use that here, reading 26 letters and adding each to the pile. 
            $letter_data[] = read_alpha_data(chr($i));
        }
        include 'view/statistics.php';
        break;
 }
?>