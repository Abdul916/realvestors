<?php
session_start();
include('db_connect.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT is_active FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['is_active'] == 0) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
<?php include('header.php'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <?php if (isset($_GET['activated']) && $_GET['activated'] == 1): ?>
                <div class="alert alert-success mt-5">
                    Your account has been activated successfully!
                </div>
            <?php endif; ?>
            <h1 class="mt-5 text-center">Welcome to the Home Page</h1>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Open Videos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Click</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Open Videos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Click</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Open Videos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Click</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-4">
            <div class="card">
                <div class="card-header">
                    Open Videos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Click</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-4">
            <div class="card">
                <div class="card-header">
                    Open Videos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Click</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-4">
            <div class="card">
                <div class="card-header">
                    Open Videos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Click</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>