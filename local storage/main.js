const submit_element =document.querySelector('.submit');
const count_record_element = document.querySelector('.count_record')



var data=[];
var user_data;
let old_record=localStorage.getItem("new_record");

let old_record_array=old_record.split("<div>")
let count_record = old_record_array.length;





count_record_element.textContent=count_record;

// function fake_record_maker(){
//     for (let couter=0;couter>999;couter){
        
//     store_in_localStore
// }}
// fake_record_maker()

submit_element.addEventListener('click', store_in_localStore);

function record_formatter(name,family,date,entry_time,exit_time){
    
    let new_record1="<div>"+"<b> Name: </b>"+"<span>"+name+"</span> "+" <b> Family:  </b>"+"<span>"+family+"</span>"+" <b> date</b>"+"<span>"+date+"</span>"+ "  <b> Entry Time:  </b>"+"<span>"+entry_time+" </span>"+" <b> Exit Time: </b>  "+"<span>"+exit_time+"</span>"+"</div>";

    return new_record1;
}
function validation_time(entry,exit){
    
if (entry>exit){
    window.confirm("exit time must be bigger than entry time");
    return false
}
return true
}
function validation(entry){
    if (isNaN(entry)) 
    {
        window.confirm("enter number");
        return false
    }
    return true
    }

function store_in_localStore(){
let  name=document.getElementById("first_name").value;
let family=document.getElementById("last_name").value;
console.log(name);
console.log(family+"f");
let entry_time=document.getElementById("entry_time").value;
let exit_time=document.getElementById("exit_time").value;
let date=date_formatter( new Date());
validation(entry_time)
validation_time(entry_time,exit_time)
    let new_record=record_formatter(name,family,date,entry_time,exit_time)+old_record;






  
localStorage.setItem("new_record",new_record);

    
}

function pad_to_digits(num) {
    return num.toString().padStart(2, '0');
  }

function date_formatter(date) {
    return [
        pad_to_digits(date.getDate()),
        pad_to_digits(date.getMonth() + 1),
      date.getFullYear(),
    ].join('/');
  }


// document.getElementById("old_record").innerHTML = localStorage.getItem("new_record");
// pagination()  

// function pagination(){

// var current_page = 1;
// var records_per_page = 10;

// var source_data = old_record_array;
// console.log(source_data[1]);
// function prevPage()
// {
//     if (current_page > 1) {
//         current_page--;
//         change_page(current_page);
//     }
// }

// function nextPage()
// {
//     if (current_page < num_pages()) {
//         current_page++;
//         change_page(current_page);
//     }
// }
    
// function change_page(page)
// {
//     var btn_next = document.getElementById("btn_next");
//     var btn_prev = document.getElementById("btn_prev");
//     var listing_table = document.getElementById("listingTable");
//     var page_span = document.getElementById("page");
 
//     // Validate page
//     if (page < 1) page = 1;
//     if (page > num_pages()) page = num_pages();

//     listing_table.innerHTML = "";

//     for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < source_data.length; i++) {
//         listing_table.innerHTML += "<div>"+source_data[i];
//         console.log(source_data[i]);
        
//     }
//     page_span.innerHTML = page + "/" + num_pages();

//     if (page == 1) {
//         btn_prev.style.visibility = "hidden";
//     } else {
//         btn_prev.style.visibility = "visible";
//     }

//     if (page == num_pages()) {
//         btn_next.style.visibility = "hidden";
//     } else {
//         btn_next.style.visibility = "visible";
//     }
// }

// function num_pages()
// {
//     return Math.ceil(source_data.length / records_per_page);
// }

// window.onload = function() {
//     change_page(1);
// };}


var current_page = 1;
var records_per_page = 8;

var objJson = old_record_array;

function prev_page()
{
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
    }
}

function next_page()
{
    if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
    }
}
    
function changePage(page)
{
    var btn_next = document.getElementById("btn_next");
    var btn_prev = document.getElementById("btn_prev");
    var listing_table = document.getElementById("listingTable");
    var page_span = document.getElementById("page");
 
    // Validate page
    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();

    listing_table.innerHTML = "";

    for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < objJson.length; i++) {
        listing_table.innerHTML += "<div>"+objJson[i];
    }
    page_span.innerHTML = page + "/" + numPages();

    if (page == 1) {
        btn_prev.style.visibility = "hidden";
    } else {
        btn_prev.style.visibility = "visible";
    }

    if (page == numPages()) {
        btn_next.style.visibility = "hidden";
    } else {
        btn_next.style.visibility = "visible";
    }
}

function numPages()
{
    return Math.ceil(objJson.length / records_per_page);
}

window.onload = function() {
    changePage(1);
};


// if (typeof(Storage) !== "undefined") {
//     // Store
//     localStorage.setItem("lastname", "Smith");
//     localStorage.setItem("firstname" , "ahmad");
//     // Retrieve
//     document.getElementById("result").innerHTML = localStorage.getItem("lastname");
//       document.getElementById("result").innerHTML = localStorage.getItem("lastname");
//   } else {
//     document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
//   }