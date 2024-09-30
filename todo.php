<?php
   header('Content-Type: application/json');

   //log-funktion


   
    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
            //get TO-DO (READ)
            $todos = [
                ["id"=> "uniqID", "title" => "First TODO"]
            ];
            echo json_encode($todos);
            write_log("READ", null);
            break;
        case "POST":
            //Add TODO(CREATE)
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