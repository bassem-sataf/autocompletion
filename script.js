'use strict';

document.addEventListener('DOMContentLoaded', function loader(){
  
    let input = document.getElementById("search");   
    var form = document.getElementById('formb') 
    input.addEventListener("input" , function(){
        
            fetch("./bdd.php",{
            method: "post",
            body: new FormData(form)
        }).then(function(response){
            return response.json();
        }).then(function(response){
                console.log(response);
                var prev = document.querySelectorAll("a");
                prev.forEach(element => element.remove())
                var start=document.getElementById("start");
                var contain = document.getElementById("contain")
               if(input.value.length > 2)
               { 
                    for(let i = 0; i<response['start'].length; i++)
                    {
                        var a=document.createElement('a');
                        a.href = 'title.php?id='+response['start'][i]["show_id"];
                        a.innerText = response['start'][i]['title'];
                        start.appendChild(a);
                    }

                    for(let i = 0; i<response['contain'].length; i++)
                    {
                        var a=document.createElement('a');
                        a.href = 'title.php?id='+response['contain'][i]["show_id"];
                        a.innerText = response['contain'][i]['title'];
                        contain.appendChild(a);
                    }
               }   
                
            })
        
        
        })
    })