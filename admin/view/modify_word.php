<?php
include "header.php";
$word_data = read_words_data_stats();
?>




You can achieve this by passing the row index or some unique identifier to the showEditForm() function. Here's how you can modify the code to accomplish that:

html
Copy code
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Table Data</title>
<style>
    .editForm {
        display: none; /* Hide the forms initially */
    }
</style>
</head>
<body>


<script>
    function showEditForm(index) {
        var forms = document.getElementsByClassName("edit_form");
        var form = document.getElementById("edit_form_" + index);
        if(form.style.display == "block"){

        }
        for (var i = 0; i < forms.length; i++) {
            forms[i].style.display = "none"; // Hide all forms

        }
        form.style.display = "block"; // Show the form corresponding to the index
    }
</script>



<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="filter_menu">
    <input type="hidden" name="action"value="<?=$action?>">
        <select class="dropdown-content" name="filter">
            <option value="haste">Fastest</option>
            <option value="tarry">Slowest</option>
            <option value="old">Oldest</option>
            <option value="new">Newest</option>
            <option value="common">Common</option>
            <option value="rare">Rare</option>
            <option value="alpha">Alphabetical</option>
        </select>
        <button class="submit">SUBMIT</button>
        </form>

<div class="word_modify_table">
    <p class="stat_table_label">WORDS MODIFICATION</p>

    <table class = "modify_words_table">
        <tr>
            <th>ID</th>
            <th>Word</th>
            <th>Times Signed</th>
            <th>Haste</th>
            <th>Tarry</th>
            <th>Average</th>
            <th>Hint</td>
            <th>Edit</th>
            <th>--X--</th>
        </tr>
        <?php 
            $num = 0;
            foreach ($word_data as $attribute) { 
            ?>
            <tr>
                <td class='attribute'>
                    <?= $attribute["ID"] ?>
                </td>
                <td class='letter'>
                    <?= $attribute["word"] ?>
                </td>
                <td class='data'>
                    <?= $attribute["frequency"] ?>
                </td>
                <td class='data'>
                    <?= $attribute["haste"] ?>
                </td>
                <td class='data'>
                    <?= $attribute["tarry"] ?>
                </td>
                <td class='data'>
                    <?= $attribute["average"] ?>
                </td>
                <td class = 'data'>
                    <?=$attribute['hint'] ?>
                </td>
                <?php echo "<td><button onclick='showEditForm(".$num.")'>Edit</button>";?>
                <!--This line is inverted, so that we can use num as a value here.-->
                <?php echo "<form id = 'edit_form_".$num."' class= 'edit_form' action='".$_SERVER["PHP_SELF"]."' method='POST'>";?>
                    <input type="hidden" name="action" value="edit_word">
                    <input type="hidden" name="word_id" value="<?=$attribute["ID"]?>">
                    <label for="word">Word</label>
                    <input type="text" name="word" placeholder="<?=$attribute["word"];?>" value="<?=$attribute["word"];?>">
                    <label for="frequency">Frequency</label>
                    <input type="text" name="frequency" placeholder="<?=$attribute["frequency"];?>" value="<?=$attribute["frequency"];?>">
                    <label for="haste">Haste</label>
                    <input type="text" name="haste" placeholder="<?=$attribute["haste"];?>" value="<?=$attribute["haste"];?>">
                    <label for="tarry">Tarry</label>
                    <input type="text" name="tarry" placeholder="<?=$attribute["tarry"];?>" value="<?=$attribute["tarry"];?>">
                    <label for="average">Average</label>
                    <input type="text" name="average" placeholder="<?=$attribute["average"];?>" value="<?=$attribute["average"];?>">
                    <label for="Hint">Hint</label>
                    <input type="text" name="hint" placeholder="<?=$attribute["hint"];?>" value="<?=$attribute["hint"];?>">
                    <label for="Category">Category:</label><br>
                    <select name="category" id="categories">
                        <option selected disabled value ="">No Category</option> 
                        <option value="household">Household</option>
                        <option value="food">Food</option>
                        <option value="environment">Environemnt</option>
                        <option value="action">Action</option>
                    </select>
                    <button type="submit">Submit</button>
                </form>

                </td>
                <td>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="hidden" name="action" value="delete_word">
                <input type="hidden" name="word_id" value="<?=$attribute["ID"]?>">
                 <button type="submit" class="DELETE_BUTTON">X</button>
        </form>
                </td>
            </tr>
        <?php 
        $num+=1;
        } ?>

        <span class="hidden">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="action" value="reset_words">
            <button type="submit" class="DELETE_BUTTON">RESET WORD VALUES</button>
        </form>
        </span>
    </table>
</div>


<?php include 'footer.php'; ?>




<?php
include "footer.php";
?>