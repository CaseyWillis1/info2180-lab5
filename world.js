//ID#: 620132112
//Name: Casey Willis


"use strict";


document.addEventListener('DOMContentLoaded', () =>{
    let button = document.getElementById('country2');
 
    button.addEventListener('click', () => lookup());
 
    function lookup(){
      let country = document.querySelector('#country').value;

      let xhr = new XMLHttpRequest();
  
      xhr.open('GET',`world.php?country=${country}&context=country`);
      console.log(country);
    

      xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
          if(xhr.status == 200){ 
            document.getElementById("result").innerHTML = xhr.responseText; 
          }
        }
      }
      xhr.send();
    }
  

    let button2 = document.getElementById('cities');
 
    button2.addEventListener('click', () => lookup2());
 
    function lookup2(){

    let country = document.querySelector('#country').value;
    let xhr = new XMLHttpRequest();
 
    xhr.open('GET',`world.php?country=${country}&context=cities`);
    console.log(country);
    

    xhr.onreadystatechange = function(){
      if(xhr.readyState == 4){
        if(xhr.status == 200){ 
          document.getElementById("result").innerHTML = xhr.responseText; 
        }
      }
    }
    xhr.send();
}
});