

const apiURL = "todo.php";
document.addEventListener("DOMContentLoaded", function(){
    //define the URL  to our CRUD
    
    fetch(apiURL)
    .then(response => response.json())
    .then(data => {
        const todoList = document.getElementById('todoList');
        data .forEach(item => {
            const li = document.createElement('li');
            li.textContent = item.title;
            todoList.appendChild(li);
        });
    });
});
document.getElementById('todoForm').addEventListener('submit', function(e) { 
    e.preventDefault();
    const todoInput = document.getElementById('todoInput').value;
    fetch(apiURL, {
        method: 'POST' , 
        headers: {
            'Content-Type' : 'application/json'
        },
        body: JSON.stringify({title : todoInput})
    })
    .then(response => response.json())
    .then(data => {
        const todoList = document.getElementById('todoList');
        const li = document.createElement('li');
        li.textContent = data.title;
        todoList.appendChild(li);
        document.getElementById('todoInput').value = "";
    })
    
})
/* function loadTodos(){
    fetch('http://sf.mshome.net/todo-list-felde/todo.php')
    .then(response => response.json())
    .then(todos => {
        const todoList = 
        document.getElementById('todoList');
        todoList.innerHTML = '' ;
        todos.forEach(todo => {
            const li = 
                document.createElement('li');
                li.textContent = todo;
                todoList.appendChild(li);
        });
    })
    .catch(error => console.error('Fehler:', error));
}

    document.getElementById('todoForm').addEventListener('submit' , (evt) =>  {
        evt.preventDefault();
        const todoInput = document.getElementById('todoInput').value;
        fetch('http://sf.mshome.net/todo-list-felde/todo.php', {
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json',
            }, 
            body: JSON.stringify({todo: todoInput}),
        })
        .then(response => response.json())
        .then((data) => {console.log(data);
            loadTodos();
            document.getElementById('todoInput').value = '';
        })
        .catch(error => console.error('Fehler:', error));
    });

window.onload = (event) => loadTodos();
 */