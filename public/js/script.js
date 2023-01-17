// collapse menu https://www.w3schools.com/howto/howto_js_collapsible.asp
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

// login pagina
function order() {
    if (document.getElementById('order').style.display == 'none'){
        document.getElementById('order').style.display = 'block';
    }
    else {
        document.getElementById('order').style.display='none';
    }
}

// prijsberekening
function prijsberekening() {
    if (document.getElementById('aantal').style.display='none'){
    }
    else if (document.getElementById('order').style.display='none')
    {
        document.getElementById('order').style.display='none';
    }
}

function clickCounter() {
    if (sessionStorage.clickcount) {
      sessionStorage.clickcount = Number(sessionStorage.clickcount) + 1;
    } else {
      sessionStorage.clickcount = 1;
      }
    document.getElementById("demo").innerHTML = sessionStorage.clickcount;
  }
