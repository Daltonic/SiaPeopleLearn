<?php
class webhook extends boiler
{
    public function defaultb()
    {
        $_SESSION['_PAGE_TITLE'] = 'Webhooks';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "webhook";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Only for admin purposes";

        include_once 'views/header.php';
        echo("Testing the mic");
        include_once 'views/footer.php';
    }

    public function confirmation()
    {
        $secret = $this->clean->post('secret');
        $email = $this->clean->post('email');
        $type = $this->clean->post('type');
        $tx = $this->clean->post('tx');
        $product_id = $this->clean->post('product_id');

        if ($product_id == "") {
            $this->error = 1;
            $this->error_msg .= "Product_id field was empty";
        }

        if ($email == "") {
            $this->error = 1;
            $this->error_msg .= "Email field was empty";
        }

        if ($type == "") {
            $this->error = 1;
            $this->error_msg .= " Type field was empty";
        }

        if ($tx == "") {
            $this->error = 1;
            $this->error_msg .= " Tx field was empty";
        }

        if ($secret == "") {
            $this->error = 1;
            $this->error_msg .= " Secret field was empty";
        }

        if ($secret != SECRET) {
            $this->error = 1;
            $this->error_msg .= " Wrong endpoint secret";
        }

        if ($this->error == 0) {
            $tid = sha1($email . microtime() . rand(0, 100));
            $this->db->query("INSERT INTO transactions (product_id, email, tx, tid, type) 
            VALUES('$product_id', '$email', '$tx', '$tid', '$type')");
            $transaction = $this->db->query("SELECT * FROM transactions WHERE tid='$tid'");

            include_once 'views/email.php';

            $message = <<<EOF
                Hello Dear,
                <br/>
                <br/>
                Your purchase was successfull.
                <br/>
                <br/>
                You can access your purchase on our website using this email address.
                <br/>
                <br/>
                If you have any questions or concerns, please feel free to reach out to our support team for further assistance.
                <br/>
                <br/>
                Thank you,<br/>
                Dapp Mentors
            EOF;


            $body = build_body("Purchase successfull", $message, "", "");
            $this->mail->set_sender('noreply@dappmentors.org', 'Dapp Mentors');
            $this->mail->send("Purchase successfull", $body, $email);

            $data = $transaction->fetch_assoc();
            $this->api->response(201, 'Created Successfully', $data);
        } else {
            $data = ['email' => $email, 'tx' => $tx, 'type' => $type == 1 ? 'Subscription' : 'One-Time'];
            $this->api->response(400, 'Error', $data, $this->error_msg);
        }
    }
}
