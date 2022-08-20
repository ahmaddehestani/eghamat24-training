
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
	

	

// let get_date= new Date()
// let day=get_date.getDate();
// let t=date._value.split('-')
// let r=t[2].toString()
// let d=day.toString()

// if(d==r){
// console.log("today");
// }
// console.log(get_date);
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
</script>

<template>

		
		<section class="greeting">
			<h2 class="title">
				TODO LIST 
			</h2>
		</section>

		<section class="create-todo">
			<h3>CREATE A TASK</h3>

			<form id="new-todo-form" @submit.prevent="addTodo">
				<h4>MAKE YOUR TASK</h4>
				<input 
					type="text" 
					name="content" 
					id="content" 
					placeholder="TASK TODO"
					v-model="input_content" />
<h4>TASK DATE</h4>
						<input 
					type="date" 
					name="date" 
					id="date" 
					placeholder="TASK DATE"
					v-model="date" />
				
				<h4>Pick a category</h4>
				<div class="options">

					<label>
						<input 
							type="radio" 
							name="category" 
							id="category1" 
							value="DONE"
							v-model="input_category" />
						<span class="bubble business"></span>
						<div>DONE</div>
					</label>

					<label>
						<input 
							type="radio" 
							name="category" 
							id="category2" 
							value="PENDING"
							v-model="input_category" />
						<span class="bubble personal"></span>
						<div>PENDING</div>
					</label>

				</div>

				<input type="submit" value="Add todo" />
			</form>
		</section>

</template>
