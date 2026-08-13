$(document).ready(function () {
  // header menu toggle js
  $(".menu_togg_btn").click(function () {
    $(".navigation_links").slideToggle();
    $(".overlay_menu").slideToggle();
  });

  $(".banner_slider").slick({
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    vertical: true,
    verticalSwiping: true,
  });

  // Review slider js
  $(".review_slider").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: false,
    arrows: true,
    responsive: [
      {
        breakpoint: 1300,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        }
      },
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        }
      },
    ],
  });

});

// tool tip bootstrap 5
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});




// js for the sale countdown date and time
// var countDownDate = new Date("Aug 16, 2025 00:00:00").getTime();

// var x = setInterval(function () {
//   var now = new Date().getTime();
//   var distance = countDownDate - now;

//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById("days").innerHTML = "00";
//     document.getElementById("hours").innerHTML = "00";
//     document.getElementById("minutes").innerHTML = "00";
//     document.getElementById("seconds").innerHTML = "00";
//     return;
//   }

//   // Time breakdown
//   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

//   // Display values in your existing HTML structure
//   document.getElementById("days").innerHTML = String(days).padStart(2, '0');
//   document.getElementById("hours").innerHTML = String(hours).padStart(2, '0');
//   document.getElementById("minutes").innerHTML = String(minutes).padStart(2, '0');
//   document.getElementById("seconds").innerHTML = String(seconds).padStart(2, '0');
// }, 1000);



// const signUp = document.getElementById('signup');
// const login = document.getElementById('login');
// const container = document.getElementById('container');

// signUp.addEventListener('click', () => {
//     container.classList.add('right-panel-active');
// })
// login.addEventListener('click', () => {
//     container.classList.remove('right-panel-active');
// })