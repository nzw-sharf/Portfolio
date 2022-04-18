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

    if (isset($_GET["proID"])) {

        $get_id = $_GET["proID"];
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
    } else {
        header("location: ./");
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Updating <?php echo $_proTitl; ?> - <?php echo $fullTitle; ?></title>
        <?php include("includes/head.php"); ?>

        <script>
            function numbersOnly(input) {
                var regex = /[^0-9.]/g;
                input.value = input.value.replace(regex, "");
            }
        </script>
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
                                <h3>Updating <?php echo $_proTitl; ?></h3>
                                <?php
                                @$_msvVal = $_GET["msg"];
                                if (isset($_GET["msg"])) {
                                    echo "<p style='color:red;'>$_msvVal</p>";
                                } else {
                                    include("includes/page-subtitle.php");
                                }
                                ?>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Updating <?php echo $_proTitl; ?></li>
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
                                                            <input type="text" class="form-control form-control-lg" value="<?php echo $_proTitl; ?>" name="project_title" placeholder="Project Title *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT CATEGORY</label>
                                                            <select class="choices form-select" name="project_cat" required>
                                                                <option value="<?php echo $_proCat; ?>" selected><?php echo $fch_catName; ?></option>
                                                                <option value="" disabled>Select Service Category</option>
                                                                <?php
                                                                $getCat = mysqli_query($con, "select * from portfolio_category");
                                                                if (mysqli_num_rows($getCat) <= 0) {
                                                                } else {
                                                                    while ($rowCat = mysqli_fetch_array($getCat)) {
                                                                        $catId = $rowCat["cat_id"];
                                                                        $catName = $rowCat["category_name"];
                                                                        if ($catId == $_proCat) {
                                                                        } else {
                                                                            echo "<option value='$catId'>$catName</option>";
                                                                        }
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
                                                            <input type="text" class="form-control form-control-lg" value="<?php echo $_proClnt; ?>" name="project_client" placeholder="Client Name *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT URL</label>
                                                            <input type="url" class="form-control form-control-lg" value="<?php echo $_proUrl; ?>" name="project_url" placeholder="Project URL *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT TECHNOLOGY</label>
                                                            <textarea class="form-control form-control-lg" name="project_technology" placeholder="Project Technology *" required><?php echo $_proTech; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT DATE</label>
                                                            <input type="date" class="form-control form-control-lg" value="<?php echo $_proDate; ?>" name="project_date" placeholder="Project Date *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT DESCRIPTION</label>
                                                            <textarea class="form-control form-control-lg" name="project_info" placeholder="Project Description *" required><?php echo $_proInfo; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->

                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">PROJECT IMAGE</label>
                                                            <div class="form-file">
                                                                <input type="file" name="imgFile" class="form-file-input" id="file" />
                                                                <label class="form-file-label" for="customFile">
                                                                    <span class="form-file-text">Max. file size - 100kb | Dimension {800x600}</span>
                                                                    <span class="form-file-button">Browse</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->

                                                    <hr />
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-lg btn-primary mr-1 mb-1" name="update_project">Update Project</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php

                                            include("../includes/database.php");

                                            if (isset($_POST["update_project"])) {

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

                                                if ($imgFile == "") {
                                                    $imgFile = $_proImg;

                                                    $update_query = "update project set admin_id = '$adm_id_a', cat_id='$project_cat',project_title='$project_title',project_info='$project_info',project_client='$project_client',project_url='$project_url',project_technology='$project_technology',project_date='$project_date',project_image='$imgFile',upload_date=NOW() where project_id = '$get_id'";

                                                    $run_query    = mysqli_query($con, $update_query);

                                                    if ($run_query) {
                                                        echo "<script>window.open('projects.php?msg=project Details has been Updated Successfully!','_self')</script>";
                                                    } else {
                                                        echo "<script>window.open('projects.php?msg=There Was A Problem, Please Try Again!','_self')</script>";
                                                    }
                                                } else {
                                                    move_uploaded_file($imgFile_tmp, "../images/projects/$Nu_imgFile_name");

                                                    $update_query = "update project set admin_id = '$adm_id_a', cat_id='$project_cat',project_title='$project_title',project_info='$project_info',project_client='$project_client',project_url='$project_url',project_technology='$project_technology',project_date='$project_date',project_image='$Nu_imgFile_name',upload_date=NOW() where project_id = '$get_id'";

                                                    $run_query    = mysqli_query($con, $update_query);

                                                    if ($run_query) {
                                                        echo "<script>window.open('projects.php?msg=project Details has been Updated Successfully!','_self')</script>";
                                                    } else {
                                                        echo "<script>window.open('projects.php?msg=There Was A Problem, Please Try Again!','_self')</script>";
                                                    }
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="page-title my-3">
                        <div class="row">
                            <div class="col-12 col-md-12 order-md-1 order-last">
                                <h3 class="float-left">Additional Image of Project</h3>
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
                                                            <label for="basicInput">Project Additional Image</label>
                                                            <div class="form-file">
                                                                <input type="file" name="imgFileAdd" class="form-file-input" id="file1" />
                                                                <label class="form-file-label" for="customFile">
                                                                    <span class="form-file-text">Max. file size - 100kb | Dimension {800x600}</span>
                                                                    <span class="form-file-button">Browse</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->

                                                    <hr>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-lg btn-primary mr-1 mb-1" name="submit_img">Submit Image</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php

                                            include("../includes/database.php");

                                            if (isset($_POST["submit_img"])) {

                                                $imgFileAdd = $_FILES["imgFileAdd"]["name"];

                                                $file_ext = pathinfo($imgFileAdd, PATHINFO_EXTENSION);
                                                $Nu_imgFileAdd_name = time() . "." . $file_ext;

                                                $imgFileAdd_tmp = $_FILES["imgFileAdd"]["tmp_name"];

                                                move_uploaded_file($imgFileAdd_tmp, "../images/projects/$Nu_imgFileAdd_name");

                                                $_updatQuery = "INSERT INTO project_images(project_id, project_image, upload_date) VALUES ('$get_id','$Nu_imgFileAdd_name',NOW())";
                                                $run_updatQuery = mysqli_query($con, $_updatQuery);

                                                if ($run_updatQuery) {
                                                    echo "<script>window.open('edit-project.php?proID=$get_id &&msg=Image Has Been Added Successfully!','_self')</script>";
                                                }
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            include("../includes/database.php");
                            $get_vid_qu = mysqli_query($con, "select * from project_images where project_id = '$get_id'");
                            $_cnt_vid_qu = mysqli_num_rows($get_vid_qu);
                            if ($_cnt_vid_qu <= 0) {
                            } else {
                                while ($row_port_qu = mysqli_fetch_array($get_vid_qu)) {
                                    $_img_Id = $row_port_qu["image_id"];
                                    $_projctImg = $row_port_qu["project_image"];
                            ?>
                                    <div class="col-12 col-xl-4 col-md-4 vidDivBox">
                                        <div class="card">
                                            <div class="card-content">
                                                <img src="../images/projects/<?php echo $_projctImg ?>" class="card-img-top img-fluid" alt="">
                                                <div class="card-body">
                                                    <center>
                                                        <button type="reset" delvidid="<?php echo $_img_Id; ?>" class="btn btn-outline-primary delVidBtn">Delete</button>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>

                    </section>

                </div>

                <script>
                    $(document).ready(function() {

                        //Image Size & Extension Verification
                        $("#file").change(function(e) {
                            var fileSize = e.target.files[0].size;
                            var fileName = $("#file").val();
                            var fileExtension = fileName.split(".");
                            fileExtension = fileExtension[fileExtension.length - 1].toLowerCase();
                            var arrayExtensions = ["jpg", "jpeg", "png", "bmp", "gif"];

                            if (arrayExtensions.lastIndexOf(fileExtension) == -1) {
                                swal({
                                    title: "Please Select Another File, Thanks!",
                                    text: "Thanks for Using website!",
                                    icon: "warning",
                                    button: "Click to Continue!",
                                });
                                $("#file").val("");
                            } else if (fileSize > 100000) {
                                swal({
                                    title: "Please Reduce Your Image Size, Thanks!",
                                    text: "Thanks for Using website!",
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
                                        text: "Thanks for Using website!",
                                        icon: "warning",
                                        button: "Click to Continue!",
                                    });
                                }
                            };

                        }); //Image Dimension Verification

                        //deleting contact messages
                        $("body").delegate(".delVidBtn", "click", function() {
                            var delButtonID = $(this).attr("delvidid");
                            var el = this;
                            if (confirm("Confirm Delete!")) {
                                $.ajax({
                                    type: "POST",
                                    url: "delete_image.php",
                                    data: {
                                        send_idef_val: delButtonID
                                    },
                                    success: function(new_entry) {
                                        $(el).closest(".vidDivBox").css("background", "skyblue");
                                        $(el).closest(".vidDivBox").fadeOut(800, function() {
                                            $(el).remove();
                                            swal({
                                                title: new_entry,
                                                text: "Thanks for Using website!",
                                                icon: "success",
                                                button: "Click to Continue!",
                                            });

                                        });
                                    }
                                });
                            }
                        });

                    });
                </script>

                <?php include("includes/footer.php"); ?>
    </body>

    </html>
<?php } ?>