<?php
   header('Content-Type: application/json');

   //log-funktion

   /* function write_log($action, $data){
      $log = '';
      if(file_exists('log.txt')){
         $log = fopen('log.txt', 'a');
      }
      else{
         echo "Log-Datei nicht vorhanden";
         $log = fopen('log.txt', 'w');
      }
     
      $timestamp = date('Y-m-d H:i:s');
      fwrite($log, "$timestamp - $action: " . json_encode($data) . "\n");
      fclose($log);
   } 
   $file = 'todo.json';
   if(file_exists($file)){
    $json_data = file_get_contents($file);
    $todos = json_decode($json_data, true);
    write_log("read todo json", $todos);
   }else{
    $todos = [];
   }
   

   if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $input = json_decode(file_get_contents('php://input'), true);
      $todos[] = $input['todo'];
      file_put_contents($file, json_encode($todos));
      echo json_encode(['status' => 'success']);
      exit;
   }
   echo json_encode($todos);
    */

    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
            //get TO-DO (READ)
            break;
        case "POST":
            //Add TODO(CREATE)
            break;
        case "PUT":
            //Chanege TODO (UPDATE)
            break;
        case "DELETE":
            //Remove TODO (DELETE)
            break;

    }
?>