<?php
require('db.php');
require('sign.php');
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$new_Word = filter_input(INPUT_POST, 'new_Word', FILTER_UNSAFE_RAW);
$word = filter_input(INPUT_POST, 'word', FILTER_UNSAFE_RAW);
$message = filter_input(INPUT_GET, 'message', FILTER_UNSAFE_RAW);
$time = filter_input(INPUT_GET, 'time', FILTER_UNSAFE_RAW);
$letter = filter_input(INPUT_GET, 'letter', FILTER_UNSAFE_RAW);
$new_string = filter_input(INPUT_POST, 'new_string', FILTER_UNSAFE_RAW);
$string = filter_input(INPUT_POST, 'string', FILTER_UNSAFE_RAW);

$handMode = filter_input(INPUT_POST, 'handMode', FILTER_UNSAFE_RAW);



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
if(!$word) {
    $word = filter_input(INPUT_GET, 'word', FILTER_UNSAFE_RAW);
}

if(!$string) {
    $string = filter_input(INPUT_GET, 'string', FILTER_UNSAFE_RAW);
}


if($letter && $time){
    write_alpha_data($letter, $time);
    $action = 'test_letters';
}

if($word && $time){
    write_word_data($word, $time);
    $action = 'test_words';
}

if($string && $time){
    write_string_data($string, $time);
    $action = 'test_strings';
}
#echo($action);
 switch($action) {
    case 'test_words':
        include('view/display_word.php');
        //next hop over to the display page, where the php will handle input. 
        break;
    case 'test_letters':
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
        $word_data = array();
        $string_data = array();
        for($i = 97; $i<=122; $i++){
            //i will correspond to the ascii value of a lower-case letter, whish is needed to pass
            //to teh read_alpha_data. use that here, reading 26 letters and adding each to the pile. 
            $letter_data[] = read_alpha_data(chr($i));
        }
        $word_data = read_words_data();
        $string_data = read_strings_data();
        include 'view/statistics.php';
        break;
    case('add'):
        include('view/addWord.php');
        break;
    case('add_word'):
        if(read_word_data($new_word)){
            $message = "Word Already in Database";
        }
        else{
        add_word($new_Word);
        $message = $new_word." Added";
        }
        header("Location: .?action=add&message=".$message);
        break;
    case 'add_string':
        include('view/addString.php');
        break;
    case 'add_new_string':
        add_string($new_string);
        header("Location: .?action=add_string");
        break;
    case 'test_strings':
        include('view/display_string.php');
 }
?>