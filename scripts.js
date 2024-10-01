

const apiURL = "todo.php";
document.addEventListener("DOMContentLoaded", function(){
    //define the URL  to our CRUD
    
    fetch(apiURL)
    .then(response => response.json())
    .then(data => {
        const todoList = document.getElementById('todoList');
        data.forEach(item => {
            const li = document.createElement('li');
            li.textContent = item.title;
            const deleteButton = document.createElement('button');
deleteButton.textContent = "Löschen";
deleteButton.addEventListener('click', function(evt){
    console.log(evt);
    console.log(`Delete ${item.title} from List`);
    fetch(apiURL, {
        method: 'DELETE',
        headers: {
            'Content-Type' : 'application/json'
        },
        body : JSON.stringify({id : item.id})
    })
    .then(response => response.json())
    .then(() => {
        li.remove();
    });
});
li.appendChild(deleteButton);
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