<?php
$pageConfig = [
    'title' => 'Admin Dashboard',
    'styles' => ["./dashboard.css"],
    'scripts' => ["./dashboard.js"],
    'authRequired' => true
];

include_once "../includes/header.php";
?>

<main>
    <?php include_once "./includes/navbar.php"; ?>
    <div class="dashboard-layout">
        <?php include_once "./includes/sidebar.php"; ?>
        
        <!-- Dashboard cards layout -->
        <div class="content">
            <h2>Admin Dashboard</h2>
            <div class="home-grid">
                <div class="tile" onclick="location.href='/digifine/admin/dashboard/create-upate-law/index.php'">
                    <span>Create Law</span>
                </div>
                <div class="tile" onclick="location.href='/digifine/admin/dashboard/edit-law/index.php'">
                    <span>Edit Law</span>
                </div>
                <div class="tile" onclick="location.href='/digifine/admin/dashboard/verify-driver-details/index.php'">
                    <span>Law Management</span>
                </div>
                <div class="tile" onclick="location.href='/dashboard/submit-duty/index.php'">
                    <span>Fine Management</span>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once "../includes/footer.php"; ?>
