<?php
class  management extends boiler
{
	public function defaultb()
	{
		$this->auth->admin();
		$_SESSION['_PAGE_TITLE'] = 'Management';
		$this->set_token();
		$products = $this->db->query("SELECT * FROM products ORDER BY id DESC LIMIT 12");
		include_once 'views/header.php';
		include_once 'views/products.php';
		include_once 'views/footer_assets_only.php';
	}

	public function subscribe_user_by_email($email)
	{
		$this->auth->admin();

		if ($email == "") {
			$email = $this->clean->post('email');
			if ($email == "") {
				$this->error = 1;
				$this->error_msg .= "Email field was empty";
			}
		}

		if ($this->error == 0) {
			$tid = sha1($email . microtime() . rand(0, 100));
			$tx = generateRandomString();
			$this->db->query("INSERT INTO transactions (email, tid, tx, type) VALUES('$email', '$tid', '$tx', '1')");

			include_once 'views/email.php';

			$message = <<<EOF
                Hello Dear,
                <br/>
                <br/>
                Great news! 🚀
                <br/>
                <br/>
                We appreciate your early sign-up for Dapp Mentors Academy. To thank you, we're giving you <strong> one month of full access </strong> to all our resources.
                <br/>
                <br/>
                Explore, learn, and decide if we're the right fit for you. <br/> Let's get started! 📚
                <br/>
                <br/>
                Thank you,<br/>
                Dapp Mentors
            EOF;


			$body = build_body("Exclusive Early Sign-Up Reward", $message, "", "");
			$this->mail->set_sender('noreply@dappmentors.org', 'Dapp Mentors');
			$this->mail->send("Exclusive Early Sign-Up Reward", $body, $email);

			$this->alert->set("User subscribed to DMA plus", "success");
			header('location:' . BURL . 'management/users');
		} else {
			$this->alert->set($this->error_msg, "error");
			header('location:' . BURL . 'management/users');
		}
	}

	public function add_product_to_plus($id)
	{
		$this->auth->admin();

		if ($id == "") {
			$this->error = 1;
			$this->error_msg .= "ID was not found";
		}

		if ($this->error == 0) {
			$this->db->query("UPDATE products SET subscribers=true WHERE id='$id' ");
			$this->alert->set("Product successfully added to plus", "success");
			header('location:' . BURL . 'management');
		} else {
			$this->alert->set($this->error_msg, "error");
			header('location:' . BURL . 'management');
		}
	}

	public function add_product_to_dma($id)
	{
		$this->auth->admin();
		$this->db->query("UPDATE products SET dma=true WHERE id='$id' ");
		$this->db->query("INSERT INTO academy (product_id, removed) VALUES ('$id', false)
        ON DUPLICATE KEY UPDATE removed=false");

		$this->alert->set("Product successfully added to DMA", "success");
		header('location:' . BURL . 'management');
	}

	public function rem_product_from_dma($id)
	{
		$this->auth->admin();
		$this->db->query("UPDATE products SET dma=false WHERE id='$id' ");
		$this->db->query("UPDATE academy SET removed=true WHERE product_id='$id'");
		$this->alert->set("Product successfully removed from DMA", "success");
		header('location:' . BURL . 'management');
	}

	public function rem_product_from_plus($id)
	{
		$this->auth->admin();
		$this->db->query("UPDATE products SET subscribers=false WHERE id='$id' ");
		$this->alert->set("Product successfully removed from plus", "success");
		header('location:' . BURL . 'management');
	}

	public function delete_product($slug)
	{
		$this->auth->admin();
		$this->db->query("UPDATE products SET deleted=true WHERE slug='$slug' ");
		$this->alert->set("A Course Deleted Successfull", "success");
		header('location:' . BURL . 'management');
	}

	public function edit_product($slug)
	{
		$this->set_token();
		$this->auth->admin();
		$product = $this->db->query("SELECT * FROM `products` WHERE slug='$slug' ");
		$row = $product->fetch_assoc();

		$_SESSION['_PAGE_TITLE'] = 'Edit ' . $row['name'];
		include_once 'views/header.php';
		include_once 'views/edit_product.php';
		include_once 'views/footer_assets_only.php';
	}

	public function publish_product($slug)
	{
		$this->auth->admin();
		$this->db->query("UPDATE products SET published=!published WHERE slug='$slug' ");
		$this->alert->set("A Course Deleted Successfull", "success");
		header('location:' . BURL . 'management');
	}

	public function users()
	{
		$this->auth->admin();
		$_SESSION['_PAGE_TITLE'] = 'User Management';
		$users = $this->db->query("SELECT * FROM users ORDER BY uid DESC");
		$transactions = $this->db->query("SELECT *, DATE_ADD(created_at, INTERVAL 30 DAY) 
		AS expires_at FROM transactions ORDER BY created_at DESC");


		include_once 'views/header.php';
		include_once 'views/users.php';
		include_once 'views/message_modal.php';
		include_once 'views/footer_assets_only.php';
	}

	public function message()
	{
		$this->auth->admin();
		$emails = $this->clean->post('emails');
		$subject = $this->clean->post('subject');
		$message = $this->clean->postmce('message');

		if ($emails == "") {
			$this->error = 1;
			$this->error_msg .= "Emails field was empty";
		}

		$emailsArray = explode(',', strtolower($emails));
		if (count($emailsArray) == 0) {
			$this->error = 1;
			$this->error_msg .= "Emails array was empty";
		}

		if ($message == "") {
			$this->error = 1;
			$this->error_msg .= "Message field was empty";
		}

		if ($subject == "") {
			$this->error = 1;
			$this->error_msg .= "Subject field was empty";
		}

		if ($this->error == 0) {
			include_once 'views/email.php';
			$uniqueEmailsArray = array_unique($emailsArray);
			
			$body = build_body($subject, $message, "", "");
			$this->mail->set_sender('noreply@dappmentors.org', 'Dapp Mentors');
			$this->mail->sendMulti($subject, $body, $uniqueEmailsArray);

			$this->alert->set("Message sent", "success");
			header('location:' . BURL . 'management/users');
		} else {
			$this->alert->set($this->error_msg, "error");
			header('location:' . BURL . 'management/users');
		}
	}

	public function add_admin($uid)
	{
		$this->auth->admin();
		$this->db->query("UPDATE users SET type=8 WHERE uid='$uid' ");
		header('location:' . BURL . 'management/users');
	}

	public function remove_admin($uid)
	{
		$this->auth->admin();
		$this->db->query("UPDATE users SET type=0 WHERE uid='$uid' ");
		header('location:' . BURL . 'management/users');
	}

	public function upload_asset($product_id)
	{
		$this->set_token();
		$this->auth->admin();
		$upload = $this->db->query("SELECT * FROM `uploads` WHERE product_id='$product_id' LIMIT 1");
		$row = $upload->fetch_assoc();

		$_SESSION['_PAGE_TITLE'] = 'Upload Source Files';
		include_once 'views/header.php';
		include_once 'views/upload_asset.php';
		include_once 'views/footer_assets_only.php';
	}
}
