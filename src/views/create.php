<?php 

use src\models\Note;

if(count($_POST) > 0 ){
    $title = $_POST["__title__"] ?? 'vacio';
    $content = $_POST['__content__'] ?? 'vacio';
    $note = new Note($title,$content); 
    $note->save();
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/views/resources/main.css">
    <title>NoteApp | Create </title>
</head>
<body>
    <?php require 'navbar.php'; ?>
    <h1>Create a New Note</h1>
    <form action="?view=create" method="POST" >
        <input type="text" name="__title__" id="create_title" placeholder="Your title Here...">
        <textarea name="__content__" id="create_content" placeholder="Your Content Here..." cols="30" rows="10"></textarea>
        <button type="submit" >Send Note</button>
    </form>
</body>
</html>