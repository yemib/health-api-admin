<!DOCTYPE html>
<?php
use App\page;
use App\contact_detail;
use App\logos;
$pages = page::where('publish', 'yes')->paginate(6);
$contact = contact_detail::first();
$logo = logos::first();
?>
<html lang="en">

<head>

        <!-- Favicon -->
        <link rel="icon" href="https://wholeplanetinitiative.org/logo.png" type="image/x-icon">

        <?php echo $__env->yieldContent('icon'); ?> 

    <?php
         $description = 'Explore the latest insights on
         climate change, global warming, and sustainable living. Our platform is dedicated
         to raising awareness, offering solutions for a low-carbon lifestyle, and advocating for
         environmental conservation. Join us in the fight against climate change and be part of the
         movement for a greener, more sustainable future.';
        ?>


     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?php echo $__env->yieldContent('title'); ?> | <?php echo e($description); ?>">

    <meta name="keywords" content="Climate change, Global warming, Carbon footprint,
     Renewable energy, Greenhouse gases, Sustainable living, Climate action, Climate science,
      Environmental conservation, Eco-friendly practices, Climate policy,
      Sustainable development, Climate resilience, Carbon offset, Clean energy solutions,
       Climate adaptation, Biodiversity conservation, Climate awareness, Climate crisis,
     Low-carbon lifestyle, Green technology, Climate justice,
      Environmental activism, Sustainable agriculture, Ocean conservation">

    <meta name="author" content="ADEBUKOLA MARGARET">

    <!-- Open Graph meta tags for social media -->
    <meta property="og:title" content="<?php echo $__env->yieldContent('title'); ?> <?php echo e(config('app.name')); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('title'); ?> | <?php echo e($description); ?>">

  <meta property="og:url" content="<?php echo $__env->yieldContent('facebook_link'); ?>"> 

    <meta property="og:image" content="<?php echo $__env->yieldContent('logo'); ?>">


    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="summary_large_image">
   
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?> ">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('title'); ?> | <?php echo e($description); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('logo'); ?>">

   <?php echo $__env->yieldContent('meta'); ?>




    <title> <?php echo $__env->yieldContent('title'); ?> Whole Planet Initiative</title>
    <!-- Bootstrap CSS -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="/newdesign/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/newdesign/css/owl.carousel.min.css">


    <link rel="stylesheet" href="/newdesign/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/newdesign/styles2.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="/newdesign/swiper-bundle.min.css">

    <style>
        .pagination svg {

            width: 20px;
            height: 20px
        }

        .pagination {
            list-style: none;
            padding-left: 0;
            text-align: center;
            margin: 30px;
        }

        .pagination li {
            display: inline-block;
        }

        .pagination li+li {
            margin-left: 1rem;
        }

        .pagination a {
            text-decoration: none;
            padding: 0.2rem 0.4rem;
            color: red;
            border: 1px solid red;
            border-radius: 2px;
        }
    </style>

    <?php echo $__env->yieldContent('head'); ?>
</head>

<body>

    <!-- Navbar -->
    <?php  if(session('error')){   ?>
    <script>
        alert('error okay')
    </script>

    <?php  } ?>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <?php echo $__env->make('menu2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('slidder'); ?>


    <?php echo $__env->yieldContent('content'); ?>


    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="text-left">
                    <ul class="list-inline footer-links">
                        <li class="list-inline-item"><a href="/">Home</a></li>
                        <li class="list-inline-item"><a href="/page/1/about">About</a></li>
                        <li class="list-inline-item"><a href="/event">Blog</a></li>

                    </ul>
                    <ul class="list-inline contact-info">
                        <li class="list-inline-item"><i class="fas fa-phone"></i> <a href="tel:+1234567890">+1 (234)
                                567-890</a></li>
                        <li class="list-inline-item"><i class="fas fa-envelope"></i> <a
                                href="mailto:<?php echo $contact->email; ?>"><?php echo $contact->email; ?></a></li>
                        <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i> <?php echo $contact->address; ?></li>
                    </ul>
                </div>
                <div class="text-center copyright">
                    <br />
                    <p> Copyright &copy; <?php echo e(Date('Y')); ?> <?php echo e(config('app.name')); ?>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->

    <script src="/newdesign/js/jquery-3.3.1.min.js"></script>
    <script src="/newdesign/js/popper.min.js"></script>
    <script src="/newdesign/js/bootstrap.min.js"></script>
    <script src="/newdesign/js/jquery.sticky.js"></script>
    <script src="/newdesign/js/main.js"></script>

    <!-- Your custom JavaScript -->
    <script src="/newdesign/script.js"></script>
    <!-- Scroll-to-Top Button -->
    <button id="scroll-to-top" class="btn btn-secondary btn-lg"><i class="fas fa-chevron-up"></i></button>


    <!-- Swiper JS -->
    <script src="/newdesign/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true, // Enable looping
            autoplay: {
                delay: 5000, // Autoplay delay in milliseconds (adjust as needed)
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                // Responsive breakpoints
                768: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1200: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                },
            },
        });
    </script>
        

        <?php echo $__env->yieldContent('script'); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var images = document.querySelectorAll('img[data-src]');

            var options = {
                root: null,
                rootMargin: '0px',
                threshold: 0.5
            };

            var observer = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.onload = function() {
                            console.log('Image loaded successfully');
                        };
                        img.onerror = function() {
                            console.log('Error loading image');
                            img.src = "/logo.png";
                        };
                        img.src = img.getAttribute('data-src');
                        observer.unobserve(img);
                    }
                });
            }, options);

            images.forEach(function(img) {
                observer.observe(img);
            });
        });
    </script>




</body>

</html>
<?php /**PATH C:\website\health\health-api-admin\resources\views/layouts/index2.blade.php ENDPATH**/ ?>