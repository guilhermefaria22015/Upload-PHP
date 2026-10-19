<?php
    if($_POST['bt_enviar']){
        $tipos permitidos = ['csv', 'CSV'];
        $extensao = pathinf($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

        if(in_array($extensao, $tipos_permitidos)){
            $pasta = "arquivos/";
            $temporario = $_FILES['arquivo']['tmp_name'];
            $novo_nome = uniqid().".$extensao";

            if(move_uploaded_file($temporario, $pasta.$novo_nome)){
                echo "<p>Upload realizado!</p>";
            } else {
                echo "<p>Falha no Upload!</p>";
            }
        } else {
                echo "<p>Tipo de arquivo não permitido!</p>";
        }

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de arquivos</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="arquivo" />
        <button type="submit" name="bt_enviar">Enviar</button>
    </form>
</body>
</html>