<?php 
require_once 'DBConnectionHandler.php';

$serverName = "localhost";  
$userName   = "root";    
$password   = "";       
$db         = "practice";    

try {
    DBConnectionHandler::setConnection($serverName, $userName, $password, $db);
    $connection = DBConnectionHandler::getConnection();
    echo "連接成功！".'<br>';
}catch(PDOException $e) {
    echo "連接失敗：" . $e->getMessage();
}

$idValue = 71;

$sql = "SELECT DISTINCT DATE(dp001_review_start_time) FROM edu_bigdata_imp1 WHERE PseudoID=:ID;";
$stmt = $connection->prepare($sql);
$stmt->bindParam(":ID", $idValue);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
print_r($stmt->fetchAll());

?>