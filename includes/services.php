<section id="services" class="section bg-dark-1">
    <div class="container">

        <!-- Heading -->
        <div class="row mb-4">
            <div class="col-lg-9 col-xl-8 mx-auto text-center">
                <h2 class="fw-600 text-white mb-3">My Services</h2>
                <hr class="heading-separator-line bg-primary opacity-10 mx-auto">
                <p class="text-4 text-white-50">I have solution to all your development and designing needs. Many clients have procured exceptional results while working with Me</p>
            </div>
        </div>
        <!-- Heading End -->

        <div class="row g-4">
            <?php
            include("includes/database.php");

            $servDBQue = "select * from services ORDER BY 1 ASC";
            $run_servDBQue = mysqli_query($con, $servDBQue);
            $cnt_servDBQue = mysqli_num_rows($run_servDBQue);
            if ($cnt_servDBQue == 0) {
            } else {
                while ($row_ValQuer = mysqli_fetch_array($run_servDBQue)) {

                    $fch_servID = $row_ValQuer["service_id"];
                    $fch_servIcon = $row_ValQuer["service_icon"];
                    $fch_servName = $row_ValQuer["service_name"];
                    $fch_servDesc = $row_ValQuer["service_description"];

            ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="featured-box bg-dark text-center rounded shadow-sm py-5 px-4">
                            <div class="featured-box-icon text-primary mt-2"> <i class="<?php echo $fch_servIcon; ?>"></i> </div>
                            <h3 class="text-white mb-3"><?php echo $fch_servName; ?></h3>
                            <p class="text-white-50 mb-0"><?php echo $fch_servDesc; ?></p>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</section>