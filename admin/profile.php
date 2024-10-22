<?php
include "../connection.php";

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['admin_email'])) {
?>


<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile | Traffic Police Admin</title>

    <!--Elements inside the head tag includes goes here-->
    <?php 
        include_once '../includes/header.php';
    ?>

</head>


<body class="overlay-scrollbar">

    <!--Top navigation bar includes goes here-->
    <?php 
        include 'includes/topNav.php';
    ?>


    <!--==================================================================================================================================SECTION_02====================================================================================================================================-->

    <!-- Left sidebar navigation start here =============================================-->
    <div class="leftsidebar overlay-scrollbar scrollbar-hover">
        <ul class="leftsidebar-nav overlay-scrollbar scrollbar-hover">
            <!--Left sidebar navigation items-->
            <li class="leftsidebar-nav-item">
                <a href="dashboard.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="add_traffic_officer.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-address-card"></i>
                    </div>
                    <span>Add Traffic Officer</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="view_all_traffic_officers.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <span>View All Traffic Officers</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="mtd_account.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-building"></i>
                    </div>
                    <span>MTD Account</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="fine_tickets.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-receipt"></i>
                    </div>
                    <span>Fine Tickets</span>
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
            <li class="leftsidebar-nav-item">
                <a href="paid_fine_tickets.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-check-double"></i>
                    </div>
                    <span>Paid Fine Tickets</span>
                </a>
            </li>
            <li class="leftsidebar-nav-item">
                <a href="pending_fine_tickets.php" class="leftsidebar-nav-link">
                    <div>
                        <i class="fas fa-pause"></i>
                    </div>
                    <span>Pending Fine Tickets</span>
                </a>
            </li>
            <!--Left sidebar navigation items-->
        </ul>
    </div>
    <!-- Left sidebar navigation end here ============================================-->




    <!--==================================================================================================================================SECTION_03====================================================================================================================================-->

    <!-- Dashboard main content start here =================================================-->
    <div class="dashwrapper animated fadeIn">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                <h1 class="mt-4">Edit Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
				<?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-danger" id="success-alert">
						<i class="fas fa-exclamation-circle"></i>
						<?php echo $_GET['error']; ?>
						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
				<?php } ?>
                <!-- Edit profile password sucess msg goes here -->
                <?php if (isset($_GET['success'])) { ?>
						<div class="alert alert-success" id="success-alert">
						<i class="fas fa-check-circle"></i>
						<?php echo $_GET['success']; ?>
  						<button type="button" class="close" data-dismiss="alert">&times;</button>
					</div>
				<?php } ?>
                <div class="card mb-4">
                    <div class="card-body p-lg-5">

                        <!--Edit profile Email goes here-->
                        <form action="profile_action_email.php" method="POST">
							<h4>Change your Email Address | Traffic Police Admin</h4>
							<div class="form-row">
								<div class="form-group col-md-9">
									<input type="email" class="form-control" id="change_email" name="changeemail" placeholder="Type your new email here" >
								</div>
								<div class="form-group col-md-3">
									<button type="submit" name="change-email" class="btn btn-primary"><i class="fas fa-save"></i> Save changes</button>
								</div>
							</div>
						</form>

                        <span class="row m-3"></span>

                        <!--Edit profile Password goes here-->
                        <form action="profile_action_password.php" method="POST">
							<h4 class="mt-5">Change your Password | Traffic Police Admin</h4>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="old_password">Old Password</label>
									<input type="password" class="form-control" id="old_password" name="oldpassword" placeholder="Type your old password">
								</div>
								<div class="form-group col-md-4">
									<label for="new_password">New Password</label>
									<input type="password" class="form-control" id="new_password" name="newpassword" placeholder="Type your new password">
								</div>
								<div class="form-group col-md-4">
									<label for="password_confirm">Confirm New Password</label>
									<input type="password" class="form-control" id="password_confirm" name="passwordconfirm" placeholder="Confirm your new password">
								</div>
							</div>
							<button type="submit" name="change-password" class="btn btn-primary"><i class="fas fa-save"></i> Save changes</button>
						</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard main content end here ========================================-->


    <!--Javascripts includes goes here-->
    <?php 
        include '../includes/footer.php';
    ?>

<script>
    	//To close the success & error alert with slide up animation
	$("#success-alert").delay(4000).fadeTo(2000, 500).slideUp(1000, function(){
    	$("#success-alert").slideUp(1000);
	});
    </script>

</body>

</html>
<?php
}else{ 
	header("Location: index.php");
	exit();
}
?>
