<?php 
$id = $_GET['id'];
$produk = [
    [
        'sku' => "TS2312",
        'name' => 'Kanji Print - Tshirt Summer Short Sleeve Cotton Loose Oversized',
        'price' => 90.000,
        'img' => 'Tshirt.jpg',
    ],
    [
        'sku' => "SH792",
        'name' => 'OAS Mezcal Cuba Terry Shirt',
        'price' => 100.000,
        'img' => 'Shirt.jpg',

    ],
    [
        'sku' => "PA569",
        'name' => 'Cargo Pants - Neutral Medium',
        'price' => 207.000,
        'img' => 'Pants.jpg',
    ],
    [
        'sku' => "JA108",
        'name' => 'Scott System Work Jacket Tan',
        'price' => 600.000,
        'img' => 'Jacket.png',
    ],
    [
        'sku' => "DR152",
        'name' => 'Linen Daydream Dress For Women',
        'price' => 900.000,
        'img' => 'Dress.jpg',
    ],
    [
        'sku' => "SHE777",
        'name' => 'Casual High-heeled Shoes Korshunova Thick Heels',
        'price' => 200.000,
        'img' => 'Shoes.jpg',
    ],
    [
        'sku' => "NE797",
        'name' => 'Paris Diamond Ribbon Of Love Platinum Choker Necklace',
        'price' => 990.000,
        'img' => 'Necklace.jpg',
    ],
    [
        'sku' => "JE877",
        'name' => 'Tilda s Bow Jewellery Collection Diamond Magic',
        'price' => 700.000,
        'img' => 'Jewellery.png',
    ],
    [
        'sku' => "BL015",
        'name' => 'Blouse Clasic Blue',
        'price' => 304.000,
        'img' => 'Blouse.jpg',
    ],
    [
        'sku' => "SK015",
        'name' => 'Miguelina Ballerina Wrap Skirt',
        'price' => 299.000,
        'img' => 'Skirt.jpg',
    ],
];
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">ClothSquare</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about/about.php">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="navbar-nav ml-auto py-0">
                        <a href="admin/login.php" class="nav-item nav-link"></a>
                        <a href="admin/register.php" class="nav-item nav-link"></a>
                    </div>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="product/<?= $produk[$id]['img'] ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: <?= $produk[$id]['sku'] ?> </div>
                        <h1 class="display-5 fw-bolder"><?= $produk[$id]['name'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span>Rp<?= $produk[$id]['price'] ?>.000</span>
                        </div>
                        <p class="lead">kami menyediakan produk dengan kualitas premium harga terjangkau</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                     <?php foreach ($produk as $key => $value): ?>
                        
                    <div class="col mb-5">
                        <div class="card border-0 shadow h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="product/<?= $value['img'] ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $value['name'] ?></h5>
                                    <!-- Product price-->
                                    Rp<?= $value['price'] ?>.000
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark btn-sm mt-auto" href="detail.php?id=<?= $key ?>">Detail</a></div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach ?>

                   
                </div>
            </div>
        </section>

        <!-- Footer Start -->
        <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
                <div class="row px-xl-5 pt-5">
                    <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                        <h1 class="display-2 fw-bolder">ClothSquare</h1>
                        <p>mitra belanja online untuk memenuhi kebutuhan pakaian dan aksesoris Anda dengan pengalaman belanja yang mudah, aman, dan nyaman</p>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Bogor, Jl Raya Maju no. 1389</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>clothsquare@.com</p>
                        <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+62 8946 94628 0220</p>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-5">
                                <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                                <div class="d-flex flex-column justify-content-start">
                                    <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                                    <a class="text-dark mb-2" href="about/about.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-5">
                                <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                                <p>Dapatkan berita fashion dan peluncuran produk terbaru hanya dengan berlangganan newsletter kami.</p>
                                <form action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control border-dark py-4" placeholder="Your Name" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control border-dark py-4" placeholder="Your Email"
                                            required="required" />
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-dark mx-xl-5 py-4">
                    <div class="col-md-6 px-xl-0">
                        <p class="mb-md-0 text-center text-md-left text-dark">
                            &copy; <a class="text-dark font-weight-semi-bold" href="#">ClothSquare</a>. All Rights Reserved. Designed
                            by Alifah Zahro & Hana Fauziah
                        </p>
                    </div>
                </div>
            </div>
        <!-- Footer End -->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
