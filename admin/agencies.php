<?php
ob_start();
require_once "config/connection.php";

session_start();


// If its not logged in direct to login page
if (isset($_SESSION["adminLoggedin"]) !== true) {
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agencies - Alanya Rental Car Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php
    include_once "sidenav.html";
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Agencies</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Agencies</li>
                </ol>


                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <i class="fas fa-shop me-1"></i>
                            Agency Records
                        </div>
                        <a class="btn btn-dark " href="insert.php?table=agencies">Create new <i class="fas fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Stars</th>
                                    <th>Active</th>
                                    <th>Updated At</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Stars</th>
                                    <th>Active</th>
                                    <th>Updated At</th>
                                    <th>Created At</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php
                                // Getting all the users which is active and ordering by newest to oldest
                                $stmt = $conn->prepare("SELECT *  FROM agencies ORDER BY created_at DESC");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) :
                                ?>
                                    <tr>
                                        <td>
                                            <a class="btn btn-link text-dark" href="update.php?table=agencies&id=<?= $row['id'] ?>">
                                                <i class="fas fa-cog">
                                                </i>
                                            </a>
                                        </td>
                                        <td><?= $row['id'] ?></td>
                                        <td>
                                            <img width="30%" src="../assets/images/agencies/<?= $row['logo'] ?>" alt="<?= $row['logo'] ?>">
                                        </td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['phone'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['location'] ?></td>
                                        <td><?= $row['stars'] ?></td>
                                        <td><?= $row['active'] ?></td>
                                        <td><?= $row['updated_at'] ?></td>
                                        <td><?= $row['created_at'] ?></td>
                                    </tr>

                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Alanya Rental Car</div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <!-- Charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>



</body>

</html>