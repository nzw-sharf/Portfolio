<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- Document Wrapper -->
    <div id="main-wrapper">
        <!-- Header -->
        <?php include("includes/header.php"); ?>
        <!-- Header End -->

        <!-- Content -->
        <div id="content" role="main">

            <!-- Intro -->
            <section id="home">
                <div class="hero-wrap">
                    <div id="particles-js" class="hero-particles"></div>
                    <div class="hero-mask opacity-7 bg-dark"></div>
                    <div class="hero-bg parallax" style="background-image:url('images/intro-bg-3.jpg');"></div>
                    <div class="hero-content section d-flex fullscreen">
                        <div class="container my-auto">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="text-5 text-uppercase text-primary ls-4 mb-2 mb-md-3">Welcome to My World</p>
                                    <div class="typed-strings ">
                                        <p>I'm Nazwa Sharaf</p>
                                        <p>I'm a Full Stack Developer.</p>
                                        <p>I'm a Graphic Designer.</p>
                                        <p>I'm a Wordpress Developer.</p>
                                    </div>
                                    <h2 class="text-17 fw-600 text-white mb-2 mb-md-3"><span class="typed"></span></h2>
                                    <p class="text-5 text-light">based in Dubai, United Arab Emirates.</p>
                                    <a href="NazwaCV.pdf" class="btn btn-primary rounded-pill mt-3">Download CV</a>
                                </div>
                            </div>
                        </div>
                        <a href="#about" class="scroll-down-arrow text-white smooth-scroll"><span class="animated"><i class="fa fa-chevron-down"></i></span></a>
                    </div>
                </div>
            </section>
            <!-- Intro end -->

            <!-- About -->
            <?php include("includes/about-me.php"); ?>
            <!-- About end -->

            <!-- Services  -->
            <?php include("includes/services.php"); ?>
            <!-- Services end -->

            <!-- Why Choose -->
            <?php include("includes/why-choose.php"); ?>
            
            <!-- Why Choose end -->

            <!-- Promo Box -->
            <section class="section bg-primary text-center">
                <div class="container">
                    <p class="lead text-white">I am Available for Freelancing.</p>
                    <h2 class="text-10 text-white mb-4">Start a project with Me today!</h2>
                    <a href="#contact" class="btn btn-light rounded-pill shadow-none smooth-scroll mt-2">Hire Me</a>
                </div>
            </section>
            <!-- Promo Box end -->

            <!-- Portfolio -->
            <?php include("includes/portfolio.php"); ?>
            <!-- Portfolio end -->

            <!-- Process -->
            <?php include("includes/process.php"); ?>
            <!-- Process end -->

            <!-- Clients -->
            <?php include("includes/clients.php"); ?>
            <!-- Clients end -->

            <!-- Contact -->
            <?php include("includes/contact-me.php"); ?>
            <!-- Contact end -->

        </div>
        <!-- Content end -->

        <?php include("includes/footer.php"); ?>
</body>

</html>