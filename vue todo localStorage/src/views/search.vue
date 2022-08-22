<script setup>

import { ref, onMounted, computed, watch } from 'vue'
const todos = ref([])
const name = ref('')
const input_content = ref('')
let search_flag=false
let filtered=[]

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

onMounted(() => {
	name.value = localStorage.getItem('name') || ''
	todos.value = JSON.parse(localStorage.getItem('todos')) || []
})

function search_task(){
    filtered.length=0

for (let index = 0; index < todos._rawValue.length; index++) {
    const element = todos._rawValue[index];
    if(element.content==input_content.value){
        console.log(`task find and ${element.content} Push to array`);
        search_flag=true
    
        filtered.push(element)
    }else{
        console.log("else work");
     
    }
}
console.log(filtered);

    input_content.value = null
   
}



</script>

<template>
	<main class="app">
			
		

		<section class="todo-list">

            <form id="new-todo-form" @submit.prevent="addTodo">
				<h4>SEARCH YOUR TASK</h4>
				<input 
					type="text" 
					name="content" 
					id="content" 
					placeholder="serach your task"
					v-model="input_content" 
                    @keyup.enter="search_task"
                    />
                    
                    </form>
		
			


			<div class="list" id="todo-list">

				<div v-for="todo in filtered" :class="`todo-item ${todo.done && 'done'}`">
		
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
