// $(function(){
//         // Check the initial Poistion of the Sticky Header
//         var stickyHeaderTop = $('.main-navigation').offset().top;

//         $(window).scroll(function(){

//                 if( $(window).scrollTop() > stickyHeaderTop ) {
//                         $('.main-navigation').css({position: 'fixed', top: '0px'});
//                         $('#stickyalias').css('display', 'block');
//                 } else {
//                         $('.main-navigation').css({position: 'static', top: '0px'});
//                         $('#stickyalias').css('display', 'none');
//                         document.getElementById("myH2").style.backgroundColor = "white";
//                         document.getElementById("myH2").style.borderBottom = "1px solid gray";
//                 }

//         });
//   });
window.onscroll = changePos;

function changePos() {
    var header = document.getElementById("myH2");
    if (window.pageYOffset > 70) {
        header.style.position = "fixed";
        header.style.top = "0";
        // header.style.backgroundColor = "#fff";
        header.style.borderBottom = "1px solid #E6E4EF";
    } else {
        header.style.position = "";
        header.style.top = "";
        header.style.borderBottom = "";
    }
}

$(document).ready(function(){       
   var scroll_start = 0;
   var startchange = $('.main-navigation');
   var offset = startchange.offset();
    if (startchange.length){
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $("#myH2").css('background-color', '#fff');
       } else {
          $('#myH2').css('background-color', 'transparent');
       }
   });
    }
});
//# sourceMappingURL=add-on.js.map
