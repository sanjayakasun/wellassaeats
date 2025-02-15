<?php
require 'core/init.php';
$user = $userObj->getCustomers();
$user2 = $userObj->getRestaurants();
$user3 = $userObj->getDeliveryDrivers();
?>


<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/menu.css">
</head>

<body style="background: url(assets/img/bg3.jpg); background-size: cover; background-repeat: no-repeat; background-position: center bottom">

<div id="navbar">
    <nav class="navbar navbar-expand-md bg-dark py-3 navbar-dark">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img class="navbar-logo" src="assets/img/logo.png" style="width: 5rem;padding: 0.5rem;"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home<i class="fas fa-home" style="padding: 0.3rem;color: var(--bs-warning);"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="foods.php">Foods<i class="fas fa-fish" style="padding: 0.3rem;color: var(--bs-warning);"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="restaurent.php">Restaurant<i class="fas fa-warehouse" style="padding: 0.3rem;color: var(--bs-warning);"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Cart<i class="fas fa-cart-arrow-down" style="padding: 0.3rem;color: var(--bs-warning);"></i></a></li>
                </ul><a class="btn btn-primary ms-md-2 btn-all" role="button" href="logout.php" style="background: var(--bs-warning);">Logout</a>
            </div>
        </div>
    </nav>
</div>

<ul class="nav nav-tabs tabh" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active tab1" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Customers</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link tab1" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Restaurant</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link tab1" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Delivery Drivers</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container text-end">
            <button type="button" class="btn btnadd" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-top:20px; margin-bottom: 20px ">
                Register Admin
            </button>
        </div>
        <form action="registerAdmin.php" method="POST">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title h3" id="exampleModalLabel">Admin Registration</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-light" style="background-color: #212529;">
                            <div class="form-outline form-white h5">
                                <label class="form-label h5" for="name">Name</label>
                                <br />
                                <input type="text" class="form-control" name="name" id="name" required />
                                <br />
                                <label class="form-label h5" for="tel">Contact No</label>
                                <br />
                                <input type="text" class="form-control" name="tel" id="tel" required />
                                <br />
                                <label class="form-label h5" for="tel">Email</label>
                                <br />
                                <input type="text" class="form-control" name="email" id="email" required />
                                <br />
                                <label class="form-label h5" for="tel">Password</label>
                                <br />
                                <input type="password" class="form-control" name="password" id="password" required />
                                <br />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="close" id="close" class="btn text-light" data-bs-dismiss="modal" style="background-color: #212529;">Close</button>
                            <button type="submit" name="add" id="add" class="btn fw-bold btnadd">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <script>
            // Check if the success message is set in the session
            var successMessage = "<?php echo isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '' ?>";

            // Clear the success message from the session
            <?php unset($_SESSION['success_message']); ?>

            // Display the success message if it's not empty
            if (successMessage !== "") {
                alert(successMessage);
            }
        </script>
        <div class="container" id="table">
            <div class="table-responsive">
                <table class="table" id="tbl_admin">
                    <thead>
                    <tr>
                        <th class="fs-3">Customer Name</th>
                        <th class="fs-3">Contact No</th>
                        <th class="fs-3">Email</th>
                        <th class="fs-3">Address</th>
                        <th class="fs-3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($user as $customer){
                    ?>
                    <tr>
                        <td><?php echo $customer->customer_name;?></td>
                        <td><?php echo $customer->customer_contact_no;?></td>
                        <td><?php echo $customer->customer_email;?></td>
                        <td><?php echo $customer->customer_address;?></td>
                        <td>
                            <a href="deleteCustomer.php?customer_id=<?php echo $customer->customer_id;?>">
                                <button class="btn btn-danger" type="submit" name="delete">Remove</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container" id="table" style="padding-top: 40px; padding-bottom: 40px">
            <div class="table-responsive">
                <table class="table" id="tbl_admin">
                    <thead>
                    <tr>
                        <th class="fs-3">Restaurant Name</th>
                        <th class="fs-3">Contact No</th>
                        <th class="fs-3">Email</th>
                        <th class="fs-3">Address</th>
                        <th class="fs-3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($user2 as $customer){
                        ?>
                        <tr>
                            <td><?php echo $customer->restaurant_name;?></td>
                            <td><?php echo $customer->restaurant_contact_no;?></td>
                            <td><?php echo $customer->restaurant_email;?></td>
                            <td><?php echo $customer->restaurant_address;?></td>
                            <td>
                                <a href="deleteRestaurant.php?restaurant_id=<?php echo $customer->restaurant_id;?>">
                                    <button class="btn btn-danger" type="submit" name="delete">Remove</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="container" id="table" style="padding-top: 40px; padding-bottom: 40px">
            <div class="table-responsive">
                <table class="table" id="tbl_admin">
                    <thead>
                    <tr>
                        <th class="fs-3">Driver Name</th>
                        <th class="fs-3">Contact No</th>
                        <th class="fs-3">Email</th>
                        <th class="fs-3">Address</th>
                        <th class="fs-3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($user3 as $customer){
                        ?>
                        <tr>
                            <td><?php echo $customer->driver_name;?></td>
                            <td><?php echo $customer->driver_contact_no;?></td>
                            <td><?php echo $customer->driver_email;?></td>
                            <td><?php echo $customer->driver_address;?></td>
                            <td>
                                <a href="deleteDriver.php?driver_id=<?php echo $customer->driver_id;?>">
                                    <button class="btn btn-danger" type="submit" name="delete">Remove</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <footer class="text-center bg-dark">
        <div class="container text-white py-4 py-lg-5">
            <ul class="list-inline">
                <li class="list-inline-item me-4"><img src="assets/img/logo.png" style="width: 5rem;padding: 0.5rem;"><a class="link-light" href="#">Wellassa Eats</a></li>
                <li class="list-inline-item me-4"><a class="link-light" href="#">wellassaeats@gmail.com</a></li>
                <li class="list-inline-item"><a class="link-light" href="#">+949122444569</a></li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook text-light">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                    </svg></li>
                <li class="list-inline-item me-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter text-light">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                    </svg></li>
                <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram text-light">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                    </svg></li>
            </ul>
            <p class="text-muted mb-0">Copyright © 2023 Brand</p>
        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
