//ID#: 620132112
//Name: Casey Willis


"use strict";

document.addEventListener('DOMContentLoaded', () =>{
  let button = document.querySelector('button');
 
  button.addEventListener('click', () => lookup());
 
  function lookup(){

  let xhr = new XMLHttpRequest();
  
  let lookup = document.getElementById('country').value;
    
    xhr.open('GET',`world.php?country=${lookup}`);
    
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