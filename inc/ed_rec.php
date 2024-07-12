<?php
// 受け取ったデータを確認
// var_dump($_GET);
// exit();
session_start();
// id受け取り
include ('functions.php');
check_session_id();
$id = $_GET['id'];

// テーブル名作成 
$expense_table = 'expenses_' . $_GET['year'];
$year = $_GET['year'];
$month = $_GET['month'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM ' . $expense_table . ' WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<form action="kakeibo_update.php" method="POST" id="kakeibo_update">
    <fieldset>
        <legend>倉冨さんちの家計簿☆編集画面</legend>
        <a href="view_land.php?year=<?= $year ?>&month=<?= $month ?>">一覧画面</a>
        <table class="kakeibo_table">
            <tr>
                <th>項目</th>
                <th>金額</th>
                <th>分類</th>
                <th>受益者</th>
            </tr>
            <tr>
                <td><input type="text" name="item" value="<?= $record['item'] ?>">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="year" value="<?= $year ?>">
                    <input type="hidden" name="month" value="<?= $month ?>">
                </td>
                <td>
                    <input type="text" name="amount" value="<?= $record['amount'] ?>">
                </td>
                <td>
                    <input type="text" name="category" value="<?= $record['category'] ?>">
                </td>
                <td>
                    <input type="text" name="beneficiary" value="<?= $record['beneficiary'] ?>">
                </td>
            </tr>
            <tr>
                <th>支払日</th>
                <th>誰が払ったか</th>
                <th>備考</th>
                <th>更新</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="paid_on" value="<?= $record['paid_on'] ?>">
                </td>
                <td>
                    <input type="text" name="paid_by" value="<?= $record['paid_by'] ?>">
                </td>
                <td>
                    <input type="text" name="note" value="<?= $record['note'] ?>">
                </td>
                <td>
                    <button>submit</button>
                </td>
            </tr>
        </table>
    </fieldset>
</form>

</body>

</html>