<?php

    use src\models\Note;
    if(count($_POST) >0 ){
        $title = $_POST['__title__'];
        $content = $_POST['__content__'];
        $id = $_POST['id'];


        $noteDetail = Note::get($_GET['id']);
        $noteDetail->setTitle($title);
        $noteDetail->setContent($content);
        $noteDetail->update();
    }
    else if(isset($_GET['id']))
    {
        $noteDetail = Note::get($_GET['id']);
        
    }else
    {
        header('Location ../app.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/views/resources/main.css">
    <title>Document</title>
</head>
<body>
    <?php require 'navbar.php'; ?>
    <h1>View</h1>
    <form action="?view=view&id=<?php echo $noteDetail->getUuid()?>" method="POST" >
        <input type="hidden" name="id" value="<?php echo $noteDetail->getUuid() ?>">
        <input type="text" name="__title__" id="view_title" value="<?php echo trim($noteDetail->getTitle()) ?>">
        <textarea name="__content__" id="view_content" cols="80" rows="5">
        <?php echo trim($noteDetail->getContent()) ?>
        </textarea>
        <button type="submit" >Update Note</button>
    </form>
</body>
    <script>
        window.addEventListener('load',function(){
            // Obtener el contenido del textarea
            var textarea = document.getElementById('view_content');
            var contenido = textarea.value;

            // Eliminar los espacios en blanco y saltos de línea
            contenido = contenido.trim();

            // Actualizar el contenido del textarea
            textarea.value = contenido;
        });

    </script>
</html>