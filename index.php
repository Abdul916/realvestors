<?php
session_start();
include('db_connect.php');
if (isset($_SESSION['user_id']) && isset($_SESSION['is_active']) && $_SESSION['is_active'] == 1) {
    header("Location: home.php");
    exit();
}
?>
<?php include('header.php'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light text-dark mt-5">
                <div class="card-header text-center">
                    <h3>Email Verification</h3>
                </div>
                <div class="card-body">
                    <form action="register.php" method="POST" class="mt-4">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-control" id="role" name="role">
                                <option value="User">View Videos</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <div class="alert alert-success mt-4">
                    Registration successful! Please check your email to activate your account.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>