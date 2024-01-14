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

    $idValue = 39;
    $sql = "SELECT COUNT(DISTINCT dp001_review_sn) AS result FROM edu_bigdata_imp1 WHERE PseudoID = :ID";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":ID", $idValue);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
        echo "Result: " . $result['result'];
    } else {
        echo "No result found.";
    }

} catch (PDOException $e) {
    echo "連接錯誤： " . $e->getMessage();
} catch (Exception $e) {
    echo "處理錯誤：" . $e->getMessage();
}
?>