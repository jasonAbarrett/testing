
var pageCounter = 1; 


//POST REQUEST

$(document).ready(function(){
    $('#postMessage').click(function(e){
        e.preventDefault();

        //serialize form data
        var url = $("form").serialize().replace(/\+/g,' ');


        //function to turn url to an object
        function getUrlVars(url) {
            var hash;
            var myJson = {};
            var hashes = url.slice(url.indexOf('?') + 1).split('&');
            for (var i = 0; i < hashes.length; i++) {
                hash = hashes[i].split('=');
                myJson[hash[0]] = hash[1];
            }
            return JSON.stringify(myJson);
        }

        //pass serialized data to function
        var test = getUrlVars(url);
        

        //post with ajax
        $.ajax({
            type:"POST",
            url: "/testing/php_rest_myblog/api/post/create.php",
            data: test,
            ContentType:"application/json",

            success:function(){
                alert('successfully posted');
            },
            error:function(){
                alert('Could not be posted');
            }

        });
    });
});
    

//GET REQUEST

  document.addEventListener('DOMContentLoaded',function(){
  document.getElementById('getMessage').onclick=function(){
       
    
       
       var req;
       req=new XMLHttpRequest();
       req.open("GET", '/testing/php_rest_myblog/api/post/read.php',true);
       req.send();
       
       document.getElementById("getMessage").style.visibility="hidden"; 


      // console.log(req);

       req.onload=function(){
       var jason=JSON.parse(req.responseText);
        renderHTML(jason.data);
        //console.log(jason.data);
       

       }

       //limit data called
    //    let son = jason.filter(function (e) {
    //     return e.id == "4";
    //     });
    //    // console.log(son);
       
       
    //    var son=json.filter(function(val) {
    //           return (val.id >= 4);  
    //       });

        

    function renderHTML(data) {
        var htmlString = "";
       
        for (i = 0; i < data.length; i++) {
          htmlString += "<p>" + data[i].id + " and title is " + data[i].title;
          //alert('hey');
          //console.log(htmlString);
                  
          }
      
          htmlString += '.</p>';
      
         // console.log(htmlString);
    
    
        //messagebox.insertAdjacentHTML('beforeend', htmlString);
    document.getElementById('messagebox').innerHTML= htmlString;         
    


        }







    //   var html = "";

    //   //loop and display data
    //   jason.forEach(function(val) {
    //       var keys = Object.keys(val);

    //       html += "<div class = 'cat'>";
    //           keys.forEach(function(key) {
    //           html += "<strong>" + key + "</strong>: " + val[key] + "<br>";
    //           });
    //       html += "</div><br>";
    //   });

      //append in message class
    //   document.getElementsByClassName('message')[0].innerHTML=html;         
      
    };
  });
  
