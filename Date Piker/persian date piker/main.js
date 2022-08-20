const date_picker_element=document.querySelector('.date-picker');
const selected_date_element= document.querySelector('.date-picker .selected-date');
const dates_element=document.querySelector('.date-picker .dates');
const mth_element=document.querySelector('.date-picker .dates .month .mth');
const prev_mth_element=document.querySelector('.date-picker .dates .month .prev-mth');
const next_mth_element=document.querySelector('.date-picker .dates .month .next-mth');

const next_year_element=document.querySelector('.date-picker .dates .month .next-year');
const prev_year_element=document.querySelector('.date-picker .dates .month .prev-year');


const days_element=document.querySelector('.date-picker .dates .days');
var starter_mth=5;
var last_day_of_month=2;
var static_last_day=0;
var starter_next_month_day=0;

const now = new Date();

const first_Day = new Date(now.getFullYear(), now.getMonth(), 1);
console.log(first_Day); 
const test=first_Day+"";
const my_Array = test.split(" ");
const day_name=my_Array[0];
console.log(day_name);

const lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0);
console.log(lastDay);
const end_month_day=lastDay+"";
const pArray = end_month_day.split(" ");
const last_day_name_week=pArray[0];
const number_of_day_name=0;


var day_name_week;
 const c=["SUN","MON","THU","WED","THE","FRI","SAT"];
 for(let i=0;i<c.length;i++){
if(day_name.toUpperCase()==c[i]){
    day_name_week=c[i];
}
 }

 function generateDayNumber(ldName){
    for(let i=0;i<c.length;i++){
        if(ldName.toUpperCase()==c[i]){
            number_of_day_name=i;
        }
         }
 }






const months=['قروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر',
'دی','بهمن','اسفند'];

let date=new Date();
let day=date.getDate();
let month=date.getMonth();
let year=date.getFullYear();

 let b=gregorian_to_jalali(year,month+1,day);
 persian_day=b[2];
 persian_month=b[1];
 persian_year=b[0];


let selectedDate=date;
let selectedDay=persian_day;
let selectedMonth=persian_month;
let selectedYear=persian_year;

mth_element.textContent=months[persian_month]+ ' ' + persian_year;
selected_date_element.textContent=b[0]+' '+'/'+ ' 0'+b[1]+'/'+' '+b[2];
populateDates();


date_picker_element.addEventListener('click',toggleDatePicker);
next_mth_element.addEventListener('click', goToNextMonth);
prev_mth_element.addEventListener('click', goToPrevMonth);

next_year_element.addEventListener('click', goToNextYear);
prev_year_element.addEventListener('click', goToPrevYear);
function toggleDatePicker(e){
    if(!checkEventPathForClass(e.path,'dates')){
    dates_element.classList.toggle('active');
    }
}

function goToNextMonth(){

    persian_month++;
    if(persian_month>11){
        
        persian_month=0;
        persian_year++;
        
    }

    mth_element.textContent=months[persian_month]+ ' '+ persian_year;
    populateDates();
}

function goToNextYear(){

    persian_year++;
   

    mth_element.textContent=months[persian_month]+ ' '+ persian_year;
    populateDates();
}
function goToPrevYear(){

    persian_year--;
   

    mth_element.textContent=months[persian_month]+ ' '+ persian_year;
    populateDates();
}

function goToPrevMonth(){
    persian_month--;
    if(persian_month<0){
        persian_month=11;
        persian_year--;
    }
    mth_element.textContent=months[persian_month]+ ' '+ persian_year;
    populateDates();
}


function populateDates(e){
    days_element.innerHTML= '';
let amount_days=31;

if(persian_month>5){
    amount_days=30;
}
// const s=[a,b,c,d,e,f,h]
// for (let j = 0; j < 6; j++) {
//     const day_element=document.createElement('div');
//     day_element.classList.add('day');
//     day_element.textContent=s[j];
//     days_element.appendChild(day_element);
// }


var counter;
switch(day_name_week) {

    case "MON":
      counter=-1;
      
      break;
      case "THU":
        counter=-2;
        
      break;
      case "WED":
        counter=-3;
     
      break;
      case "THE":
        counter=-4;
     
      break;
      case "FRI":
        counter=-5;
       
      break;
    case "SAT":
        counter=-6;
      
      break;
    default:
        counter=0;
        
      
      
  }

  counter=Math.floor((Math.random() * 6)-5 );



    
    
    for (let i=counter; i < amount_days; i++) {
        
        const day_element=document.createElement('div');
        day_element.classList.add('day');
        if(i<0){
        day_element.textContent=null;}
        else{
        day_element.textContent=i+1;}

if(selectedDay==(i+1) && selectedYear== persian_year && selectedMonth==persian_month){
    day_element.classList.add('selected');
}

day_element.addEventListener('click',function(){
    // selectedDate=new Date(year+'-'+(month+1)+'-'+(i+1));
    
    persian_day1=(i+1);
    selectedMonth=persian_month+1;
    selectedYear=persian_year;
    
   
    if(persian_day1<10){
        persian_day1='0'+persian_day1;
    }

    selectedDay=persian_day1;



   
    if(selectedMonth<10){
        selectedMonth='0'+(persian_month+1);
    }

    let selectedDate=selectedYear+' '+'/'+' '+selectedMonth+' '+'/'+' '+selectedDay;

 
    selected_date_element.textContent=selectedDate;
    selected_date_element.dataset.value=selectedDate;

populateDates();

});

        days_element.appendChild(day_element);
        
    }
}



function checkEventPathForClass(path , selector){
    for (let i=0;i<path.length ;i++){
if(path[i].classList && path[i].classList.contains(selector)){
    return true;
}
    }
return false;
}


function formatDate(d){
    let b=gregorian_to_jalali(d.getFullYear(),d.getMonth()+1,d.getDate());

  
    persian_day=b[2];
    persian_month=b[1];
    persian_year=b[0];



   
    if(persian_day<10){
        persian_day='0'+persian_day;
    }
   
    if(persian_month<10){
        persian_month='0'+persian_month;
    }
    
return day + '/' + months[month] + '/' + year;
 
}