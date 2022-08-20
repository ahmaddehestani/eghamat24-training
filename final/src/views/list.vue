
<script setup>
import { ref, onMounted, computed, watch } from 'vue'
const todos = ref([])
const name = ref('')
const input_content = ref('')
const date=ref('')
const input_category = ref(null)
const todos_asc = computed(() => todos.value.sort((a,b) =>{
	return a.createdAt - b.createdAt
}))


watch(name, (new_task) => {
	localStorage.setItem('name', new_task)
})
watch(todos, (new_task) => {
	localStorage.setItem('todos', JSON.stringify(new_task))
}, {
	deep: true
})
const addTodo = () => {
	if (input_content.value.trim() === '' || input_category.value === null) {
		return
	}
	todos.value.push({
		content: input_content.value,
		category: input_category.value,
		done: false,
		editable: false,
		date:date.value,
		createdAt: new Date().getTime()
	})


let get_date= new Date()
let day=get_date.getDate();
let t=date._value.split('-')
let r=t[2].toString()
let d=day.toString()

if(d==r){
console.log("today");
}
console.log(get_date);
input_content.value=''
input_category.value=null
date._value=null

}
const removeTodo = (todo) => {
	todos.value = todos.value.filter((t) => t !== todo)
}
onMounted(() => {
	name.value = localStorage.getItem('name') || ''
	todos.value = JSON.parse(localStorage.getItem('todos')) || []
})

const date1 = new Date();

function make_date(date1){
const year1 = date1.getFullYear();
const month1 = date1.getMonth() + 1;
const day1 = date1.getDate();
 return [year1, month1, day1].join('/')
}

const todo_date= make_date(date1)

;
function getPreviousDay(date = new Date()) {
  const previous = new Date(date.getTime());
  previous.setDate(date.getDate() - 1);

  return previous;
}

const yesterday= make_date(getPreviousDay());


function get_next_Day(date = new Date()) {
  const next = new Date(date.getTime());
  next.setDate(date.getDate() +1);

  return next;
}

const tomorrow=make_date(get_next_Day())


 let set_tomorrow=1
 function set_tomorrow1(){
	this.set_tomorrow=set_tomorrow++
	console.log("i work");
	}
	let my_flag= set_flag()
function set_flag(todo){
return true
}

</script>
<template>
	<main class="app">

		<section class="todo-list">
			<h3>TODO LIST</h3>
			
			<h6>  {{todo_date}}</h6>
		

			<div class="list" id="todo-list">

				<div v-for="todo in todos_asc" :class="`todo-item ${todo.done && 'done'}`">
		
					<label>
						<input type="checkbox" v-model="todo.done" />
						<span :class="`bubble ${
							todo.category == 'DONE' 
								? 'business' 
								: 'personal'
						}`"></span>
					</label>

					<div class="todo-content">
						<input type="text" v-model="todo.content" />
					</div>
					<div class="todo-content">
					<label>date to done </label>
						<input type="text" v-model="todo.date" />
					</div>

					<div class="actions">
						<button class="delete" @click="removeTodo(todo)">Delete</button>
					</div>
					</div>
				</div>
			
		
		</section>



	</main>

</template>
