<?php
class index extends boiler
{

	public function  defaultb()
	{
		$products = $this->db->query("SELECT products.*, COUNT(lessons.id) as lessons 
		FROM products 
		LEFT JOIN lessons ON products.id = lessons.product_id
		WHERE products.published=1 AND products.deleted=0 AND products.category < 3 
		GROUP BY products.id 
		ORDER BY products.id DESC");
		$services = $this->db->query("SELECT * FROM products WHERE published=1 AND deleted=0 AND category = 4 ORDER BY id DESC LIMIT 6");

		$_SESSION['_PAGE_TITLE'] = 'Build Decentralized Applications';
		$_SESSION['_PAGE_TYPE'] = 'Website';
		$_SESSION['_PAGE_URL'] = BURL;
		$_SESSION['_PAGE_IMAGE'] = BURL . "assets/academy.png";
		$_SESSION['_PAGE_DESCRIPTOR'] = "
		Dappmentors is your go-to resource for building decentralized
		applications (dApps) on the blockchain. Enter the exciting world of Web 3.0,
		learn from experienced mentors, and profit from your creations. Whether
		you're a seasoned developer or just starting out, Dappmentors offers
		comprehensive tutorials, tools, and resources to help you succeed in the dApp space.
		Join our community today and be a part of the decentralized future.
		";
		include_once 'views/header.php';
		include_once 'views/index.php';
		include_once 'views/loader.php';
		include_once 'views/footer.php';
	}
}
