<!--This is the file where the actual spelling takes place. -->
<?php 
function read_alpha_data($letter){
    global $db;
    #Our query will be run on the database, so in this case it needs everything from our task list.
    $query = 'SELECT * FROM alpha_frequency WHERE letter = :letter' ;
    $statement = $db->prepare($query);
    $statement->bindValue(':letter', $letter);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function write_alpha_data(letter){

}
function run_test(num){
    //Depending on the difficulty, this will loop various times. 
    //it will always need to use the system time to track how long the user takes to sign a letter
    var $i = 0;
    var $letter = '?';
    for($i = 0; $i < $num; $i++){
    //choose a random letter a-z (ASCII 97 - 122)
        //use chr() to get the letter of the ASCII value, accepting decimal. 
        $letter = chr(rand(97,122))

        //read the letters data, including the number of times it has appeared and the average time
        $data = read_alpha_data($letter)
        $data_freq = $data['frequency'];
        $data_haste = $data['haste'];
        $data_tarry = $data['tarry'];
        $data_average = $data['average'];
        
        //display that letter to the screen and note the system times

    //when the user hits the spacebar, note the system time again.

    //write to the database: +1 to the number of times the letter has appeared, and appropriatley
    //change the average times. if the time is the fastest or the slowest, update it. 
    }



}
function show_data(){

}