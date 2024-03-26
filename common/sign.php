<!--This is the file where the actual spelling takes place. -->
<?php


#--------------------------------------------------------------------------------------------------
#Letter Functions
#--------------------------------------------------------------------------------------------------

function read_alpha_data($letter)
{
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'SELECT * FROM alpha_frequency WHERE letter = :letter';
    $statement = $db->prepare($query);
    $statement->bindValue(':letter', $letter);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function read_alphas_data()
{
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'SELECT * FROM alpha_frequency';
    $add = add_filter();
    if ($add == '') {
        $query .= " ORDER BY letter";
        $query .= add_volume();
    } else {
        $query .= $add;
    }
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function write_alpha_data($letter, $time)
{
    $letter = str_replace(' ', '', $letter);
    $data = read_alpha_data($letter)[0];
    $frequency = $data['frequency'] + 1;
    if ($data['haste'] > $time) {
        $haste = $time / 1000;
    } else {
        $haste = $data['haste'];
    }

    if ($data['tarry'] < $time / 1000) {
        $tarry = $time / 1000;
    } else {
        $tarry = $data['tarry'];
    }

    $average = (($data['average'] * $data['frequency']) + $time / 1000) / ($data['frequency'] + 1);

    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'UPDATE `alpha_frequency` SET frequency=:frequency,
                                           haste= :haste,
                                           tarry=:tarry,
                                           average=:average,
                                           letter=:letter WHERE letter = :letter';
    $statement = $db->prepare($query);
    $statement->bindValue(':frequency', $frequency);
    $statement->bindValue(':haste', $haste);
    $statement->bindValue(':tarry', $tarry);
    $statement->bindValue(':average', $average);
    $statement->bindValue(':letter', $letter);
    $statement->execute();
    $statement->closeCursor();
}

function reset_Letters()
{
    global $db;
    $query = 'UPDATE `alpha_frequency` SET `frequency`=0,`haste`=999,`tarry`=0.00,`average`=0.00';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}



#--------------------------------------------------------------------------------------------------
#Word Functions
#--------------------------------------------------------------------------------------------------

function reset_Words()
{
    global $db;
    $query = 'UPDATE `word_frequency` SET `frequency`=0,`haste`=999,`tarry`=0.00,`average`=0.00';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}


function read_word_data($word)
{
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'SELECT * FROM word_frequency WHERE word = :word';
    $statement = $db->prepare($query);
    $statement->bindValue(':word', $word);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function read_words_data()
{
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'SELECT * FROM word_frequency';
    $add = add_filter();
    if ($add == '') {
        $query .= " ORDER BY word";
        $query .= add_volume();
        
    } else {
        $query .= $add;
    }
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function write_word_data($word, $time)
{
    $word = str_replace(' ', '', $word);
    $data = read_word_data($word)[0];
    $frequency = $data['frequency'] + 1;
    if ($data['haste'] > $time / 1000) {
        $haste = $time / 1000;
    } else {
        $haste = $data['haste'];
    }

    if ($data['tarry'] < $time / 1000) {
        $tarry = $time / 1000;
    } else {
        $tarry = $data['tarry'];
    }

    $average = (($data['average'] * $data['frequency']) + $time / 1000) / ($data['frequency'] + 1);

    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'UPDATE `word_frequency` SET frequency=:frequency,
                                           haste= :haste,
                                           tarry=:tarry,
                                           average=:average,
                                           word=:word WHERE word = :word';
    $statement = $db->prepare($query);
    $statement->bindValue(':frequency', $frequency);
    $statement->bindValue(':haste', $haste);
    $statement->bindValue(':tarry', $tarry);
    $statement->bindValue(':average', $average);
    $statement->bindValue(':word', $word);
    $statement->execute();
    $statement->closeCursor();
}

function add_word($word)
{
    global $db;

    $query = 'INSERT INTO `word_frequency`(`word`, `frequency`,`haste`, `tarry`, `average`) 
              VALUES (:word,0,999.99,0.00,0.00)';

    $statement = $db->prepare($query);
    $statement->bindValue(':word', $word);
    $statement->execute();
    $statement->closeCursor();
}

function get_random_word()
{
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'SELECT * FROM word_frequency ORDER BY Rand() LIMIT 1';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}



#--------------------------------------------------------------------------------------------------
#String Functions
#--------------------------------------------------------------------------------------------------



function read_strings_data()
{
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'SELECT * FROM string_frequency';
    $add = add_filter();
    if ($add == '') {
        $query .= " ORDER BY string";
        $query .= add_volume();
    } else {
        $query .= $add;
    }
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function get_random_string()
{
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'SELECT * FROM string_frequency ORDER BY Rand() LIMIT 1';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function reset_Strings()
{
    global $db;
    $query = 'UPDATE `string_frequency` SET `haste`=999,`tarry`= 0.00,`average`=0.00,`frequency`=0 ';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();

}

function string_format($u_string)
{
    $array = str_split($u_string);
    $new_word = array();
    foreach ($array as $val) {
        array_push($new_word, $val . "-");
    }
    $f_string = implode($new_word);
    $f_string = rtrim($f_string, "-");
    return $f_string;
}

function add_string($string)
{
    global $db;
    $new_string = string_format($string);
    $query = 'INSERT INTO `string_frequency`(`string`, `length`, `frequency`,`haste`, `tarry`, `average`) 
              VALUES (:string, :length , 0,999.99,0.00,0.00)';

    $statement = $db->prepare($query);
    $statement->bindValue(':string', $new_string);
    $statement->bindValue(':length', strlen($string));
    $statement->execute();
    $statement->closeCursor();
}

function write_string_data($string, $time)
{
    $string = str_replace(' ', '', $string);
    $data = read_string_data($string)[0];
    $frequency = $data['frequency'] + 1;
    if ($data['haste'] > $time / 1000) {
        $haste = $time / 1000;
    } else {
        $haste = $data['haste'];
    }

    if ($data['tarry'] < $time / 1000) {
        $tarry = $time / 1000;
    } else {
        $tarry = $data['tarry'];
    }

    $average = (($data['average'] * $data['frequency']) + $time / 1000) / ($data['frequency'] + 1);

    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = "UPDATE `string_frequency` SET frequency=:frequency,
                                           haste= :haste,
                                           tarry=:tarry,
                                           average=:average,
                                           string=:string WHERE string = :string";
    $statement = $db->prepare($query);
    $statement->bindValue(':frequency', $frequency);
    $statement->bindValue(':haste', $haste);
    $statement->bindValue(':tarry', $tarry);
    $statement->bindValue(':average', $average);
    $statement->bindValue(':string', $string);
    $statement->execute();
    $statement->closeCursor();
}

function read_string_data($string)
{
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = "SELECT * FROM string_frequency WHERE string = :string";
    $statement = $db->prepare($query);
    $statement->bindValue(':string', $string);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;

}


#--------------------------------------------------------------------------------------------------
#HandMode Functions
#--------------------------------------------------------------------------------------------------


function get_handMode_set()
{
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'SELECT is_set FROM handmode';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function toggle_handMode()
{
    global $db;
    $query = 'UPDATE `handmode` SET `is_set`=:is_set';
    $statement = $db->prepare($query);
    $statement->bindValue(':is_set', !get_handMode_set()[0]["is_set"]);
    $statement->execute();
    $statement->closeCursor();
}


function add_filter()
{
    $filter = get_filter();
    $query = " ORDER BY ";
    switch ($filter) {
        case 'haste':
            $query .= "haste";
            break;
        case 'tarry':
            $query .= "tarry DESC";
            break;
        case 'new':
            $query .= "ID DESC";
            break;
        case 'old':
            $query .= "ID";
            break;
        case 'common':
            $query .= "frequency DESC";
            break;
        case 'rare':
            $query .= "frequency";
            break;
        default:
            $query = '';
    }
    $query .= add_volume();
    return $query;

}

function add_volume()
{
    $query = ' LIMIT ' . get_volume();
    return $query;
}

function set_filter($filter)
{
    global $db;
    $query = "UPDATE `filter` SET `status`=:status";
    $statement = $db->prepare($query);
    $statement->bindValue(':status', $filter);
    $statement->execute();
    $statement->closeCursor();
}


function get_filter()
{
    global $db;
    $query = "SELECT `status` FROM `filter`";
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items[0]["status"];
}

function set_volume($volume)
{
    global $db;
    $query = "UPDATE `filter` SET `volume`=:volume";
    $statement = $db->prepare($query);
    $statement->bindValue(':volume', $volume);
    $statement->execute();
    $statement->closeCursor();
}


function get_volume()
{
    global $db;
    $query = "SELECT `volume` FROM `filter`";
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items[0]["volume"];
}
