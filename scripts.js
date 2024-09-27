


document.addEventListener("DOMContentLoaded", function(){

//define the URL  to our CRUD
    

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