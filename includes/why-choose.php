<section id="why-choose" class="section bg-dark">
    <div class="container">
        <!-- Heading -->
        <div class="row mb-5">
            <div class="col-lg-9 col-xl-8 mx-auto text-center">
                <h2 class="fw-600 text-white mb-3">Why I'm Different?</h2>
                <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                <p class="text-4 text-white-50">Iam Innovative, Iam hard working, Iam easy to talk to, and I love a challenge.</p>
            </div>
        </div>
        <!-- Heading End -->

        <div class="row justify-content-center mb-md-4">
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="featured-box style-3">
                    <div class="featured-box-icon text-primary border border-dark rounded-circle"> <i class="fas fa-fingerprint"></i></div>
                    <h3 class="text-white">Custom Websites</h3>
                    <p class="text-white-50 mb-0">A custom site is made according to the needs and mission of the clients. Every requirement of the client is met as neccessary.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="featured-box style-3">
                    <div class="featured-box-icon text-primary border border-dark rounded-circle"> <i class="fas fa-cog"></i> </div>
                    <h3 class="text-white">User-Friendly</h3>
                    <p class="text-white-50 mb-0">For a website to become successfull, it should be user-friendly. User experience in terms of responsiveness, speed and effectiveness is the key to a good site.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="featured-box style-3">
                    <div class="featured-box-icon text-primary border border-dark rounded-circle"> <i class="fas fa-layer-group"></i> </div>
                    <h3 class="text-white">Highly Optimized sites</h3>
                    <p class="text-white-50 mb-0">Optimization increases the performance of the website, thereby bringing traffic to the site. Website optimization is the base of building a strong online presence.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="featured-box style-3">
                    <div class="featured-box-icon text-primary border border-dark rounded-circle"> <i class="fas fa-mobile-alt"></i> </div>
                    <h3 class="text-white">Responsive Layout</h3>
                    <p class="text-white-50 mb-0">Responsive website layout is all about reaching every kind of device users. Being accessible to each user helps in building healthy relations.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="featured-box style-3">
                    <div class="featured-box-icon text-primary border border-dark rounded-circle"> <i class="fas fa-expand-alt"></i> </div>
                    <h3 class="text-white">Budget friendly</h3>
                    <p class="text-white-50 mb-0">Transfer your ideas to reality at the best rate in town. Using the best technology to build your website with budget friendly approach.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="featured-box style-3">
                    <div class="featured-box-icon text-primary border border-dark rounded-circle"> <i class="far fa-life-ring"></i> </div>
                    <h3 class="text-white">On Time Completion</h3>
                    <p class="text-white-50 mb-0">To meet client's time period is my motto. Completion of any project within the given time frame gives you, as well as the client, the statisfaction to work on more projects together.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Heading -->
        <div class="row mb-5">
            <div class="col-lg-9 col-xl-8 mx-auto text-center">
                <h3 class="fw-600 text-white mb-3">My Skills</h3>
                <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                <p class="text-4 text-white-50">With my experience as a web developer and web designer, I have polished my skill-set to match the competetive world.</p>
            </div>
        </div>
        <!-- Heading End 
            <div class="col-md-6 col-lg-6 text-center">
                <div class="hero-wrap section h-100 rounded shadow-lg p-5">
                    <div class="hero-mask opacity-5 bg-dark rounded"></div>
                    <div class="hero-bg hero-bg-scroll rounded" style="background-image:url('./images/why-choose.jpg');"></div>
                    <div class="hero-content h-100 d-flex flex-column align-items-center justify-content-center py-5"> <a class="btn-video-play popup-youtube" href="http://www.youtube.com/watch?v=7e90gBu4pas"><i class="fas fa-play"></i></a>
                        <p class="text-white fw-500 text-uppercase mt-3 mb-0">Play &amp; Watch!</p>
                    </div>
                </div>
            </div>-->
            <?php
						include("includes/database.php");
						
						$sklDBQue = "select * from skills ORDER BY 1 ASC";
						$run_sklDBQue = mysqli_query($con, $sklDBQue);
						$cnt_sklDBQue = mysqli_num_rows($run_sklDBQue);
						if($cnt_sklDBQue == 0){}else{
							while($row_ValQuer = mysqli_fetch_array($run_sklDBQue)){
								
								$fch_skillID = $row_ValQuer["skill_id"];
								$fch_skillName = $row_ValQuer["skill_name"];
								$fch_skillPerc = $row_ValQuer["skill_percentage"];
													
					?>
            <div class="col-md-6 col-lg-6 align-self-center mt-5 mt-md-0">
                <div class="px-lg-4">
                    <p class="text-light fw-500 text-start mb-2"><?php echo $fch_skillName; ?> <span class="float-end counter" data-from="0" data-to="<?php echo $fch_skillPerc; ?>"><?php echo $fch_skillPerc; ?>%</span></p>
                    <div class="progress progress-sm bg-dark-2 mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $fch_skillPerc; ?>%" aria-valuenow="<?php echo $fch_skillPerc; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
    </div>
</section>