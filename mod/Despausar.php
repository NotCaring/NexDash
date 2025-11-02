<?php
//exit;
define('BADTEAM', 'FDS');
include_once $_SERVER['DOCUMENT_ROOT'].'/painel/includes/conexao.php';

// sessão
//VerificarSessao();

$conexao = Conexao::getInstance();

// VERIFICAR DADOS DO USUÁRIO
$sql = 'SELECT * FROM tokens WHERE ID = ? AND status = ? LIMIT 1';
$stm = $conexao->prepare($sql);
$stm->bindValue(1, $_SESSION['ID']);
$stm->bindValue(2, '1');
$stm->execute();
$retorno = $stm->fetch(PDO::FETCH_OBJ);

$servername = "localhost";
$username = "qpnbvfcj_thiago";
$password = "tW=g.eYMIOiQ";
$dbname = "qpnbvfcj_thiago";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tokens WHERE status = 1";
$result = $conn->query($sql);

$Contar = 0;
$TemDias = 0;

    while($row = $result->fetch_assoc()){
        
        $dt_atual  = strtotime(date("Y-m-d H:i:s"));
        $dt_pausado  = strtotime($row['pausedate']);
        $diferenca = $dt_atual - $dt_pausado;
        $dt_expiracao  = strtotime($row['EndDate']);
        $diferenca2 = $dt_expiracao + $diferenca;
        $data = date('Y-m-d H:i:s', $diferenca2);
        
        if($row['tipo'] == 3){
        
            //Resetar usuarios injetor
            $sql2 = "UPDATE tokens SET UID = '' WHERE ID = ".$row['ID']." AND pause = '1' AND tokens = 'injetor'";
            $result2 = $conn->query($sql2);
            
            //Add dias aos usuarios injetor
            $sql2 = "UPDATE tokens SET expiracao = '$data' WHERE ID = ".$row['ID']." AND pause = '1' AND tokens = 'injetor'";
            $result2 = $conn->query($sql2);
            
            //Despausar usuarios injetor
            $sql2 = "UPDATE tokens SET pause = '0' WHERE ID = ".$row['ID']." AND pause = '1' AND tokens = 'injetor'";
            $result2 = $conn->query($sql2);
            
            if ($result2) {
                echo "CLIENTE: ".$row['usuario']. ": DESPAUSADOS".$dias.".<br>";
            }
            
        }
    
    }

?>