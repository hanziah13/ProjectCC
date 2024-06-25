<?php 
require "../function/init.php";

if (!isset($_SESSION['login'])) {
    setError("Anda Belum Login!");
    header("location: login.php");
}

$hal = "produk";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = validate([
        'sku',
        'name',
        'purchase_price',
        'sell_price',
        'stock',
        'product_type_id'
    ]);

    if ($data) {

        $data['min_stock'] = 1;
        $data['restock_id'] = 1;

        query_insert('product', $data);
        setSuccess("Produk Berhasil Ditambah!");
        header("location: produk.php");
        die;

    } else {

        setError('Lengkapi Form!');

    }

}

$produkType = query_select('product_type');
 ?>
<?php require "partials/header.php" ?>

       <?php require "partials/navbar.php" ?>

        <div id="layoutSidenav">

            <?php require "partials/sidebar.php" ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                        <div class="card mb-4 border-0 shadow">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Produk Baru
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
                                        <label for="sku" class="mb-2">SKU</label>
                                        <input class="form-control" id="sku" type="text" placeholder="SKU" name="sku" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name" class="mb-2">Produck Name</label>
                                        <input class="form-control" id="name" type="text" placeholder="Name" name="name" />
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="purchase_price" class="mb-2">Purchase Price</label>
                                        <input class="form-control" id="purchase_price" type="number" placeholder="Purchase Price" name="purchase_price" />
                                    </div>

                                     <div class="form-group mb-3">
                                        <label for="sell_price" class="mb-2">Sell Price</label>
                                        <input class="form-control" id="sell_price" type="number" placeholder="Sell Price" name="sell_price" />
                                    </div>

                                     <div class="form-group mb-3">
                                        <label for="stock" class="mb-2">Stock</label>
                                        <input class="form-control" id="stock" type="number" placeholder="Stock" name="stock" />
                                    </div>


                                     <div class="form-group mb-3">
                                        <label for="stock" class="mb-2">Product Type</label>
                                        
                                        <select name="product_type_id" id="" class="form-control">
                                            <option value="">Select Product Type</option>
                                            <?php foreach ($produkType as $key => $value): ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
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
