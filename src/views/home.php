<?php
    use src\models\Note; 

    $notes = Note::getAll();

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
    <h1>Home</h1>
    <div class="notes-container" >
        <?php foreach($notes as $note): ?>
        <a href="?view=view&id=<?php echo $note->getUuid()?>">
            <div class="note-preview">
                <div><?php echo $note->getTitle(); ?></div>
            </div>
        </a>
        <?php endforeach ?>
    </div>
    
</body>
</html>