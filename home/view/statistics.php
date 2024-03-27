<?php include 'header.php'; ?>
<div class="letter_stats_table">
    <p><?=get_filter()." --- ".get_volume();?></p>
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