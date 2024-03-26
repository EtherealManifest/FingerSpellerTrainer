<?php

require_once '../common/db.php';
require_once '../common/sign.php';
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$filter = filter_input(INPUT_POST, 'filter', FILTER_UNSAFE_RAW);
$type = filter_input(INPUT_POST, 'type', FILTER_UNSAFE_RAW);
$volume = filter_input(INPUT_POST, 'volume', FILTER_UNSAFE_RAW);
$word = filter_input(INPUT_POST, 'word', FILTER_UNSAFE_RAW);
$time = filter_input(INPUT_GET, 'time', FILTER_UNSAFE_RAW);
$letter = filter_input(INPUT_GET, 'letter', FILTER_UNSAFE_RAW);
$string = filter_input(INPUT_POST, 'string', FILTER_UNSAFE_RAW);
$handMode = filter_input(INPUT_POST, 'handMode', FILTER_UNSAFE_RAW);
var_dump($_POST);

if($filter){
    set_filter($filter);
}
if($volume){
    set_volume($volume);
}

if($handMode){
    toggle_handMode();
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
    $action = 'test';
    $type='letters';
}

if($word && $time){
    write_word_data($word, $time);
    $action = 'test';
    $type='words';
}

if($string && $time){
    write_string_data($string, $time);
    $action = 'test';
    $type = 'strings';
}

switch ($action) {
    case 'test':
        switch($type){
            case 'words':
                $word_data = read_words_data();
                include("view/display_word.php");
                break;
            case 'letters':
                $letter_data = read_alphas_data();
                include("view/display.php");
                break;
            case'strings':
                $string_data = read_strings_data();
                include("view/display_string.php");
                break;
        }
    default:
        include "./view/test_filter.php";
        
}

?>
