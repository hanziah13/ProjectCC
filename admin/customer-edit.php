<?php 
require "../function/init.php";

if (!isset($_SESSION['login'])) {
    setError("Anda Belum Login!");
    header("location: login.php");
}

$hal = "customer";

$id = htmlspecialchars($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = validate([
        'name',
        'gender',
        'phone',
        'email',
        'address',
        'card_id'
    ]);

    if ($data) {
        query_update('customer', $data, "id = '$id'");
        setSuccess('Customer Berhasil Diupdate!');
        header("location: customer.php");
        die;

    } else {

        setError('Lengkapi Form!');

    }

}

$customer = query_select('customer', ['where' => "id= '$id'"])[0];
$cards = query_select('card');


 ?>
<?php require "partials/header.php" ?>

       <?php require "partials/navbar.php" ?>

        <div id="layoutSidenav">

            <?php require "partials/sidebar.php" ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Customer</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                        <div class="card mb-4 border-0 shadow">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Data Customer
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
                                        <label for="name" class="mb-2">Customer Name</label>
                                        <input class="form-control" id="name" type="text" placeholder="Customer Name" name="name" value="<?= $customer['name'] ?>" />
                                    </div>

                                     <div class="form-group mb-3">
                                        <label for="gender" class="mb-2">Gender</label>
                                        
                                        <select name="gender" id="" class="form-control">
                                            <option value="L" <?= $customer['gender'] == "L" ? "selected" : "" ?> >Laki - Laki</option>
                                            <option value="P" <?= $customer['gender'] == "P" ? "selected" : "" ?> >Perempuan</option>
                                        </select>
                                    </div>
                                   
                                    <div class="form-group mb-3">
                                        <label for="phone" class="mb-2">Phone</label>
                                        <input class="form-control" id="phone" type="number" placeholder="Phone" name="phone" value="<?= $customer['phone'] ?>" />
                                    </div>

                                     <div class="form-group mb-3">
                                        <label for="email" class="mb-2">Email</label>
                                        <input class="form-control" id="email" type="emai" placeholder="Email" name="email" value="<?= $customer['email'] ?>" />
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="gender" class="mb-2">Card</label>
                                        
                                        <select name="card_id" id="" class="form-control">
                                            <option value="">Select Card</option>
                                            <?php foreach ($cards as $value): ?>
                                                <option value="<?= $value['id'] ?>" <?= $value['id'] == $customer['card_id'] ? "selected" : "" ?> ><?= $value['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                     <div class="form-group mb-3">
                                        <label for="address" class="mb-2">Adrress</label>
                                        <textarea name="address" id="" cols="30" rows="10" class="form-control"><?= $customer['address'] ?></textarea>
                                    </div>

                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn mb-3 btn-info text-white btn-block">Save</button>
                                            <a href="produk.php" class="btn btn-light btn-block">Back</a>
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
