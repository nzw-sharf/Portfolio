<?php
include("../includes/database.php");
if (isset($_GET["proIDEF"])) {

  $get_id = $_GET["proIDEF"];
  $run_val = mysqli_query($con, "select * from project where project_id = '$get_id'");
  $row_val = mysqli_fetch_array($run_val);

  $_proCat = $row_val["cat_id"];
  $_proTitl = $row_val["project_title"];
  $_proInfo = $row_val["project_info"];
  $_proClnt = $row_val["project_client"];
  $_proUrl = $row_val["project_url"];
  $_proTech = $row_val["project_technology"];
  $_proDate = $row_val["project_date"];
  $_proImg = $row_val["project_image"];
  $_UplDate = $row_val["upload_date"];

  $get_value = "select * from portfolio_category where cat_id = '$_proCat'";
  $run_value = mysqli_query($con, $get_value);
  $row_val1 = mysqli_fetch_array($run_value);

  $fch_catName = $row_val1["category_name"];

?>
  <div class="container ajax-container bg-dark-1">
    <h2 class="text-6 fw-600 text-center text-white mb-4"><?php echo $_proTitl; ?></h2>
    <div class="row g-4">
      <div class="col-sm-7">
        <div class="owl-carousel owl-theme owl-light single-slideshow" data-autoplay="true" data-loop="true" data-nav="true" data-items="1">
          <?php
          $getProImg = mysqli_query($con, "select * from project_images where project_id='$get_id'");
          if (mysqli_num_rows($getProImg) <= 0) {
          ?>
            <div class="item"> <img class="img-fluid" alt="<?php echo $_proTitl; ?>" src="images/projects/<?php echo $_proImg; ?>"> </div>
            <?php
          } else {
            ?>
            <div class="item"> <img class="img-fluid" alt="<?php echo $_proTitl; ?>" src="images/projects/<?php echo $_proImg; ?>"> </div>
           <?php
            while ($rowProImg = mysqli_fetch_array($getProImg)) {
              $imgName = $rowProImg["project_image"];
            ?>
              <div class="item"> <img class="img-fluid" alt="<?php echo $_proTitl; ?>" src="images/projects/<?php echo $imgName; ?>"> </div>
          <?php }
          } ?>
        </div>
      </div>
      <div class="col-sm-5 my-auto">
        <h4 class="text-4 fw-600 text-white">Project Info:</h4>
        <p class="text-white-50"><?php echo $_proInfo; ?></p>
        <h4 class="text-4 fw-600 text-white mt-4">Project Details:</h4>
        <ul class="list-style-2 list-style-light text-white-50">
          <li class=""><span class="text-light fw-600 me-2">Client: </span><?php echo $_proClnt; ?></li>
          <li class=""><span class="text-light fw-600 me-2">Technologies: </span><?php echo $_proTech; ?></li>
          <li class=""><span class="text-light fw-600 me-2">Date: </span><?php echo DATE('d M, Y', strtotime($_proDate)); ?></li>
          <li class=""><span class="text-light fw-600 me-2">URL: </span><a href="<?php echo $_proUrl; ?>" target="_blank"><?php echo $_proUrl; ?></a></li>
        </ul>
      </div>
    </div>

  </div>
<?php } ?>