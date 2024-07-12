<?php
include ('functions.php');
$pdo = connect_to_db('kuratomi_kakeibo');

?>

<h2 id="toptitle">年月を入力</h2>
<main>
    <form method="post" action="view_land.php">
        <div class="line">
            <div class="year">西暦年：</div>
            <div>
                <select name="year" id="year">
                    <option value="2023">２０２３年</option>
                    <option value="2024">２０２４年</option>
                    <option value="2025">２０２５年</option>
                    <option value="2026">２０２６年</option>
                    <option value="2027">２０２７年</option>
                    <option value="2028">２０２８年</option>
                    <option value="2029">２０２９年</option>
                    <option value="2030">２０３０年</option>
                </select>
            </div>
            <div class="month">月：</div>
            <div>
                <select name="month" id="month">
                    <option value="01">１月</option>
                    <option value="02">２月</option>
                    <option value="03">３月</option>
                    <option value="04">４月</option>
                    <option value="05">５月</option>
                    <option value="06">６月</option>
                    <option value="07">７月</option>
                    <option value="08">８月</option>
                    <option value="09">９月</option>
                    <option value="10">１０月</option>
                    <option value="11">１１月</option>
                    <option value="12">１２月</option>
                </select>
            </div>
        </div>
        <div class="line">
            <div class="title">
                <legend>出費を見るまたは記録する</legend>
                <button type="submit" id="submit">Go!</button>
            </div>
        </div>
    </form>
</main>