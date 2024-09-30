<?php
   header('Content-Type: application/json');

   //log-funktion
    $todo_items = [
        ["id" => "someUniqueID", "title" => "Erste Aufgabe"]
    ];
    $todo_file = 'todo.json';

   
    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
            //get TO-DO (READ)
            $todos = [
                ["id"=> "uniqID", "title" => "First TODO"]
            ];
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                echo json_encode($todos);
            }
            write_log("READ", null);
            break;
        case "POST":
            //Add TODO(CREATE)
            $data = json_decode(file_get_contents('php//input'), true);
            $new_todo = ["id" => uniqid(), "title" => $data['title']];
            $todo_items[] = $new_todo;
            file_put_contents($todo_file, json_encode($todo_items));
            echo json_encode($new_todo);
            write_log("CREATE", null);
            break;
        case "PUT":
            //Chanege TODO (UPDATE)
            write_log("UPDATE", null);
            break;
        case "DELETE":
            //Remove TODO (DELETE)
            write_log("DELETE", null);
            break;
    }
    function write_log($action, $data){
        $log = '';
        if(file_exists('log.txt')){
           $log = fopen('log.txt', 'a');
          }
        else{
           //echo json_encode("Log-Datei nicht vorhanden");
           $log = fopen('log.txt', 'w');
          }
       
        $timestamp = date('Y-m-d H:i:s');
        fwrite($log, "$timestamp - $action: " . json_encode($data) . "\n");
        fclose($log);
     }
?>