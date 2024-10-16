<?php
   header('Content-Type: application/json');

    
    //$todo_file = 'todo.json';
    //$todo_items = json_decode(file_get_contents($todo_file), true);
    $host = 'localhost';
    $db = 'todo_list';
    $user = 'sf';
    $pass = '08111981';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

   
    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
            //get TO-DO (READ)
                $return = json_encode($todo_items);
                echo $return;
                write_log("READ", $return);
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
            $data = json_decode(file_get_contents('php://input'), true);
        // Filter Todo to delete from the list.
        $todo_items = array_filter($todo_items, function($todo) use ($data) {
            return $todo['id'] !== $data['id'];
            
        });
            	// Write the Todos back to JSON file.
            file_put_contents('todo.json', json_encode($todo_items));
            // Tell the client the success of the operation.
            echo json_encode(['status' => 'success']);
            write_log("DELETE", $data);
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