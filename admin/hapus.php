<?php 

require "../function/init.php";

$id = htmlspecialchars($_GET['id']);
$data = htmlspecialchars($_GET['data']);

if ($data == "supplier") {
	query_delete('supplier', "id = '$id'");
	setSuccess('Supplier Berhasil Dihapus!');
	header("location: supplier.php");
	die;
} else if ($data == "produk") {
	query_delete('product', "id = '$id'");
	setSuccess('Produk Berhasil Dihapus!');
	header("location: produk.php");
	die;
} else if ($data == "produk_type") {
	query_delete('product_type', "id = '$id'");
	setSuccess('Produk Type Berhasil Dihapus!');
	header("location: produk-type.php");
	die;
} else if ($data == "customer") {
	query_delete('customer', "id = '$id'");
	setSuccess('Customer Berhasil Dihapus!');
	header("location: customer.php");
	die;
} else if ($data == "orderan") {
	query_delete('`order`', "id = '$id'");
	setSuccess('Orderan Berhasil Dihapus!');
	header("location: orderan.php");
	die;
}
if ($data == "restock") {
	query_delete('restock', "id = '$id'");
	setSuccess('Restock Berhasil Dihapus!');
	header("location: restock.php");
	die;
}
 ?>