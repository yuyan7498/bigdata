<?php 
require_once 'DBConnectionHandler.php';

$serverName = "localhost";   // host,運行於XAMPP時使用localhost即可。
$userName   = "root";        // 資料庫之使用者名稱，XAMPP預設root
$password   = "";            // 資料庫使用者密碼，XAMPP預設空
$db         = "SQL_practice";        // 欲連接的資料庫名稱

try {
    DBConnectionHandler::setConnection($serverName, $userName, $password, $db);
    $connection = DBConnectionHandler::getConnection();
    echo "Connection successful!".'<br>';
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$NA = "NA";

$sql = "SELECT dp002_verb_display_zh_TW FROM edu_bigdata_imp1 WHERE dp002_verb_display_zh_TW != :NA GROUP BY dp002_verb_display_zh_TW ORDER BY COUNT(dp002_verb_display_zh_TW) DESC LIMIT 3";
$stmt = $connection->prepare($sql);
$stmt->bindParam(":NA", $NA);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
print_r($stmt->fetchAll());

?>