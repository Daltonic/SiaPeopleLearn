<?php
class  courses extends boiler
{
	public function defaultb()
	{

		$_SESSION['_PAGE_TITLE'] = 'Create Product';
		$this->set_token();
		include_once 'views/header.php';
		include_once 'views/create_product.php';
		include_once 'views/footer_assets_only.php';
	}

	public function details($slug)
	{
		$details = $this->db->query("SELECT * FROM products WHERE slug='$slug' ");
		if ($details->num_rows > 0) {
			$details = $details->fetch_assoc();

			$_SESSION['_PAGE_TITLE'] = $details['name'];
			$_SESSION['_PAGE_TYPE'] = 'Product';
			$_SESSION['_PAGE_URL'] = BURL . "courses/details/" . $details['slug'];
			$_SESSION['_PAGE_IMAGE'] = $details['image'];
			$_SESSION['_PAGE_DESCRIPTOR'] = substr(sanitize_text(revertext($details['description'])), 0, 200)
				.
				(strlen(sanitize_text(revertext($details['description']))) > 100 ?
					"..." : "");

			include_once 'views/header.php';
			include_once 'views/details.php';
			include_once 'views/loader.php';
			include_once 'views/footer.php';
		} else {
			header("location:" . BURL);
		}
	}
}
