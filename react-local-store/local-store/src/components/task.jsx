
import {  Link } from 'react-router-dom';
import React, { useState, useEffect } from "react";


const get_todos=()=>{
	const data=localStorage.getItem('todos')
	if(data){
		return JSON.parse(data)
	}
	else{
		return []
	}
}




function List() {



   
    const [todos, set_todos]=useState(get_todos());
    const [date_value, set_date_value]=useState('')
    const [hide, set_hide]=useState(true)
    const [date_piker, set_date_piker_value]=useState('')
    const [todos_with_date ,set_todos_with_date]=useState('')
   
    
 

    
    useEffect(()=>{
        localStorage.setItem('todos', JSON.stringify(todos));
    
    },[todos])
    
    const handle_delete=(id)=>{
        const filtered=todos.filter((todo)=>{
            return todo.id !== id;
        })
        set_todos(filtered)
    }

    
    const handle_checkbox=(id)=>{
    let todo_array=[]
    todos.forEach((task)=>{
        if(task.id===id){
            if(task.category===false){
                task.category=true
            }
            else if(task.category===true){
                task.category=false
    
            }
        }
        todo_array.push(task);
        set_todos(todo_array)
    })
    
    }
    
    const handle_date_piker=(date)=>{
        set_date_piker_value(date)
        let todo_array=[]
        todos.forEach((task)=>{
            if(task.date===date){
                
                todo_array.push(task);
            
                }
                
                set_todos_with_date(todo_array)
        })
    }



    return (
      <>
        <nav>
<Link to="/newTask">new task</Link>
</nav>

<div class="show" >
<label >SHOW DONE LIST</label>
<input type="checkbox"  onChange={(event)=>{set_hide(!hide)}} check={hide}/>
</div>
{!hide && (<>
{todos.length>0 && (<>
{todos.map((task,index)=>(

<div key={task.id} class="item">
	
<input type="checkbox"   onChange={()=>{handle_checkbox(task.id)}} checked={task.category}/>
<span> {task.title}</span>
<span> {task.date}</span>
<span onClick={()=>handle_delete(task.id)}>
<button class="btn-delete"> delete</button>
</span>

</div>

))}
</>
)}

</>)}
 

<input type="date"  class="date-piker" onChange={(event)=>handle_date_piker(event.target.value) } value={date_piker}  />

{todos_with_date.length>0 && (<>
{todos_with_date .map((task,index)=>(

<div key={task.id} class="item">
	
<input type="checkbox"   onChange={()=>{handle_checkbox(task.id)}} checked={task.category}/>
<span> {task.title}</span>
<span> {task.date}</span>
<span onClick={()=>handle_delete(task.id)}>
<button > delete</button>
</span>

</div>

))}
</>
)} 




      </>
    );
  }
export default List;