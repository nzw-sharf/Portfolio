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
        <title>Create Skills - <?php echo $fullTitle; ?></title>
        <?php include("includes/head.php"); ?>

        <script>
            function numbersOnly(input) {
                var regex = /[^0-9a-z-]/g;
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
                                <h3>Create Skill</h3>
                                <?php include("includes/page-subtitle.php"); ?>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Insert Skill</li>
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
                                                            <label for="basicInput">SKILL TITLE</label>
                                                            <input type="text" class="form-control form-control-lg" name="skill_title" placeholder="Skill Title *" required />
                                                        </div>
                                                    </div>
                                                    <!-- Line -->
                                                    <!-- Line -->
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="basicInput">SKILL PERCENTAGE</label>
                                                            <input type="number" class="form-control form-control-lg" onkeyup="numbersOnly(this)" name="skill_percent" placeholder="Skill Percentage *" required />
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
                                                        <button type="submit" class="btn btn-lg btn-primary mr-1 mb-1 upload_skill" name="upload_skill">Upload Skill</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            include("../includes/database.php");
                                            if (isset($_POST["upload_skill"])) {
                                                $skill_title = mysqli_real_escape_string($con, $_POST["skill_title"]);
                                                $skill_percent = mysqli_real_escape_string($con, $_POST["skill_percent"]);

                                                $insert_query = "insert into skills (admin_id, skill_name, skill_percentage, upload_date) values ('$adm_id_a','$skill_title','$skill_percent',NOW())";

                                                $run_query    = mysqli_query($con, $insert_query);

                                                if ($run_query) {
                                                    echo "<script>window.open('insert_skills.php?msg=Skill has been Published Successfully','_self')</script>";
                                                } else {
                                                    echo "<script>window.open('insert_skills.php?msg=There Was A Problem, Please Try Again!','_self')</script>";
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