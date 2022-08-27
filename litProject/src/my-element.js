import { LitElement, css, html } from 'lit'

const get_todos=()=>{
	const data=localStorage.getItem('todo')
	if(data){
		return JSON.parse(data)
	}
	else{
		return []
	}
}

const get_pending=()=>{
  let pending= get_todos();
  let pending_task=[]
  pending.forEach((task)=>{
    if(task.category==false){
      pending_task.push(task)
    }
  })
return pending_task

}


export class MyElement extends LitElement {
  static get properties() {
    return {
todo_value:{type:String},
todos:{type:Array},
todos_show:{type:Array},

todos_pending:{type:Array},
filtered:{type:Array},
date_value:{type:String},
date:{type:String},
time:{type:String},
hide:{type:Boolean},
hide_or:{type:String},
todo_object:{type:Object},

    }
  }

  constructor() {
    super()
    this.todos=get_todos();
    this.date_value="";
    this.todo_value="";
    this.hide=false;
    this.todos_show=get_pending();
    this.hide_or="show done task";
    

  }

  render() {
    return html`
  
    
    <form @submit=${this.handle_submit} class="create-todo" id="form" >
    <input type="text" placeholder="write Task" required
    @change=${this.title_handler} 
    id="title"
    />
    <input type="date"  @change=${this.date_handler} required id="date"/>
    <button> ADD</button>
    </form>

<div id="list">
<input type="checkbox" !checked @click=${()=>this.handle_hide()} /><label>${this.hide_or}</label>
${this.todos_show.map(task=>html`
<div>
<input type="checkbox"   ?checked=${task.category} @click=${()=>this.handle_checkbox(task.id)} />

<span> ${task.title}</span>
<span> ${task.date}</span>
<span >
<button class="btn-delete"   @click=${()=>this.handle_delete(task.id)}> delete</button>
</span>
</div>
`)
}
</div>



    `
  }

  handle_hide(){


this.todos_pending=[]

  this.todos.forEach((task)=>{
    if(task.category===false){
      this.todos_pending.push(task)
    }
  })
if(this.hide==true){
  this.todos_show=this.todos_pending
  this.hide_or="show done task"
}else{
  this.todos_show=this.todos
  this.hide_or="hide done task"
}

this.hide=!this.hide

}

    
 
  handle_checkbox=(id)=>{
    this.filtered=[]
    this.todos.forEach((task)=>{
      if(task.id===id){
          if(task.category===false){
              task.category=true
          }
          else if(task.category===true){
              task.category=false
  
          }
      }
      this.filtered.push(task);
      this.todos=this.filtered
  })
  
  this.store_task()
   
}
 

   handle_delete=(id)=>{

    this.filtered=this.todos.filter((todo)=>{
   
      return todo.id !== id;
  })

  this.todos=this.filtered;
  this.store_task()
  this.todos_show=this.todos
   
}

 get date_handler(){

  return this.renderRoot?.querySelector("#date") ?? null;
  }
  get title_handler(){

    return this.renderRoot?.querySelector("#title") ?? null;
    }


    store_task(){
     window.localStorage.setItem('todo', JSON.stringify(this.todos));
    
    }



    handle_submit(event){

      event.preventDefault();
	 this.date= new Date();
	this.time= this.date.getTime();
	 this.todo_object={
		id:this.time,
		title:this.title_handler.value,
		category:false,
		date:this.date_handler.value

	}
	
	this.todos=([...this.todos,this.todo_object]);
  this.store_task();
  this.title_handler.value=""
  this.date_handler.value=""	
  
    }


  static get styles() {
    return css`

    .item {
      display: flex;
      justify-content:space-around;
      align-items:center;
      background-color: #FFF;
      padding: 1rem;
      border-radius: 0.5rem;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      margin-bottom: 1rem;
      margin-top: 1rem;
    }
      :host {
        max-width: 1280px;
        margin: 0 auto;
        padding: 2rem;
        text-align: center;
      }

      .logo {
        height: 6em;
        padding: 1.5em;
        will-change: filter;
      }
      .logo:hover {
        filter: drop-shadow(0 0 2em #646cffaa);
      }
      .logo.lit:hover {
        filter: drop-shadow(0 0 2em #325cffaa);
      }

      .card {
        padding: 2em;
      }

      .read-the-docs {
        color: #888;
      }

      a {
        font-weight: 500;
        color: #646cff;
        text-decoration: inherit;
      }
      a:hover {
        color: #535bf2;
      }

      h1 {
        font-size: 3.2em;
        line-height: 1.1;
      }

      button {
        border-radius: 8px;
        border: 1px solid transparent;
        padding: 0.6em 1.2em;
        font-size: 1em;
        font-weight: 500;
        font-family: inherit;
        background-color: #1a1a1a;
        cursor: pointer;
        transition: border-color 0.25s;
      }
      button:hover {
        border-color: #646cff;
      }
      button:focus,
      button:focus-visible {
        outline: 4px auto -webkit-focus-ring-color;
      }

      @media (prefers-color-scheme: light) {
        a:hover {
          color: #747bff;
        }
        button {
          background-color: #f9f9f9;
        }
      }
    `
  }
}

window.customElements.define('my-element', MyElement)
