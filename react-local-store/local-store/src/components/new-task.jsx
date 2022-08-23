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

export const Adds=()=>{

const [todo_value , set_todo_value]=useState('')
const [todos, set_todos]=useState(get_todos());


const handle_submit=(event)=>{
	event.preventDefault();
	const date= new Date();
	const time= date.getTime();

	let todo_object={
		id:time,
		todo_value:todo_value,
		category:false

	}

	set_todos([...todos,todo_object])
	set_todo_value('');
}

useEffect(()=>{
	localStorage.setItem('todos', JSON.stringify(todos));

},[todos])

const handle_delete=(id)=>{
	const filtered=todos.filter((todo)=>{
		return todo.id !== id;
	})
	set_todos(filtered)
}
return(
<>
<form autoComplete="off" onSubmit={handle_submit}>
<input type="text" placeholder="write Task" required
onChange={(event)=>set_todo_value(event.target.value)} value={todo_value}
/>
<button> ADD</button>
</form>

{todos.length>0 && (<>
{todos.map((task,index)=>(

<div key={task.id}>
<input type="checkbox"/>
<span> {task.todo_value}</span>
<span onClick={()=>handle_delete(task.id)}>
<button > delete</button>
</span>

</div>

))}
</>
)}




</>
)


}

export default Adds;