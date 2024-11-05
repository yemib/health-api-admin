// script.js

// Smooth scrolling for anchor links
$(document).ready(function(){

    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        }
    });

// Add this to script.js

// Show/Hide Scroll-to-Top Button
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        $('#scroll-to-top').fadeIn();
    } else {
        $('#scroll-to-top').fadeOut();
    }
});

// Scroll to Top
$('#scroll-to-top').click(function() {
    $('html, body').animate({ scrollTop: 0 }, 800);
    return false;
});


// Update this in script.js

// Contact Form Submission
$('#contact-form').submit(function(e) {
    e.preventDefault();

    // Add your form submission logic here
    // You can use AJAX to send the form data to a server or handle it as needed

    // For now, let's just log the form data to the console
    var formData = $(this).serialize();
    console.log(formData);

    // Optionally, you can reset the form after submission
    // $(this)[0].reset();
});


});

// JavaScript for scrolling the blog posts
// JavaScript for scrolling the blog posts
let currentTranslateValue = 0;
const scrollStep = 330; /* Adjusted for the new card width */

function scrollBlogPosts(direction) {
  const container = document.querySelector('.blog-scroll');
  const containerWidth = container.offsetWidth;
  const maxTranslateValue = container.scrollWidth - containerWidth;

  currentTranslateValue += direction * scrollStep;

  if (currentTranslateValue < 0) {
    currentTranslateValue = 0;
  } else if (currentTranslateValue > maxTranslateValue) {
    currentTranslateValue = maxTranslateValue;
  }

  container.style.transform = `translateX(-${currentTranslateValue}px)`;
}