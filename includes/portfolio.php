<section id="portfolio" class="section bg-dark-1">
    <div class="container">
        <!-- Heading -->
        <div class="row mb-5">
            <div class="col-lg-9 col-xl-8 mx-auto text-center">
                <h2 class="fw-600 text-white mb-3">My Best Works</h2>
                <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                <p class="text-4 text-white-50">I help you build your dream website for your business at an affordable price.</p>
            </div>
        </div>
        <!-- Heading End -->

        <!-- Filter Menu -->
        <ul class="portfolio-menu nav nav-pills nav-light text-uppercase justify-content-center border-bottom-0 mb-5">
            <li class="nav-item"> <a data-filter="*" class="nav-link rounded-pill active" href="">All</a></li>
            <?php
            include("includes/database.php");


            $categDBQue = "select * from portfolio_category ORDER BY 1 ASC";
            $run_categDBQue = mysqli_query($con, $categDBQue);
            $cnt_categDBQue = mysqli_num_rows($run_categDBQue);
            if ($cnt_categDBQue == 0) {
            } else {
                while ($row_ValQuer = mysqli_fetch_array($run_categDBQue)) {

                    $fch_catID = $row_ValQuer["cat_id"];
                    $fch_catName = $row_ValQuer["category_name"];
                    $fch_catSlug = $row_ValQuer["category_slug"];

            ?>
                    <li class="nav-item"> <a data-filter=".<?php echo $fch_catSlug; ?>" href="" class="nav-link rounded-pill"><?php echo $fch_catName; ?></a></li>
            <?php }
            } ?>
        </ul>
        <!-- Filter Menu end -->

        <div class="portfolio popup-ajax-gallery">
            <div class="row portfolio-filter g-4">
                <?php
                include("includes/database.php");


                $proDBQue = "select * from project ORDER BY 1 DESC";
                $run_proDBQue = mysqli_query($con, $proDBQue);
                $cnt_proDBQue = mysqli_num_rows($run_proDBQue);
                if ($cnt_proDBQue == 0) {
                } else {
                    while ($row_ValQuer = mysqli_fetch_array($run_proDBQue)) {

                        $fch_pro_id  = $row_ValQuer["project_id"];
                        $fch_pro_title = $row_ValQuer["project_title"];
                        $fch_pro_img = $row_ValQuer["project_image"];
                        $fch_pro_cat = $row_ValQuer["cat_id"];

                        $get_value = "select * from portfolio_category where cat_id = '$fch_pro_cat'";
                        $run_value = mysqli_query($con, $get_value);
                        $row_val = mysqli_fetch_array($run_value);

                        $fch_catName1 = $row_val["category_name"];
                        $fch_catslug1 = $row_val["category_slug"];


                ?>
                        <div class="col-sm-6 col-lg-4 <?php echo $fch_catslug1; ?>">
                            <div class="portfolio-box rounded">
                                <div class="portfolio-img rounded"> <img class="img-fluid d-block" src="images/projects/<?php echo $fch_pro_img; ?>" alt="">
                                    <div class="portfolio-overlay"> <a class="popup-ajax stretched-link" href="ajax/project-ajax.php?proIDEF=<?php echo $fch_pro_id; ?>"></a>
                                        <div class="portfolio-overlay-details">
                                            <p class="text-white text-6"><i class="fas fa-plus"></i></p>
                                            <h5 class="text-white fw-400"><?php echo $fch_pro_title; ?></h5>
                                            <span class="text-light"><?php echo $fch_catName1; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</section>