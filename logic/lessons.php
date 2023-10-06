<?php
class lessons extends boiler
{
    public function defaultb($product_id)
    {
        $this->auth->user();
        if ($product_id == "") {
            header('location:' . BURL . 'academy');
        }

        // Checks if user has enrolled or is admin
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

        $product = $this->db->query("
            SELECT p.*, IFNULL(u.url, '') AS url
            FROM `products` p
            LEFT JOIN `uploads` u ON p.id = u.product_id
            WHERE p.id = '$product_id'");

        $lessons = $this->db->query("
        SELECT lessons.*, products.image AS product_image
        FROM `lessons`
        INNER JOIN `products` ON lessons.product_id = products.id
        WHERE lessons.product_id='$product_id'
        ORDER BY lessons.orderId");

        if ($product->num_rows < 1) {
            include_once 'views/header.php';
            include_once 'views/404.php';
            include_once 'views/footer.php';
        } else {
            $row = $product->fetch_assoc();

            $_SESSION['_PAGE_TITLE'] = $row['name'] . ' Lessons';
            $_SESSION['_PAGE_TYPE'] = 'Page';
            $_SESSION['_PAGE_URL'] = BURL . "lessons";
            $_SESSION['_PAGE_DESCRIPTOR'] = "All lessons for " . $row['name'];

            include_once 'views/header.php';
            include_once 'views/lessons.php';
            include_once 'views/footer.php';
        }
    }

    public function create($product_id)
    {
        $_SESSION['_PAGE_TITLE'] = 'Create Lesson';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . 'lessons/create/' . $product_id;
        $_SESSION['_PAGE_DESCRIPTOR'] = "Create a lesson.";
        $this->set_token();

        include_once 'views/header.php';
        include_once 'views/create_lesson.php';
        include_once 'views/footer.php';
    }

    public function edit($product_id, $lesson_id)
    {
        $this->set_token();
        $lesson = $this->db->query("SELECT * FROM `lessons` WHERE id='$lesson_id' LIMIT 1");
        $lesson = $lesson->fetch_assoc();

        $_SESSION['_PAGE_TITLE'] = 'Edit ' . $lesson['name'];
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . 'lessons/edit/' . $product_id . '/' . $lesson_id;
        $_SESSION['_PAGE_DESCRIPTOR'] = "Edit lesson.";

        include_once 'views/header.php';
        include_once 'views/edit_lesson.php';
        include_once 'views/footer.php';
    }

    public function delete_lesson($product_id, $lesson_id)
    {
        $this->auth->admin();
        $duration = $this->clean->post('duration');


        if ($duration == "") {
            $this->error = 1;
            $this->error_msg .= "Course Duration Filed Wasn't Fiiled";
        }
        if ($product_id == "") {
            $this->error = 1;
            $this->error_msg .= "Product Id not available";
        }
        if ($lesson_id == "") {
            $this->error = 1;
            $this->error_msg .= "Lesson Id not available";
        }

        if ($this->error == 0) {
            $this->db->query("UPDATE products SET duration=duration-$duration WHERE id='$product_id'");
            $this->db->query("DELETE FROM lessons WHERE id='$lesson_id'");

            $this->alert->set("Lesson Deleted successfully", "success");
            header('location:' . BURL . 'lessons/' . $product_id);
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('location:' . BURL . 'lessons/edit/' . $product_id . '/' . $lesson_id);
        }
    }

    public function update_lesson($product_id, $lesson_id)
    {
        $this->auth->admin();
        $name = $this->clean->post('name');
        $description = $this->clean->postx('description');
        $video = $this->clean->post('video');
        $duration = $this->clean->post('duration');
        $old_duration = $this->clean->post('old_duration');

        if ($name == "") {
            $this->error = 1;
            $this->error_msg .= "Course Name Wasn't Filled";
        }
        if ($description == "") {
            $this->error = 1;
            $this->error_msg .= "Course Description Filed Wasn't Filled";
        }
        if ($video == "") {
            $this->error = 1;
            $this->error_msg .= "Course Video Filed Wasn't Fiiled";
        }
        if ($duration == "") {
            $this->error = 1;
            $this->error_msg .= "Course Duration Filed Wasn't Fiiled";
        }
        if ($old_duration == "") {
            $this->error = 1;
            $this->error_msg .= "Course Old Duration Filed Wasn't Fiiled";
        }
        if ($this->error == 0) {
            $this->db->query("UPDATE lessons SET name='$name', description='$description',
            video='$video', product_id='$product_id', duration='$duration' WHERE id='$lesson_id'");

            $this->db->query("UPDATE products SET duration=duration-$old_duration+$duration WHERE id='$product_id'");

            $this->alert->set("Lesson Updated successfully", "success");
            header('location:' . BURL . 'lessons/' . $product_id);
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('location:' . BURL . 'lessons/edit/' . $product_id . '/' . $lesson_id);
        }
    }

    public function add_new_lesson($product_id)
    {
        $this->auth->admin();
        $name = $this->clean->post('name');
        $description = $this->clean->postx('description');
        $video = $this->clean->post('video');
        $duration = $this->clean->post('duration');

        if ($name == "") {
            $this->error = 1;
            $this->error_msg .= "Course Name Wasn't Filled";
        }
        if ($description == "") {
            $this->error = 1;
            $this->error_msg .= "Course Description Filed Wasn't Filled";
        }
        if ($video == "") {
            $this->error = 1;
            $this->error_msg .= "Course Video Filed Wasn't Fiiled";
        }
        if ($duration == "") {
            $this->error = 1;
            $this->error_msg .= "Course Duration Filed Wasn't Fiiled";
        }
        if ($this->error == 0) {
            $this->db->query("INSERT INTO lessons 
            (name, description, video, product_id, duration) 
            VALUES('$name', '$description', '$video', '$product_id', '$duration')");

            $this->db->query("UPDATE products SET duration=duration+$duration WHERE id='$product_id'");

            $this->alert->set("Lesson Added successfully", "success");
            header('location:' . BURL . 'lessons/create/' . $product_id);
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('location:' . BURL . 'lessons/create/' . $product_id);
        }
    }

    public function order_lesson($product_id)
    {
        $this->auth->admin();
        $orderString = $this->clean->post('orderString');

        if ($product_id == "") {
            $this->error = 1;
            $this->error_msg .= "Product Id Field Wasn't Filled";
        }

        if ($orderString == "") {
            $this->error = 1;
            $this->error_msg .= "Order String Field Wasn't Filled";
        }

        if ($this->error == 0) {
            $order = explode(',', $orderString);
            $order = array_map('trim', $order);

            $caseStatement = "CASE id ";
            $caseValue = 1;

            foreach ($order as $lesson_id) {
                $caseStatement .= "WHEN '$lesson_id' THEN " . $caseValue . " ";
                $caseValue++;
            }

            $caseStatement .= "ELSE orderId END";

            $query = "UPDATE lessons 
            SET orderId = $caseStatement
            WHERE id IN (" . implode(",", $order) . ")";
            $this->db->query($query);

            $this->alert->set("Lesson Ordered successfully", "success");
        } else {
            $this->alert->set($this->error_msg, "error");
        }
        header('location:' . BURL . 'lessons/' . $product_id);
    }
}
