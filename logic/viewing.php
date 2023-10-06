<?php
class viewing extends boiler
{

    public function lesson($product_id, $lesson_id)
    {
        $this->auth->user();
        if ($product_id == "") {
            header('location:' . BURL . 'academy');
        }

        // Checks if user has enrolled or is admin
        $user_id = $this->auth->uid;
        $email = $this->auth->user->email;
        $enrollment = $this->db->query("SELECT tid FROM transactions, products WHERE product_id='$product_id' AND
        (email='$email' OR dma=1) AND product_id=products.id AND category=1 LIMIT 1");

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
        }

        $lessons = $this->db->query("
        SELECT lessons.*, products.image AS product_image
        FROM `lessons`
        INNER JOIN `products` ON lessons.product_id = products.id
        WHERE lessons.product_id='$product_id'
        ORDER BY lessons.orderId");
        
        $lesson = $this->db->query("
            SELECT l.*, 
            CASE
                WHEN f.lesson_id IS NOT NULL THEN TRUE
                ELSE FALSE
            END AS is_fulfilled
            FROM `lessons` l
            LEFT JOIN `fulfillments` f
            ON l.product_id = f.product_id AND l.id = f.lesson_id AND f.user_id = '$user_id'
            WHERE l.product_id = '$product_id' AND l.id = '$lesson_id' 
            LIMIT 1
        ");

        $lesson = $lesson->fetch_assoc();

        $_SESSION['_PAGE_TITLE'] = $lesson['name'];
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "viewing/lesson/$product_id/$lesson_id";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Currently playing video";

        include_once 'views/header.php';
        include_once 'views/viewing.php';
        include_once 'views/footer.php';
    }

    public function complete_lesson($product_id, $lesson_id)
    {
        $this->auth->user();

        if ($product_id == "") {
            $this->error = 1;
            $this->error_msg .= "Product Id not found";
        }

        if ($lesson_id == "") {
            $this->error = 1;
            $this->error_msg .= "Lesson Id not found";
        }

        if ($this->error == 0) {
            $user_id = $this->auth->uid;

            $this->db->query("INSERT INTO fulfillments (product_id, lesson_id, user_id)
            VALUES('$product_id', '$lesson_id', '$user_id')");
            $this->db->query("UPDATE lessons SET fulfillments=fulfillments+1 WHERE id='$lesson_id'");

            $this->alert->set("Lesson Updated successfully", "success");
            header('location:' . BURL . 'viewing/lesson/' . $product_id . '/' . $lesson_id);
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('location:' . BURL . 'lessons/edit/' . $product_id . '/' . $lesson_id);
        }
    }
}
