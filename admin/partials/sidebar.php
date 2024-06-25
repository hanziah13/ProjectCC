<?php 
global $hal;
 ?>
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>

                            <a class="nav-link <?= $hal == "customer" ? "active" : "" ?>" href="customer.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Customer
                            </a>

                            <a class="nav-link <?= $hal == "produk" ? "active" : "" ?>" href="produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Produk
                            </a>

                            <a class="nav-link <?= $hal == "type" ? "active" : "" ?>" href="produk-type.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Produk Type
                            </a>

                            <a class="nav-link <?= $hal == "orderan" ? "active" : "" ?>" href="orderan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Order
                            </a>

                            <a class="nav-link <?= $hal == "supplier" ? "active" : "" ?>" href="supplier.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Supplier
                            </a>

                            <a class="nav-link text-danger" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Logout
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        ClothSquare
                    </div>
                </nav>
            </div>s