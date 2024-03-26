<?php
require_once('../common/db.php');
require_once('../common/sign.php');
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$new_Word = filter_input(INPUT_POST, 'new_Word', FILTER_UNSAFE_RAW);
$word = filter_input(INPUT_POST, 'word', FILTER_UNSAFE_RAW);
$message = filter_input(INPUT_GET, 'message', FILTER_UNSAFE_RAW);
$time = filter_input(INPUT_GET, 'time', FILTER_UNSAFE_RAW);
$letter = filter_input(INPUT_GET, 'letter', FILTER_UNSAFE_RAW);
$new_string = filter_input(INPUT_POST, 'new_string', FILTER_UNSAFE_RAW);
$string = filter_input(INPUT_POST, 'string', FILTER_UNSAFE_RAW);
$filter = filter_input(INPUT_POST, 'filter', FILTER_UNSAFE_RAW);
$handMode = filter_input(INPUT_POST, 'handMode', FILTER_UNSAFE_RAW);
if($handMode){
    toggle_handMode();
}

if($message){
    echo $message;
}
if(!$filter){
    $filter = filter_input(INPUT_GET, 'filter', FILTER_UNSAFE_RAW);
    if(!$filter){
        $filter = get_filter();
    }
}
set_filter($filter);
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
 switch($action) {
    case 'reset_words':
        reset_Words();
        header("Location: .?action=stats");
        break;
    case 'reset_letters':
        reset_Letters();
        header("Location: .?action=stats");
    case 'reset_strings':
        reset_Strings();
        header("Location: .?action=stats");
    case 'stats':
        $letter_data = read_alphas_data();
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
 }
?>