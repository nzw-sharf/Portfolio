<section id="contact" class="section bg-dark-1">
    <div class="container">
        <!-- Heading -->
        <div class="row mb-5">
            <div class="col-lg-9 col-xl-8 mx-auto text-center">
                <h2 class="fw-600 text-white mb-3">Contact Us</h2>
                <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                <p class="text-4 text-white-50">Send me a Message, and let’s get started on your project today!</p>
            </div>
        </div>
        <!-- Heading End -->

        <!-- Contact Form -->
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <form id="contact-form" class="form-dark" action="" method="post">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <input name="w3lName" type="text" id="w3lName" class="form-control bg-transparent border-2 border-secondary" required placeholder="Your Name">
                        </div>
                        <div class="col-md-6">
                            <input name="w3lSender"  id="w3lSender" type="email" class="form-control bg-transparent border-2 border-secondary" required placeholder="Your Email">
                        </div>
                        <div class="col-md-12">
                            <textarea name="w3lMessage" id="w3lMessage" class="form-control bg-transparent border-2 border-secondary" rows="5" required placeholder="Tell me more about your needs........"></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button id="submit-btn" class="btn btn-primary rounded-pill d-inline-flex submit_btn" type="button">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Contact Form End -->

        <div class="brands-grid separator-border separator-border-light h-100 mt-5">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="featured-box text-center my-3 my-md-0">
                        <div class="featured-box-icon text-muted"> <i class="fas fa-map-marker-alt"></i></div>
                        <h3 class="text-uppercase text-white">Location</h3>
                        <p class="text-white-50 mb-0">Dubai.<br>
                            United Arab Emirates </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="featured-box text-center my-3 my-md-0">
                        <div class="featured-box-icon text-muted"> <i class="fas fa-phone-alt"></i> </div>
                        <h3 class="text-uppercase text-white">Call Me Now</h3>
                        <p class="text-white-50 mb-0"><a class="text-primary text-decoration-none" href="tel:<?php echo $comp_phone; ?>">Phone: (+971) 585190159</a><br>
                            <a class="text-primary text-decoration-none" href="tel:<?php echo $whatsapp_dial; ?>"> Whatsapp: (+971) 585190159</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="featured-box text-center my-3 my-md-0">
                        <div class="featured-box-icon text-muted"> <i class="fas fa-envelope"></i> </div>
                        <h3 class="text-uppercase text-white">Inquiries</h3>
                        <p class="text-white-50 mb-0"><a class="text-primary text-decoration-none" href="mailto:<?php echo $comp_email; ?>"><?php echo $comp_email; ?></a><br>
                            Everyday 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {

        $(".submit_btn").click(function(e) {
            e.preventDefault();

            var contName2 = $("#w3lName").val();
            var contEmail2 = $("#w3lSender").val();
            var contMsg2 = $("#w3lMessage").val();

            if (contName2 == "" || contEmail2 == "" || contMsg2 == "") {
                swal({
                    title: "Please Fill All Necessary Fields, Thanks!",
                    text: "Thanks for Using My Website!",
                    icon: "warning",
                    button: "Continue!",
                });
            }  else if (IsEmail(contEmail2) == false) {
                swal({
                    title: "Please Provide A Valid Email Address!",
                    text: "Thanks for Using My Website!",
                    icon: "warning",
                    button: "Continue!",
                });
                return false;
            } else {
                $.ajax({
                    method: "POST",
                    url: "quickEnquiryData.php",
                    data: {
                        contactName2: contName2,
                        contactEmail2: contEmail2,
                        contactMessage2: contMsg2,
                    },
                    success: function(response) {
                        if (response == "success") {
                            swal({
                                title: "Thanks For The Message, We Will Respond To You Soon!",
                                text: "Thanks for Using My Website!",
                                icon: "success",
                                button: "Continue!",
                            });
                            $("#w3lName").val("");
                            $("#w3lSender").val("");
                            $("#w3lMessage").val("");
                        } else {
                            swal({
                                title: "There Seem To Be A Problem, Please Try Again Later!",
                                text: "Thanks for Using My Website!",
                                icon: "success",
                                button: "Continue!",
                            });
                        }
                    }
                });
            }

        });

        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            } else {
                return true;
            }
        }

    });
</script>