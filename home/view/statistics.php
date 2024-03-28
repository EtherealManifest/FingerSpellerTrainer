<?php include 'header.php'; ?>
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

    <div class = "meta_stats_sector">
    <?php
        $data = get_meta();
        $total_signs = $data["total_letters"] + $data["total_strings"] + $data["total_words"];
        $total_signings = $data["signed_letters"] + $data["signed_strings"] + $data["signed_words"];
        $total_sign_time = $data["total_time_letter"] + $data["total_time_string"] + $data["total_time_word"];
        ?>
    <p class = "meta_table_label">Meta Stats</p>
    <table class = "meta_stats">
        <tr>
            <th></th>
            <th>String</th>
            <th></th>
            <th>Word</th>
            <th></th>
            <th>Letter</th>
            <th></th>
        </tr>
        <tr>
            <td class = "attribute">Fastest</td>
            <td><?=$data["fastest_string"]["string"]?></td>
            <td><?=$data["fastest_string"]["haste"]?></td>
            <td><?=$data["fastest_word"]["word"]?></td>
            <td><?=$data["fastest_word"]["haste"]?></td>
            <td>'<?=$data["fastest_letter"]["letter"]?> '</td>
            <td><?=$data["fastest_letter"]["haste"];?></td>
        </tr>
        <tr>
            <td class = "attribute">Slowest</td>
            <td><?=$data["slowest_string"]["string"]?></td>
            <td><?=$data["slowest_string"]["tarry"]?></td>
            <td><?=$data["slowest_word"]["word"]?></td>
            <td><?=$data["slowest_word"]["tarry"]?></td>
            <td>'<?=$data["slowest_letter"]["letter"]?> '</td>
            <td><?=$data["slowest_letter"]["tarry"]?></td>
        </tr>
        <tr>
            <td class = "attribute">Most Common</td>
            <td><?=$data["common_string"]["string"];?></td>
            <td><?=$data["common_string"]["frequency"]?></td>
            <td><?=$data["common_word"]["word"];?></td>
            <td><?=$data["common_word"]["frequency"]?></td>
            <td><?=$data["common_letter"]["letter"];?></td>
            <td><?=$data["common_letter"]["frequency"]?></td>
        </tr>
        <tr>
            <td class = "attribute">Least Common</td>
            <td><?=$data["rare_string"]["string"];?></td>
            <td><?=$data["rare_string"]["frequency"]?></td>
            <td><?=$data["rare_word"]["word"];?></td>
            <td><?=$data["rare_word"]["frequency"]?></td>
            <td><?=$data["rare_letter"]["letter"];?></td>
            <td><?=$data["rare_letter"]["frequency"]?></td>
        </tr>
        <tr>
            <td class = "attribute">Total #</td>
            <td><?=$data["total_strings"];?></td>
            <td><?= number_format($data["total_strings"]/$total_signs, 4)*100;?>%</td>
            <td><?=$data["total_words"];?></td>
            <td><?= number_format($data["total_words"]/$total_signs, 4)*100;?>%</td>
            <td><?=$data["total_letters"];?></td>
            <td><?= number_format($data["total_letters"]/$total_signs, 4)*100;?>%</td>
        </tr>
        <tr>
            <td class = "attribute">total # Signed</td>
            <td><?=$data["signed_strings"];?></td>
            <td><?= number_format($data["signed_strings"]/$total_signings, 4)*100;?>%</td>
            <td><?=$data["signed_words"];?></td>
            <td><?= number_format($data["signed_words"]/$total_signings, 4)*100;?>%</td>
            <td><?=$data["signed_letters"];?></td>
            <td><?= number_format($data["signed_letters"]/$total_signings, 4)*100;?>%</td>
        </tr>
        <tr>
            <td class = "attribute">total time Signing</td>
            <td><?=$data["total_time_string"];?></td>
            <td><?= number_format($data["total_time_string"]/$total_sign_time, 4)*100;?>%</td>
            <td><?=$data["total_time_word"];?></td>
            <td><?= number_format($data["total_time_word"]/$total_sign_time, 4)*100;?>%</td>
            <td><?=$data["total_time_letter"];?></td>
            <td><?= number_format($data["total_time_word"]/$total_sign_time, 4)*100;?>%</td>
        </tr>
</table>
</div>
<div class="letter_stats_table">
    
        <p class="stat_table_label">LETTERS</p>
        <table>
            <tr>
                <th>ID</th>
                <th>LETTER</th>
                <th>Times Signed</th>
                <th>Haste</th>
                <th>Tarry</th>
                <th>Average</th>
            </tr>

            <?php foreach ($letter_data as $attribute) { ?>
                <tr>

                    <td class='attribute'>
                        <?= $attribute["ID"] ?>
                    </td>
                    <td class='letter'>
                        <?= $attribute["letter"] ?>
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
                </tr>
            <?php } ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="hidden" name="action" value="reset_letters">
                <button type="submit">RESET ALL LETTER VALUES</button>
            </form>
        </table>
</div>
<div class="string_stats_table">
    <p class="stat_table_label">S-T-R-I-N-G-S</p>
    <table>
        <tr>
            <th>ID</th>
            <th>String</th>
            <th>Length</th>
            <th>Times Signed</th>
            <th>Haste</th>
            <th>Tarry</th>
            <th>Average</th>
        </tr>
        <?php foreach ($string_data as $attribute) { ?>

            <tr>
                <td class='attribute'>
                    <?= $attribute["ID"] ?>
                </td>
                <td class='letter'>
                    <?= $attribute["string"] ?>
                </td>
                <td class='letter'>
                    <?= $attribute["length"] ?>
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
            </tr>
        <?php } ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="action" value="reset_strings">
            <button type="submit">RESET STRING VALUES</button>
        </form>
    </table>
</div>

<div class="word_stats_table">
    <p class="stat_table_label">WORDS</p>
    <table>
        <tr>
            <th>ID</th>
            <th>Word</th>
            <th>Times Signed</th>
            <th>Haste</th>
            <th>Tarry</th>
            <th>Average</th>
        </tr>
        <?php foreach ($word_data as $attribute) { ?>
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
            </tr>
        <?php } ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="action" value="reset_words">
            <button type="submit">RESET WORD VALUES</button>
        </form>
    </table>
</div>


<?php include 'footer.php'; ?>