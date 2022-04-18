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
        <title>Create Services - <?php echo $fullTitle; ?></title>
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
                                <h3>Create Services</h3>
                                <?php include("includes/page-subtitle.php"); ?>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Insert Services</li>
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
                                                            <label for="basicInput">SERVICE ICON</label>
                                                            <input type="text" class="form-control form-control-lg" name="serv_icon" placeholder="Service Fontawesome Icon *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">SERVICE NAME</label>
                                                            <input type="text" class="form-control form-control-lg" name="serv_name" placeholder="Service Name *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">SERVICE DESCRIPTION</label>
                                                            <textarea class="form-control form-control-lg" name="serv_desc" placeholder="Service Description *" required></textarea>
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
                                                        <button type="submit" class="btn btn-lg btn-primary mr-1 mb-1 upload_service" name="upload_service">Upload Service</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            include("../includes/database.php");
                                            if (isset($_POST["upload_service"])) {
                                                $serv_icon = mysqli_real_escape_string($con, $_POST["serv_icon"]);
                                                $serv_name = mysqli_real_escape_string($con, $_POST["serv_name"]);
                                                $serv_desc = mysqli_real_escape_string($con, $_POST["serv_desc"]);

                                                $insert_query = "insert into services (admin_id, service_icon, service_name, service_description, upload_date) values ('$adm_id_a','$serv_icon','$serv_name','$serv_desc',NOW())";

                                                $run_query    = mysqli_query($con, $insert_query);

                                                if ($run_query) {
                                                    echo "<script>window.open('insert_services.php?msg=Service has been Published Successfully','_self')</script>";
                                                } else {
                                                    echo "<script>window.open('insert_services.php?msg=There Was A Problem, Please Try Again!','_self')</script>";
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

    </body>

    </html>
<?php } ?>