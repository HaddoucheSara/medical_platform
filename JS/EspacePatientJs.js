var showDivButton = document.getElementById('showDivButton');
var myDiv = document.getElementById('myDiv');

showDivButton.addEventListener('click', function() {
  myDiv.classList.toggle('show');
});

document.addEventListener('click', function(event) {
  if (!myDiv.contains(event.target) && event.target !== showDivButton) {
    myDiv.classList.remove('show');
  }
});



 // Get the current date
 let today = new Date();

 // Get the current month and year
 let month = today.getMonth();
 let year = today.getFullYear();
 
 // Get the first day of the current month
 let firstDay = new Date(year, month, 1);
 
 // Get the number of days in the current month
 let lastDay = new Date(year, month + 1, 0).getDate();
 
 // Get the HTML element for the calendar
 let calendar = document.getElementById("calendar");
 

 // Add the weekdays to the calendar
let weekdays = ["Lu", "Ma", "Me", "Jeu", "Ve", "Sa", "Di"];
for (let i = 0; i < 7; i++) {
  let cell = document.createElement("div");
  cell.innerText = weekdays[i];
  calendar.appendChild(cell);
} 



 // Add the days of the month to the calendar
 for (let i = 0; i < 5; i++) {
   for (let j = 0; j < 7; j++) {
     let day = i * 7 + j;
     let cell = document.createElement("div");
     if (day >= firstDay.getDay() && day < firstDay.getDay() + lastDay) {
       cell.innerText = day - firstDay.getDay() + 1;
     }
     calendar.appendChild(cell);
   }
 }


