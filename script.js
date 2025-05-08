// JavaScript Document
window.addEventListener('load', function () {
  'use strict';
  $(".filter-button").click(function () {
    var value = $(this).attr("data-filter");

    if (value == "all") {

      $(".filter").show("1000");
    } else {
      $(".filter").not('.' + value).hide("3000");
      $(".filter").filter('.' + value).show("3000");

    }
  });

});


function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("diff-address");
  // Get the output text
  var text = document.getElementById("delivery-address");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true) {
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

$(document).ready(function() {
// The strength of the mouse is set to 25
var movementStrength = 25;
// This two lines of code is to get window size, width and height
// $(window).height() = gets an unit-less pixel value of the height of the (browser) window (viewport) 
// $(window).width() =gets an unit-less pixel value of the width of the (browser) window (viewport) 
var height = movementStrength / $(window).height(); 
var width = movementStrength / $(window).width(); 
// Trigger the mousemove event for the images on the homepage
$(".heroImg, .sectionOneImg, .sectionTwoImg, .sectionThreeImg").mousemove(function(e){
          var pageX = e.pageX - ($(window).width() / 2);
          var pageY = e.pageY - ($(window).height() / 2);
          var newvalueX = width * pageX * -1 - 25;
          var newvalueY = height * pageY * -1 - 50;
          $('.heroImg, .sectionOneImg, .sectionTwoImg, .sectionThreeImg').css("background-position", newvalueX+"px     "+newvalueY+"px");
});
});



