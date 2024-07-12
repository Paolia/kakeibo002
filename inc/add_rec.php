<?php
session_start();
include ('inc/functions.php');
check_session_id();
?>
<main>
    <div id="conf">
        <h2>以下の内容で登録します。よろしいですか？</h2>
    </div>

    <div id="confirm">
        <table>
            <tr>
                <td>内容：<?php echo $_POST["item"]; ?></td>
                <td>金額：<?php echo $_POST["amount"]; ?></td>
            </tr>
            <tr>
                <td>分類：<?php echo $_POST["category"]; ?></td>
                <td>受益者：<?php echo $_POST["beneficiary"]; ?></td>
            </tr>
            <tr>
                <td>支払日：<?php echo $_POST["paid_on"]; ?></td>
                <td>誰が払ったか：<?php echo $_POST["paid_by"]; ?></td>
            </tr>
            <tr>
                <td>備考：<?php echo $_POST["note"]; ?></td>
                <td>
                    <?php
                    echo
                        '<form id="form2" action="register.php" method="POST">
        <input type="hidden" name="year" value="' . $_POST["year"] . '">
        <input type="hidden" name="month" value="' . $_POST["month"] . '">
        <input type="hidden" name="item" value="' . $_POST["item"] . '">
        <input type="hidden" name="amount" value="' . $_POST["amount"] . '">
        <input type="hidden" name="category" value="' . $_POST["category"] . '">
        <input type="hidden" name="beneficiary" value="' . $_POST["beneficiary"] . '">
        <input type="hidden" name="paid_on" value="' . $_POST["paid_on"] . '">
        <input type="hidden" name="paid_by" value="' . $_POST["paid_by"] . '">
        <input type="hidden" name="note" value="' . $_POST["note"] . '">
        <button type="submit" id="registar">登録</button>
    </form>'
                        ?>
                    <?php

                    echo
                        '<form id="form_back" action="view_land.php" method="POST">
        <input type="hidden" name="year" value="' . $_POST["year"] . '">
        <input type="hidden" name="month" value="' . $_POST["month"] . '">
        <button type="submit" id="registar">戻る</button>
    </form>'
                        ?>
                </td>
                </td>
        </table>
    </div>
</main>