document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('todo-form');
    const input = document.getElementById('todo-input');
    const todoList = document.getElementById('todo-list');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const taskText = input.value.trim();
        
        if (taskText) {
            addTask(taskText);
            input.value = '';
        }
    });

    function addTask(text) {
        const li = document.createElement('li');
        li.className = 'todo-item';
        
        const span = document.createElement('span');
        span.className = 'todo-text';
        span.textContent = text;
        
        const completeBtn = document.createElement('button');
        completeBtn.className = 'complete-btn';
        completeBtn.textContent = 'Terminer';
        completeBtn.addEventListener('click', () => {
            li.classList.toggle('completed');
        });
        
        const deleteBtn = document.createElement('button');
        deleteBtn.className = 'delete-btn';
        deleteBtn.textContent = 'Supprimer';
        deleteBtn.addEventListener('click', () => {
            li.remove();
        });
        
        const actions = document.createElement('div');
        actions.className = 'todo-actions';
        actions.appendChild(completeBtn);
        actions.appendChild(deleteBtn);
        
        li.appendChild(span);
        li.appendChild(actions);
        
        todoList.appendChild(li);
    }
});