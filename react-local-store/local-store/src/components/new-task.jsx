import React, { useState, useEffect ,useNavigate ,Redirect} from "react";
import {  Link } from 'react-router-dom';

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
	// const navigate = useNavigate();

const [todo_value , set_todo_value]=useState('')
const [todos, set_todos]=useState(get_todos());
const [date_value, set_date_value]=useState('')
const [hide, set_hide]=useState(true)
const [date_piker, set_date_piker_value]=useState('')
const [todos_with_date ,set_todos_with_date]=useState('')



const handle_submit=(event)=>{
	event.preventDefault();
	const date= new Date();
	const time= date.getTime();

	let todo_object={
		id:time,
		title:todo_value,
		category:false,
		date:date_value

	}
	
	set_todos([...todos,todo_object])
	set_todo_value('');
	set_date_value('');
	// navigate('/list');
	// return <Redirect  to ="/list" />
	
}

useEffect(()=>{
	localStorage.setItem('todos', JSON.stringify(todos));

},[todos])





return(
<>
<nav>
<Link to="/list">task list</Link>
</nav>

<form autoComplete="off" onSubmit={handle_submit} class="create-todo">
<input type="text" placeholder="write Task" required
onChange={(event)=>set_todo_value(event.target.value)} value={todo_value}
/>
<input type="date"  onChange={(event)=>set_date_value(event.target.value)} value={date_value} required/>
<button> ADD</button>
</form>
{/* 
<label>SHOW LIST</label>
<input type="checkbox"  onChange={(event)=>{set_hide(!hide)}} check={hide}/>
{!hide && (<>
{todos.length>0 && (<>
{todos.map((task,index)=>(

<div key={task.id}>
	
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

</>)}
 */}
{/* 
<input type="date"   onChange={(event)=>handle_date_piker(event.target.value) } value={date_piker}  />

{todos_with_date.length>0 && (<>
{todos_with_date .map((task,index)=>(

<div key={task.id}>
	
<input type="checkbox"   onChange={()=>{handle_checkbox(task.id)}} checked={task.category}/>
<span> {task.title}</span>
<span> {task.date}</span>
<span onClick={()=>handle_delete(task.id)}>
<button > delete</button>
</span>

</div>

))}
</>
)} */}

</>
)


}

export default Adds;