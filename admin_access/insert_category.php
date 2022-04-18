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
        <title>Create Category - <?php echo $fullTitle; ?></title>
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
                                <h3>Create Category</h3>
                                <?php include("includes/page-subtitle.php"); ?>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Insert Category</li>
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
                                            <form action="" class="form" method="POST">
                                                <div class="row">
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">CATEGORY NAME</label>
                                                            <input type="text" class="form-control form-control-lg" name="category_name" placeholder="Category Name *" id="category_name" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-9 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">Unique Category Slug</label>
                                                            <input type="text" class="form-control form-control-lg" readonly id="url_slug" name="url_slug" placeholder="Category Slug *" required/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">Unique Category Slug</label>
                                                            <button class="btn btn-block btn-lg btn-primary createSlug">Generate Slug</button>
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->

                                                    <?php @$msgV = $_GET["msg"];
                                                    if (isset($_GET["msg"])) {
                                                        echo "<span style='color:red; font-weight:bold;'>" . $msgV . "</span>";
                                                    } else {
                                                    } ?>
                                                    <hr />
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-lg btn-primary mr-1 mb-1 upload_categ" name="upload_categ">Upload Category</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            include("../includes/database.php");
                                            if (isset($_POST["upload_categ"])) {
                                                $category_name = mysqli_real_escape_string($con, $_POST["category_name"]);
                                                $url_slug = mysqli_real_escape_string($con, $_POST["url_slug"]);

                                                $insert_query = "insert into portfolio_category (admin_id, category_name, category_slug, upload_date) values ('$adm_id_a','$category_name','$url_slug',NOW())";

                                                $run_query    = mysqli_query($con, $insert_query);

                                                if ($run_query) {
                                                    echo "<script>window.open('insert_category.php?msg=Category has been Published Successfully','_self')</script>";
                                                } else {
                                                    echo "<script>window.open('insert_category.php?msg=There Was A Problem, Please Try Again!','_self')</script>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <script>
                        $(document).ready(function() {
                            $(".createSlug").click(function(ev) {
                                ev.preventDefault();
                                var cat_head = $("#category_name").val();
                                if (cat_head == "") {
                                    swal({
                                        title: "Please Provide A Category Name",
                                        text: "Thanks for Using Website!",
                                        icon: "warning",
                                        button: "Click to Continue!",
                                    });
                                } else {
                                    $.ajax({
                                        url: "slugData.php",
                                        method: "POST",
                                        data: {
                                            send_slugData: 1,
                                            send_catTitle: cat_head
                                        },
                                        success: function(getData) {
                                            $("#url_slug").val(getData);
                                        }
                                    });
                                }
                            });



                        });
                    </script>
                </div>

            </div>

            <?php include("includes/footer.php"); ?>

    </body>

    </html>
<?php } ?>