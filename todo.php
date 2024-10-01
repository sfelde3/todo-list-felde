<?php
   header('Content-Type: application/json');

    //log-funktion
    $todo_file = 'todo.json';
    $todo_items = json_decode(file_get_contents($todo_file), true);
    

   
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
                // Get data from the input stream.
                $data = json_decode(file_get_contents('php://input'), true);
                // Create new todo item.
                $new_todo = ["id" => uniqid(), "title" => $data['title']];
                // Add new item to our todo item list.
                $todo_items[] = $new_todo;
                // Write todo items to JSON file.
                file_put_contents($todo_file, json_encode($todo_items));
                // Return the new item.
                echo json_encode($new_todo);
                write_log("CREATE", $new_todo);
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