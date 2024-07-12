<?php
session_start();
// 接続確認
//var_dump($_POST);
//exit();

// テーブル名作成 
if ($_POST) {
    $year = $_POST['year'];
    $month = $_POST['month'];
}
if ($_GET) {
    $year = $_GET['year'];
    $month = $_GET['month'];
}
$expense_table = 'expenses_' . $year;

// モジュール読み込み 
include ('functions.php');
check_session_id();
$pdo = connect_to_db();
//$sql = 'SELECT * FROM kuratomi_kakeibo ORDER BY deadline ASC';
$sql = 'SELECT 1 FROM ' . $expense_table . ' Limit 1';
$stmt = $pdo->prepare($sql);

try {
    $status = $stmt->execute();
    $sql = 'SELECT * FROM ' . $expense_table . ' ORDER BY id ASC';
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo '<script type="text/javascript">
    const new_tbl = window.confirm("テーブルが存在しません。作成しますか？")
    if (new_tbl==false) {
      window.location.href="index.php";
      throw new Error("終了")
    } else {pass;}
    </script>';
    $sql = 'CREATE TABLE ' . $expense_table . ' LIKE expenses_tmpl';
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$output = '
    <tr><th colspan="11">' . $year . '年' . $month . '月度　<a href="kakeibo_read.php">年月選択</a></th></tr>
    <tr>
        <th>何月分</td>
        <th>内容</td>
        <th>金額</td>
        <th>分類</td>
        <th>受益者</td>
        <th>支払日</td>
        <th>誰が払ったか</td>
        <th>備考</td>
        <th>最終更新日</td>
    </tr>';

foreach ($result as $record) {
    $po = strtotime($record["paid_on"]);
    $po1 = date('m/d', $po); // 0埋めあり、月/日:01/23の形式
    $po2 = ltrim($po1, '0'); // 0埋め除去
    $po3 = date('m', $po); // 0埋めあり月のみ
    $luo = strtotime($record["last_updated_on"]);
    $luo2 = date('m/d', $luo);

    if ($po3 == $month) {
        $output .= "
    <tr>
        <td>{$po3}</td>
        <td>{$record["item"]}</td>
        <td>{$record["amount"]}円</td>
        <td>{$record["category"]}</td>
        <td>{$record["beneficiary"]}</td>
        <td>{$po2}</td>
        <td>{$record["paid_by"]}</td>
        <td>{$record["note"]}</td>
        <td>{$luo2}</td>
        <td><a href='edit_record.php?id={$record["id"]}&year={$year}&month={$month}'>編集 </a></td>
        <td><a href='delete_record.php?id={$record["id"]}&year={$year}&month={$month}'> 削除</a></td>
    </tr>
    ";
    }
}
?>
<main>
    <table class="kakeibo_table">
        <?= $output ?>
    </table>

    <form action="add_record.php" method="POST" id="add_records">
        <fieldset>
            <legend>項目追加</legend>
            <table>
                <tr>
                    <td>
                        内容: <input type="text" name="item">
                        <input type="hidden" name="year" value="<?= $year; ?>">
                        <input type="hidden" name="month" value="<?= $month; ?>">
                    </td>
                    <td>
                        金額: <input type="text" name="amount">
                    </td>
                </tr>
                <tr>
                    <td>
                        分類
                        <select name="category" id="category">
                            <option value="食費">食費</option>
                            <option value="衣料費">衣料費</option>
                            <option value="光熱費">光熱費</option>
                            <option value="教育費">教育費</option>
                            <option value="医療・美容費">医療・美容費</option>
                            <option value="遊興費・雑費">遊興費・雑費</option>
                            <option value="通信費">通信費</option>
                            <option value="交通費">交通費</option>
                            <option value="住宅費">住宅費</option>
                            <option value="税金">税金</option>
                        </select>
                    </td>
                    <td>
                        受益者
                        <select name="beneficiary" id="beneficiary">
                            <option value="みんな">みんな</option>
                            <option value="たみお">たみお</option>
                            <option value="オリガ">オリガ</option>
                            <option value="まりや">まりや</option>
                            <option value="あんな">あんな</option>
                            <option value="特になし">特になし</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        支払日: <input type="date" name="paid_on">
                    </td>
                    <td>
                        誰が払ったか
                        <select name="paid_by" id="paid_by">
                            <option value="たみお">たみお</option>
                            <option value="オリガ">オリガ</option>
                            <option value="まりや">まりや</option>
                            <option value="あんな">あんな</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        備考: <textarea id="note" name="note" rows="3" cols="25"></textarea>
                    </td>
                    <td>
                        <button>submit</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</main>