<body>
    <div class="container">
      <?php
        require_once('/srv/www/todo-list-felde/classes/templates.php');

        $template = new Template(__DIR__, []);
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