<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO-Liste</title>

    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
      <?php
        require_once(__DIR__ . '/classes/templates.php');

        $template = new Template(__DIR__ . '/templates', []);
        echo $template->render('nav.php');
      ?>
        </div>
      </nav>
    <div class="row">
        <div class="col-2">Column 1 (2 Spalten)</div>
        <div class="col-8">Column 2 (8 Spalten)
            <h1>Meine TODO-Liste</h1>
            <form id="todo-form">
                <div class="form-group">
                    <label for="todo-input" class="form-label">Neue Aufgabe</label>
                    <input type="text" id="todo-input" class="form-control"
                            placeholder="Neue Aufgabe hinzufügen">
                    <button type="submit" class="btn btn-primary">Hinzufügen</button>
                </div>
            </form>
            <ul id="todo-list">
                <!-- Unordered list to dynamically add todo list items. -->
            </ul>
        </div>
        <div class="col-2">Column 3 (2 Spalten)</div>
    </div>
    
    </div>
    <script src="todo.js"></script>
</body>
</html>