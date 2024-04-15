<?php
//The features in this file will be for:
//   Adding and Removing words(adding is also present as a nav link from the home screen)
//   Adding hints to words (added in recent update on 3/28)
//   directly editing records by instance(times for all categories) 
require_once('../common/db.php');
require_once('../common/sign.php');
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$new_Word = filter_input(INPUT_POST, 'new_Word', FILTER_UNSAFE_RAW);
$delete_target = filter_input(INPUT_POST, 'delete_target', FILTER_UNSAFE_RAW);
$delete_type = filter_input(INPUT_POST, 'delete_type', FILTER_UNSAFE_RAW);
$new_string = filter_input(INPUT_POST, 'new_string', FILTER_UNSAFE_RAW);
$message = filter_input(INPUT_GET, 'message', FILTER_UNSAFE_RAW);
$filter = filter_input(INPUT_POST, 'filter', FILTER_UNSAFE_RAW);
$haste = filter_input(INPUT_POST, 'haste', FILTER_UNSAFE_RAW);
$tarry = filter_input(INPUT_POST, 'tarry', FILTER_UNSAFE_RAW);
$average = filter_input(INPUT_POST, 'average', FILTER_UNSAFE_RAW);
$hint = filter_input(INPUT_POST, 'new_hint', FILTER_UNSAFE_RAW);
$word = filter_input(INPUT_POST, 'word', FILTER_UNSAFE_RAW);
$word_id = filter_input(INPUT_POST, 'word_id', FILTER_UNSAFE_RAW);
$frequency = filter_input(INPUT_POST, 'frequency', FILTER_UNSAFE_RAW);
$category = filter_input(INPUT_POST, 'category', FILTER_UNSAFE_RAW);
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
    case 'delete_word':
        delete_word($word_id);
        header("Location: admin_index.php?action=modify_word");
        break;
    case 'edit_word':
        //create a list with the data
        $word_edits=[];
        $word_edits['ID'] = $word_id;
        $word_edits['word'] = $word;
        $word_edits['haste'] = $haste;
        $word_edits['tarry'] = $tarry;
        $word_edits['average'] = $average;
        $word_edits['hint'] = $hint;
        $word_edits['frequency'] = $frequency;
        edit_word($word_edits);
        if($category){
            add_to_category($word_edits["ID"], $category);
        }
        header("Location: admin_index.php?action=modify_word");
    case 'delete_string':
        delete_string();
        header("Location: .?action=stats");
    case 'edit_string':
        edit_string();
        break;
    case "modify_string":
        include("view/modify_string.php");
        break;
    case "modify_word":
        include("view/modify_word.php");
        break;
    case('add'):
        include('view/addWord_admin.php');
        break;
    case('add_word'):
        if(read_word_data($new_word)){
            $message = "Word Already in Database";
        }
        else{
        add_word($new_Word, $hint);
        if($category){
            $data = read_word_data($new_Word);
            $ID = $data[0]["ID"];
            add_to_category($ID, $category);
        }
        $message = $new_Word." Added";
        }
        header("Location: admin_index.php?action=add&message=".$message);
        break;
    case 'add_string':
        include('view/addString_admin.php');
        break;
    case 'add_new_string':
        add_string($new_string);
        header("Location: .?action=add_string");
        break;
    case 'home':
        include('view/admin.php');
        break;
 }
?>