<?php
$filename = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_mensagem = $_POST['nova_mensagem'];

    if (!empty($nova_mensagem)) {
        $data = file_get_contents($filename);
        $json_data = json_decode($data, true);

       $nova_mensagem;
        file_put_contents($filename, $nova_mensagem);
        echo "Mensagem adicionada com sucesso ao arquivo JSON!";
    } else {
        echo "A mensagem não pode ser vazia.";
    }
}
?>
