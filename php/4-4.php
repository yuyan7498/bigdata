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

    $class = '["校園職業安全"]';

    $sql = "SELECT COUNT(dp002_extensions_alignment) FROM edu_bigdata_imp1 WHERE dp002_extensions_alignment = :CLASS GROUP BY dp002_extensions_alignment;";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":CLASS", $class);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    print_r($stmt->fetchAll());

} catch (PDOException $e) {
    echo "連接錯誤： " . $e->getMessage();
} catch (Exception $e) {
    echo "處理錯誤：" . $e->getMessage();
}
?>