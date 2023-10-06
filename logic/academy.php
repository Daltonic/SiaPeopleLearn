<?php
class academy extends boiler
{
    public function defaultb()
    {
        $this->auth->user();
        $_SESSION['_PAGE_TITLE'] = 'Academy';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "academy";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Our Academy";

        $email = $this->auth->user->email;

        $products = $this->db->query("SELECT products.*, COUNT(lessons.id) as lessons
        FROM products
        LEFT JOIN lessons ON products.id = lessons.product_id
        WHERE (products.dma=1 OR products.subscribers=1)
        AND products.deleted=0 AND products.category < 3
        GROUP BY products.id
        ORDER BY products.id DESC");

        $subscriptions = $this->db->query("SELECT *, DATE_ADD(created_at, INTERVAL 30 DAY) AS expires_at 
        FROM transactions 
        WHERE DATE_ADD(created_at, INTERVAL 30 DAY) >= CURDATE() AND type=1 AND email='$email'
        ORDER BY created_at DESC LIMIT 1");

        $purchases = $this->db->query("SELECT products.*, COUNT(DISTINCT lessons.id) as lessons
        FROM products
        LEFT JOIN transactions ON products.id = transactions.product_id
        LEFT JOIN lessons ON products.id = lessons.product_id
        WHERE transactions.email = '$email' AND transactions.type = 0 AND products.category IN (1,2)
        GROUP BY products.id");

        include_once 'views/header.php';
        include_once 'views/academy.php';
        include_once 'views/loader.php';
        include_once 'views/footer.php';
    }
}
