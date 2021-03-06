var animalContainer = document.getElementById("animal-info");
var pageCounter = 1; 
var btn = document.getElementById("btn");
var fetchedData = "";



// the below code is considered the AJAX call 

btn.addEventListener("click", function() {
    var ourRequest = new XMLHttpRequest();
    //ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-1.json');
    
   ourRequest.open('GET', 'https://api.thecatapi.com/v1/breeds');
    
    ourRequest.onload = function() {
        if (ourRequest.status >= 200 && ourRequest.status < 400) {
          var ourData = JSON.parse(ourRequest.responseText);
          fetchedData = ourData;
          renderHTML(ourData);
        } else {
          console.log("We connected to the server, but it returned an error.");
        }


        //console.log(ourRequest.responseText);
        //    console.log(ourData[0]);
           console.log(ourData);
    }; 
    
    // in real world, would do something more than log out to our console...
    ourRequest.onerror = function() {
        console.log("Connection error");
      };

    ourRequest.send();
    pageCounter++;
    if (pageCounter > 1) { 
        btn.classList.add("hide-me");
    }

});



 function renderHTML(data) {

    //console.log(data);
        
    var htmlString = "<select onchange='showValue(this.value)'><option>Select a cat breed</option>";

    for (i = 0; i < data.length; i++) {
        
        htmlString += "<option value=\"" + i + "\">" + data[i].name + "</option>";
        //console.log(htmlString);
        document.getElementById("option-box").innerHTML = htmlString;
      }
        
      document.getElementById("option-box").innerHTML = htmlString += '</select>';
      
        //console.log(htmlString);

 
 }


function showValue(index) {
  
  console.log(index);
  //console.log('This is the species:  ' +fetchedData[index].species);
  var htmlString = "";

 if (index == "Select a cat breed") {
    //alert("not");

    document.getElementById("app").innerHTML = htmlString;

  } else {

  var htmlString = "";
  
  htmlString = "<img src='" + fetchedData[index].image.url + "' alt='cat image'>";

document.getElementById("app").innerHTML = htmlString;
 }; 


      

};
