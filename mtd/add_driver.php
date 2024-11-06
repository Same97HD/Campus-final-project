<?php
include "../connection.php";

session_start();
if (isset($_SESSION['mtd_id']) && isset($_SESSION['mtd_email'])) {
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Driver | Motor Traffic Department</title>

    <!-- Elements inside the head tag includes goes here -->
    <?php 
        include_once '../includes/header.php';
    ?>
    <script>
        function validateForm() {
            const licenseId = document.getElementById("license_id").value.trim();
            const driverEmail = document.getElementById("driver_email").value.trim();
            const driverPassword = document.getElementById("driver_password").value;
            const confirmPassword = document.getElementById("driver_password_confirm").value;
            const driverName = document.getElementById("driver_name").value.trim();
            const classOfVehicle = document.getElementById("class_of_vehicle").value.trim();
            const homeAddress = document.getElementById("home_address").value.trim();
            const licenseIssueDate = document.getElementById("license_issue_date").value;
            const licenseExpireDate = document.getElementById("license_expire_date").value;

            if (!licenseId) {
                alert("License ID is required.");
                return false;
            }
            if (!driverEmail) {
                alert("Driver Email is required.");
                return false;
            }
            if (!driverPassword || !confirmPassword) {
                alert("Both password fields are required.");
                return false;
            }
            if (driverPassword !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            if (!driverName) {
                alert("Driver Full Name is required.");
                return false;
            }
            if (!classOfVehicle) {
                alert("Class of Vehicle is required.");
                return false;
            }
            if (!homeAddress) {
                alert("Driver Address is required.");
                return false;
            }
            if (!licenseIssueDate) {
                alert("License Issue Date is required.");
                return false;
            }
            if (!licenseExpireDate) {
                alert("License Expire Date is required.");
                return false;
            }
            if (new Date(licenseIssueDate) > new Date(licenseExpireDate)) {
                alert("License Expire Date must be after License Issue Date.");
                return false;
            }

            return true; // All validations passed
        }
    </script>
</head>

<body class="overlay-scrollbar">

    <!-- Top navigation bar includes goes here -->
    <?php 
        include 'includes/topNav.php';
    ?>

    <!-- Left sidebar navigation start here -->
    <div class="leftsidebar overlay-scrollbar scrollbar-hover">
        <ul class="leftsidebar-nav overlay-scrollbar scrollbar-hover">
            <!-- Left sidebar navigation items -->
            <li class="leftsidebar-nav-item">
                <a href="dashboard.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="add_driver.php" class="leftsidebar-nav-link active">
                    <div>
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <span>Add Driver</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="view_all_drivers.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-users"></i>
                    </div>
                    <span>View All Drivers</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Left sidebar navigation end here -->

    <!-- Dashboard main content start here -->
    <div class="dashwrapper animated fadeIn">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                <h1 class="mt-4">Add Driver</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Driver</li>
                </ol>

                <!-- Warning msg goes here -->
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" id="success-alert">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo $_GET['error']; ?>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" id="success-alert">
                        <i class="fas fa-check-circle"></i>
                        <?php echo $_GET['success']; ?>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                <?php } ?>

                <div class="card mb-4">
                    <div class="card-body p-lg-5">
                        <form action="add_driver_action.php" method="POST" onsubmit="return validateForm()">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="license_id">License ID</label>
                                    <?php if (isset($_GET['licenseid'])) { ?>
                                        <input type="text" class="form-control" id="license_id" name="licenseid" placeholder="License ID" value="<?php echo $_GET['licenseid']; ?>">
                                    <?php } else { ?>
                                        <input type="text" class="form-control" id="license_id" name="licenseid" placeholder="License ID">
                                    <?php } ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="driver_email">Driver Email</label>
                                    <?php if (isset($_GET['driveremail'])) { ?>
                                        <input type="text" class="form-control" id="driver_email" name="driveremail" placeholder="Driver Email" value="<?php echo $_GET['driveremail']; ?>">
                                    <?php } else { ?>
                                        <input type="text" class="form-control" id="driver_email" name="driveremail" placeholder="Driver Email">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="driver_password">Driver Password</label>
                                    <input type="password" class="form-control" id="driver_password" name="driverpassword" placeholder="Driver Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="driver_password_confirm">Confirm Password</label>
                                    <input type="password" class="form-control" id="driver_password_confirm" name="cdriverpassword" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="driver_name">Driver Full Name</label>
                                    <?php if (isset($_GET['drivername'])) { ?>
                                        <input type="text" class="form-control" id="driver_name" name="drivername" placeholder="Driver Full Name" value="<?php echo $_GET['drivername']; ?>">
                                    <?php } else { ?>
                                        <input type="text" class="form-control" id="driver_name" name="drivername" placeholder="Driver Full Name">
                                    <?php } ?>
                                </div>
                                <div class="form-group col-md-6">
    <label for="class_of_vehicle">Class of Vehicle</label>
    <select class="form-control" id="class_of_vehicle" name="classofvehicle">
        <option disabled selected>Choose class of vehicle</option>
        <option value="A,A1,B" <?php if (isset($_GET['classofvehicle']) && $_GET['classofvehicle'] == 'A,A1,B') echo 'selected'; ?>>A, A1, B</option>
        <option value="B,B1" <?php if (isset($_GET['classofvehicle']) && $_GET['classofvehicle'] == 'B,B1') echo 'selected'; ?>>B, B1</option>
        <option value="A,A1,B,B1" <?php if (isset($_GET['classofvehicle']) && $_GET['classofvehicle'] == 'A,A1,B,B1') echo 'selected'; ?>>A, A1, B, B1</option>
        <option value="A,B,B2,C" <?php if (isset($_GET['classofvehicle']) && $_GET['classofvehicle'] == 'A,B,B2,C') echo 'selected'; ?>>A, B, B2, C</option>
        <option value="A,A1,B,C,C1" <?php if (isset($_GET['classofvehicle']) && $_GET['classofvehicle'] == 'A,A1,B,C,C1') echo 'selected'; ?>>A, A1, B, C, C1</option>
        <!-- Add more options as needed based on specific categories -->
    </select>
</div>

                            <div class="form-group">
                                <label for="home_address">Driver Address</label>
                                <?php if (isset($_GET['homeaddress'])) { ?>
                                    <input type="text" class="form-control" id="home_address" name="homeaddress" placeholder="Driver Address" value="<?php echo $_GET['homeaddress']; ?>">
                                <?php } else { ?>
                                    <input type="text" class="form-control" id="home_address" name="homeaddress" placeholder="Driver Address">
                                <?php } ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="license_issue_date">License Issue Date</label>
                                    <?php if (isset($_GET['licenseissuedate'])) { ?>
                                        <input type="date" class="form-control" id="license_issue_date" name="licenseissuedate" value="<?php echo $_GET['licenseissuedate']; ?>">
                                    <?php } else { ?>
                                        <input type="date" class="form-control" id="license_issue_date" name="licenseissuedate">
                                    <?php } ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="license_expire_date">License Expire Date</label>
                                    <?php if (isset($_GET['licenseexpiredate'])) { ?>
                                        <input type="date" class="form-control" id="license_expire_date" name="licenseexpiredate" value="<?php echo $_GET['licenseexpiredate']; ?>">
                                    <?php } else { ?>
                                        <input type="date" class="form-control" id="license_expire_date" name="licenseexpiredate">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Add Driver</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard main content end here -->

    <!-- Footer includes goes here -->
    <?php include_once '../includes/footer.php'; ?>

</body>

</html>

<?php
} else {
    header("Location: login.php");
}
?>