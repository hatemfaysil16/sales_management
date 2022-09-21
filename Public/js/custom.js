$(document).ready(function () {
  
var form  = {
        username: $('#mail').val(),
        userid: $('#pwd').val()
      };
  $('#send').click(function() {
    $.post(
      'article.php',
      form,
      function (data, status) {
        alert(data);
        alert(status);
      },
      'text'
  );
  });

});

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}



/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
} 



  /* Accordion */

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
      
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}

