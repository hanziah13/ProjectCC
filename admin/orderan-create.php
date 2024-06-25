<?php 
require "../function/init.php";

if (!isset($_SESSION['login'])) {
    setError("Anda Belum Login!");
    header("location: login.php");
}

$hal = "orderan";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = validate([
        'order_number',
        'date',
        'qty',
        'customer_id',
        'product_id',
    ]);

    if ($data) {
        $id_produk = $data['product_id'];
        $produk = query_select('product', ['where' => "id = '$id_produk'"])[0];

        $data['total_price'] = $produk['sell_price'] * $data['qty'];
        $data['date'] .= " 00:00:00";

        query_insert('`order`', $data);
        setSuccess('Orderan Berhasil Ditambah!');
        header("location: orderan.php");
        die;

    } else {

        setError('Lengkapi Form!');

    }

}

$produks = query_select('product');
$customers = query_select('customer');

 ?>
<?php require "partials/header.php" ?>

       <?php require "partials/navbar.php" ?>

        <div id="layoutSidenav">

            <?php require "partials/sidebar.php" ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Orderan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                        <div class="card mb-4 border-0 shadow">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Orderan Baru
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
                                        <label for="gender" class="mb-2">Customer</label>
                                        
                                        <select name="customer_id" id="" class="form-control">
                                            <?php foreach ($customers as $key => $value): ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="order_number" class="mb-2">Order Number</label>
                                        <input class="form-control" id="order_number" type="text" placeholder="Order Number" name="order_number" />
                                    </div>

                                     <div class="form-group mb-3">
                                        <label for="date" class="mb-2">Tanggal</label>
                                        <input class="form-control" id="date" type="date" placeholder="" name="date" />
                                    </div>

                                     <div class="form-group mb-3">
                                        <label for="gender" class="mb-2">Product</label>
                                        
                                        <select name="product_id" id="" class="form-control">
                                            <?php foreach ($produks as $key => $value): ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                   
                                    <div class="form-group mb-3">
                                        <label for="qty" class="mb-2">QTY</label>
                                        <input class="form-control" id="qty" type="number" placeholder="QTY" name="qty" />
                                    </div>

                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn mb-3 btn-info text-white btn-block">Save</button>
                                            <a href="orderan.php" class="btn btn-light btn-block">Back</a>
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
                            <div class="text-muted">Copyright &copy; ClothSquare 2023</div>
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
