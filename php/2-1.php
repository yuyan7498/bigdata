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

    $idValue = 281;
    $sql = "SELECT DISTINCT dp001_video_item_sn ,dp001_indicator FROM edu_bigdata_imp1 WHERE PseudoID=:ID";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":ID", $idValue);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    print_r($stmt->fetchAll());

} catch (PDOException $e) {
    echo "連接錯誤： " . $e->getMessage();
} catch (Exception $e) {
    echo "處理錯誤：" . $e->getMessage();
}
?>