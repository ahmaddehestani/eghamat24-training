import React, { useRef, useState, useEffect } from "react";
import { useForm, useWatch } from "react-hook-form";
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
	localStorage.setItem('toods',JSON.stringify(todos))

},[todos])

return(<>
<form autoComplete="off" onSubmit={handle_submit}>
<input type="text" placeholder="write Task" required
onChange={(event)=>set_todo_value(event.target.value)} value={todo_value}
/>
<button> ADD</button>
</form>

{todos.length>0 && (<>
{todos.map((task,index)=>(

<div key={index}>
<input type="checkbox"/>
<span> {task.todo_value}</span>
<button>delete</button>


</div>

))}
</>
)}




</>
)


}

export default Adds;