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
	let set_flag=true
	if (input_category.value!="DONE"){
		set_flag=false
	 }
	 console.log(set_flag+"set flag");
	todos.value.push({
		content: input_content.value,
		category: input_category.value,
		done: false,
		editable: false,
		date:date.value,
		display_falg:set_flag,
		createdAt: new Date().getTime()
	})
	


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

 let set_tomorrow=1
 function set_tomorrow1(){
	
	console.log("i work");
	}

function change_category(todo){
	todo.display_falg=!todo.display_falg
	todo.category="personal"

}
let hide_task=true
function hide(){
	hide_task=!hide_task
	console.log("you call me");
	console.log(hide_task);
}

</script>

<template>
	<main class="app">
			
	

		<section class="todo-list">
			<h3>TODO LIST</h3>
					<div class="date_piker">
			<!-- <button @click="set_tomorrow1"> prev {{set_tomorrow}} </button> -->
			<input type="button" value="<" >
			<h6>  {{todo_date}}</h6>
		<button @click="set_tomorrow1">next{{set_tomorrow}} </button>
		
</div>
	
		<input type="submit"  
							value="Hide" @click="hide"/>
			<div class="list" id="todo-list" v-if= hide_task>

				<div v-for="todo in todos_asc" >
					<div v-if= !todo.display_falg :class="`todo-item ${todo.done && 'done'}`">
					<label >
						<input type="checkbox" v-model="todo.done"   @click="change_category(todo)"  />
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
			</div>
		</section>



	</main>

</template>
