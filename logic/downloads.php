<?php
class downloads extends boiler
{

    public function upload_asset($product_id)
    {
        $this->auth->admin();
        $fileName = 'asset';
        $directoryPath = '../downloads/';
        $uploadedFilePath = $this->clean->uploadAllowedFiles($fileName,  $directoryPath); // fails at this point

        if ($product_id == "") {
            $this->error = 1;
            $this->error_msg .= "product_id cannot be empty";
        }

        if ($uploadedFilePath == "") {
            $this->error = 1;
            $this->error_msg .= "File asset path was empty";
        }

        if ($this->error == 0) {
            $this->db->query("INSERT INTO uploads (product_id, url)
            VALUES ('$product_id', '$uploadedFilePath')
            ON DUPLICATE KEY UPDATE url = VALUES(url)");

            $this->alert->set("Product successfully added to plus", "success");
            header('location:' . BURL . 'management');
        } else {
            $this->alert->set($this->error_msg, "error");
            header('location:' . BURL . 'management');
        }
    }

    public function download_asset($product_id, $slug)
    {
        $this->auth->user();
        // Checks if user has enrolled or is admin
        $email = $this->auth->user->email;
        $enrollment = $this->db->query("SELECT * FROM transactions, products WHERE product_id='$product_id'
        AND (email='$email' OR dma=1) AND product_id=products.id AND category=2 LIMIT 1");

        $subscriptions = $this->db->query("SELECT *, DATE_ADD(transactions.created_at, INTERVAL 30 DAY) AS expires_at,
        EXISTS(SELECT 1 FROM products WHERE products.id='$product_id' AND products.subscribers=1) AS available
        FROM transactions
        WHERE DATE_ADD(transactions.created_at, INTERVAL 30 DAY) >= CURDATE()
        AND type=1 AND email='$email'
        ORDER BY transactions.created_at DESC LIMIT 1");

        $subscriptionData = $subscriptions->fetch_assoc();
        if ($enrollment->num_rows < 1 && ($subscriptionData === null ||
            $subscriptionData['available'] == 0) && $this->auth->user->type < 8) {
            header('location:' . BURL . 'academy');
            exit;
        } else {

            $upload = $this->db->query("SELECT * FROM `uploads` WHERE product_id='$product_id' LIMIT 1");
            $row = $upload->fetch_assoc();

            $uploadedFilePath = $row['url'];

            if (!file_exists($uploadedFilePath)) {
                header('location:' . BURL . 'notfound');
            }

            // Set appropriate headers for the download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $slug . '___' . $uploadedFilePath);
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($uploadedFilePath));
            readfile($uploadedFilePath);
            exit;
        }
    }
}
