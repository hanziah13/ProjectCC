<?php 
require "../function/init.php";

if (!isset($_SESSION['login'])) {
    setError("Anda Belum Login!");
    header("location: login.php");
}

$hal = "supplier";

$id = htmlspecialchars($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = validate([
        'name',
        'phone',
        'address',
        'contact_name',
    ]);

    if ($data) {

        query_update('supplier', $data, "id = '$id'");
        setSuccess("Supplier Berhasil Diupdate!");
        header("location: supplier.php");
        die;

    } else {

        setError('Lengkapi Form!');

    }

}

$supplier = query_select('supplier', ['where' => "id = '$id'"])[0];
 ?>
<?php require "partials/header.php" ?>

       <?php require "partials/navbar.php" ?>

        <div id="layoutSidenav">

            <?php require "partials/sidebar.php" ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Supplier</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                        <div class="card mb-4 border-0 shadow">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Edit Data Supplier
                            </div>
                            <div class="card-body">

                                <?php if (hasSuccess() || hasError() ): ?>
                                  <div class="alert alert-<?= hasSuccess() ? "success" : "danger" ?>"><?= hasSuccess() ? success() : error() ?></div>

                                  <script>
                                    setTimeout(() => {
                                      document.querySelector('.alert').remove();
                                    }, 10000);
                                  </script>
                                <?php endif ?>

                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <label for="name" class="mb-2">Name</label>
                                        <input class="form-control" id="name" type="text" placeholder="Name" name="name" value="<?php echo $supplier['name'] ?>" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone" class="mb-2">Phone</label>
                                        <input class="form-control" id="phone" type="text" placeholder="Phone" name="phone" value="<?php echo $supplier['phone'] ?>" />
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="contact_name" class="mb-2">Contact Name</label>
                                        <input class="form-control" id="contact_name" type="text" placeholder="Contact Name" name="contact_name" value="<?php echo $supplier['contact_name'] ?>" />
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="address" class="mb-2">Address</label>
                                        <textarea name="address" id="" cols="30" rows="10" class="form-control"><?php echo $supplier['address'] ?></textarea>
                                    </div>
                                   
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn mb-3 btn-info text-white btn-block">Save</button>
                                            <a href="supplier.php" class="btn btn-light btn-block">Back</a>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    
<?php require "partials/footer.php" ?>
