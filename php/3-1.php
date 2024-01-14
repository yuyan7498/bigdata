<?php
require_once 'DBConnectionHandler.php';

$serverName = "localhost";
$userName   = "root";
$password   = "";
$db         = "practice";

try {
    DBConnectionHandler::setConnection($serverName, $userName, $password, $db);
    $connection = DBConnectionHandler::getConnection();
    echo "連接成功！" . '<br>';
} catch (PDOException $e) {
    echo "連接失敗：" . $e->getMessage();
}

$idValue = 71;
$operate = "paused";

$sql = "SELECT COUNT(dp001_record_plus_view_action) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID AND dp001_record_plus_view_action=:OPERATE";
$stmt = $connection->prepare($sql);

// 修改 PDOStatement 的綁定方式
$stmt->bindParam(":ID", $idValue);
$stmt->bindParam(":OPERATE", $operate);

$stmt->execute();
print_r($stmt->fetchAll());
?>
