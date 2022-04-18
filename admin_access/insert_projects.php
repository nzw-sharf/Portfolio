<?php
session_start();
include("../includes/database.php");

if (!$_SESSION["adminPanel_email"]) {
    header("location: ../index.php?error=Please-Provide-Your-Login-Details-Thanks.");
} else {

    $user_a = @$_SESSION["adminPanel_email"];

    $get_user_a = "select * from admin where admin_email = '$user_a'";
    $run_user_a = mysqli_query($con, $get_user_a);
    $row_a = mysqli_fetch_array($run_user_a);

    $adm_id_a = $row_a["admin_id"];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Create Projects <?php echo $fullTitle; ?></title>
        <?php include("includes/head.php"); ?>

    </head>

    <body>
        <div id="app">
            <div id="sidebar" class='active'>
                <div class="sidebar-wrapper active">
                    <?php include("includes/side-bar.php"); ?>
                </div>
            </div>

            <div id="main">
                <?php include("includes/nav-section.php"); ?>

                <div class="main-content container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Create Projects</h3>
                                <?php include("includes/page-subtitle.php"); ?>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Insert Projects</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <section id="multiple-column-form">
                        <div class="row match-height">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form action="" class="form" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT TITLE</label>
                                                            <input type="text" class="form-control form-control-lg" name="project_title" placeholder="Project Title *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                     <!-- Line -->
                                                     <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT CATEGORY</label>
                                                            <select class="choices form-select" name="project_cat" required>
                                                                <option value="" disabled selected>Select Service Category</option>
                                                                <?php
                                                                    $getCat = mysqli_query($con,"select * from portfolio_category");
                                                                    if(mysqli_num_rows($getCat)<=0){}else{
                                                                        while($rowCat = mysqli_fetch_array($getCat)){
                                                                            $catId = $rowCat["cat_id"];
                                                                            $catName = $rowCat["category_name"];
                                                                            echo "<option value='$catId'>$catName</option>";
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                     <!-- Line -->
                                                     <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">CLIENT NAME</label>
                                                            <input type="text" class="form-control form-control-lg" name="project_client" placeholder="Client Name *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                     <!-- Line -->
                                                     <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT URL</label>
                                                            <input type="url" class="form-control form-control-lg" name="project_url" placeholder="Project URL *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                     <!-- Line -->
                                                     <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT TECHNOLOGY</label>
                                                            <textarea class="form-control form-control-lg" name="project_technology" placeholder="Project Technology *" required></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                     <!-- Line -->
                                                     <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT DATE</label>
                                                            <input type="date" class="form-control form-control-lg" name="project_date" placeholder="Project Date *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT DESCRIPTION</label>
                                                            <textarea class="form-control form-control-lg" name="project_info" placeholder="Project Description *" required></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                   
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT IMAGE</label>
                                                            <div class="form-file">
                                                                <input type="file" name="imgFile" class="form-file-input" id="file" required />
                                                                <label class="form-file-label" for="customFile">
                                                                    <span class="form-file-text">Max. file size - 100kb | Dimension {800x600}</span>
                                                                    <span class="form-file-button">Browse</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <?php @$msgV = $_GET["msg"];
                                                    if (isset($_GET["msg"])) {
                                                        echo "<span style='color:red; font-weight:bold;'>" . $msgV . "</span>";
                                                    } else {
                                                    } ?>
                                                    <hr />
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-lg btn-primary mr-1 mb-1 upload_project" name="upload_project">Upload Project</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            include("../includes/database.php");
                                            if (isset($_POST["upload_project"])) {
                                                $project_title = mysqli_real_escape_string($con, $_POST["project_title"]);
                                                $project_cat = mysqli_real_escape_string($con, $_POST["project_cat"]);
                                                $project_client = mysqli_real_escape_string($con, $_POST["project_client"]);
                                                $project_url = mysqli_real_escape_string($con, $_POST["project_url"]);
                                                $project_technology = mysqli_real_escape_string($con, $_POST["project_technology"]);
                                                $project_date = mysqli_real_escape_string($con, $_POST["project_date"]);
                                                $project_info = mysqli_real_escape_string($con, $_POST["project_info"]);

                                                $imgFile = $_FILES["imgFile"]["name"];

                                                $file_ext = pathinfo($imgFile, PATHINFO_EXTENSION);
                                                $Nu_imgFile_name = time() . "." . $file_ext;

                                                $imgFile_tmp = $_FILES["imgFile"]["tmp_name"];

                                                move_uploaded_file($imgFile_tmp, "../images/projects/$Nu_imgFile_name");

                                                $insert_query = "insert into project (admin_id, cat_id, project_title, project_info, project_client, project_url, project_technology, project_date, project_image, upload_date) values ('$adm_id_a','$project_cat','$project_title','$project_info','$project_client','$project_url','$project_technology','$project_date','$Nu_imgFile_name',NOW())";

                                                $run_query    = mysqli_query($con, $insert_query);

                                                if ($run_query) {
                                                    echo "<script>window.open('insert_projects.php?msg=Project Details has been Published Successfully','_self')</script>";
                                                } else {
                                                    echo "<script>window.open('insert_projects.php?msg=There Was A Problem, Please Try Again!','_self')</script>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>

            </div>

            <?php include("includes/footer.php"); ?>
            <script>
                $(document).ready(function() {

                    //Image Size & Extension Verification
                    $("input[type='file']").change(function(e) {
                        var fileSize = e.target.files[0].size;
                        var fileName = $("#file").val();
                        var fileExtension = fileName.split(".");
                        fileExtension = fileExtension[fileExtension.length - 1].toLowerCase();
                        var arrayExtensions = ["jpg", "jpeg", "png", "bmp", "gif"];

                        if (arrayExtensions.lastIndexOf(fileExtension) == -1) {
                            swal({
                                title: "Please Select Another File, Thanks!",
                                text: "Thanks for Using Shoot At Sight!",
                                icon: "warning",
                                button: "Click to Continue!",
                            });
                            $("#file").val("");
                        } else if (fileSize > 100000) {
                            swal({
                                title: "Please Reduce Your Image Size, Thanks!",
                                text: "Thanks for Using Shoot At Sight!",
                                icon: "warning",
                                button: "Click to Continue!",
                            });
                            $("#file").val("");
                        } else {
                            //$("#imgName").text( $("#file").val() );
                        }

                    }); //Image Size Verification

                    //Image Dimension Verification
                    var _URL = window.URL || window.webkitURL;
                    $("#file").change(function() {
                        var file = $(this)[0].files[0];
                        img = new Image();
                        var imgwidth = 0;
                        var imgheight = 0;
                        var allowedWidth = 800;
                        var allowedHeight = 600;

                        img.src = _URL.createObjectURL(file);
                        img.onload = function() {
                            imgwidth = this.width;
                            imgheight = this.height;

                            if (imgwidth == allowedWidth && imgheight == allowedHeight) {
                                //$("#imgName").text( $("#file").val() );
                            } else {
                                $("#file").val("");
                                swal({
                                    title: "Please Follow The Recommended Dimensions, Thanks!",
                                    text: "Thanks for Using Shoot At Sight!",
                                    icon: "warning",
                                    button: "Click to Continue!",
                                });
                            }
                        };

                    }); //Image Dimension Verification

                });
            </script>

    </body>

    </html>
<?php } ?>