<?php 
require "../function/init.php";

if (!isset($_SESSION['login'])) {
    setError("Anda Belum Login!");
    header("location: login.php");
}

$hal = "produk";

$suppliers = query_select('product', [
    'orderby' => 'id DESC',
]);

$produkType = query_select('product_type');
$types = [];

foreach ($produkType as $key => $value) {
    $types[$value['id']] = $value;
}

unset($produkType);

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
                            <li class="breadcrumb-item active">ClothSquare</li>
                        </ol>
                       
                        <div class="card mb-4 border-0 shadow">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Daftar Produk
                            </div>
                            <div class="card-body">

                                <a href="produk-create.php" class="btn btn-info btn-sm mb-3 text-white">Tambah Produk</a>

                                <?php if (hasSuccess() || hasError() ): ?>
                                  <div class="alert alert-<?= hasSuccess() ? "success" : "danger" ?>"><?= hasSuccess() ? success() : error() ?></div>

                                  <script>
                                    setTimeout(() => {
                                      document.querySelector('.alert').remove();
                                    }, 10000);
                                  </script>
                                <?php endif ?>

                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th>SKU</th>
                                            <th>Name</th>
                                            <th>Purchase Price</th>
                                            <th>Sell Price</th>
                                            <th>Stock</th>
                                            <th>Type</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                        $no  = 1;
                                        foreach ($suppliers as $item): ?>

                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?php echo $item['sku'] ?></td>
                                                <td><?php echo $item['name'] ?></td>
                                                <td>Rp <?php echo number_format( $item['purchase_price'] ) ?></td>
                                                <td>Rp <?php echo number_format( $item['sell_price'] ) ?></td>
                                                <td><?php echo $item['stock'] ?></td>
                                                <td><?php echo $types[ $item['product_type_id'] ]['name']?></td>
                                                <td>
                                                    <a href="produk-edit.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                                                    <a href="hapus.php?id=<?= $item['id'] ?>&data=produk" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Produk <?= $item['name'] ?>')">Hapus</a>
                                                </td>
                                            </tr>
                                            
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
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
