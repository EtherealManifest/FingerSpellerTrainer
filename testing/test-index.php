<?php
require("../common/db.php");
require("../common/sign.php");
$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$filter = filter_input(INPUT_POST, 'filter', FILTER_UNSAFE_RAW);
$type = filter_input(INPUT_POST, 'type', FILTER_UNSAFE_RAW);
$volume = filter_input(INPUT_POST, 'volume', FILTER_UNSAFE_RAW);
var_dump($_POST);
switch ($action) {
    case 'test':
        set_filter($filter);
        set_volume($volume);
        switch($type){
            case 'words':
                $word_data = get_words_data();
                include("view/display_word.php");
                break;
            case 'letters':
                $letter_data = get_alphas_data();
                include("view/display.php");
                break;
            case'strings':
                $string_data =  get_strings_data();
                include("view/display_string.php");
                break;
        }
    default:
        header("Location: test-filter.php");
        
}

?>
