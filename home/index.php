<?php
require_once('../common/db.php');
require_once('../common/sign.php');
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$new_Word = filter_input(INPUT_POST, 'new_Word', FILTER_UNSAFE_RAW);
$hint = filter_input(INPUT_POST, 'new_hint', FILTER_UNSAFE_RAW);
$new_string = filter_input(INPUT_POST, 'new_string', FILTER_UNSAFE_RAW);
$message = filter_input(INPUT_GET, 'message', FILTER_UNSAFE_RAW);
$filter = filter_input(INPUT_POST, 'filter', FILTER_UNSAFE_RAW);


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
        $action = 'home';
    }
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
        $letter_data = read_alphas_data_stats();
        $word_data = read_words_data_stats();
        $string_data = read_strings_data_stats();
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
        add_word($new_Word, $new_hint);
        $message = $new_Word." Added";
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
    case 'home':
        include('view/home.php');
        break;
 }
?>