<?php
require_once 'DBConnectionHandler.php';

$serverName = "localhost";
$userName = "root";
$password = "";
$db = "practice";

try {
    DBConnectionHandler::setConnection($serverName, $userName, $password, $db);
    $connection = DBConnectionHandler::getConnection();

    echo "連接成功！" . '<br>';

    $sql = "SELECT dp001_review_sn, COUNT(dp001_review_sn) FROM edu_bigdata_imp1 GROUP BY dp001_review_sn ORDER BY COUNT(dp001_review_sn) DESC LIMIT 1";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    print_r($stmt->fetchAll());

} catch (PDOException $e) {
    echo "連接錯誤： " . $e->getMessage();
} catch (Exception $e) {
    echo "處理錯誤：" . $e->getMessage();
}
?>