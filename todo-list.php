<!DOCTYPE html>
<html lang="de">

<?php
    require_once(__DIR__ . '/templatesetup.php');
    echo $template->render('head.php', ['title' => 'To-Do Liste']); 
    echo $template->render('todo-list-body.php');
    ?>

</html>