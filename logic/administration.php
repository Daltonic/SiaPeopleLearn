<?php
class administration extends boiler
{

    public function create_product()
    {
        $this->auth->admin();
        $name = $this->clean->post('name');
        $description = $this->clean->postx('description');
        $category = $this->clean->post('category');
        $image = $this->clean->post('image');
        $price = $this->clean->post('price');
        $instructor = $this->clean->post('instructor');

        if ($name == "") {
            $this->error = 1;
            $this->error_msg .= "Course Name Wasn't Filled";
        }
        if ($description == "") {
            $this->error = 1;
            $this->error_msg .= "Course Description Filed Wasn't Filled";
        }
        if ($category == "") {
            $this->error = 1;
            $this->error_msg .= "Course Category Wasn't Selected";
        }
        if ($image == "") {
            $this->error = 1;
            $this->error_msg .= "Course Image Filed Wasn't Fiiled";
        }
        if ($price == "") {
            $this->error = 1;
            $this->error_msg .= "Course Price Filed Wasn't Fiiled";
        }
        if ($instructor == "") {
            $this->error = 1;
            $this->error_msg .= "Course Instructor Filed Wasn't Fiiled";
        }
        
        if ($this->error == 0) {
            $slug = to_slug($name);
            $this->db->query("INSERT INTO products 
            (name, description, image, price, category, slug, instructor) 
            VALUES('$name', '$description', '$image', '$price', '$category', '$slug', '$instructor')");
            
            // var_dump($this->db->error);
            $this->alert->set("products Added successfully", "success");
            header('location:' . BURL . 'management');
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('location:' . BURL);
        }
    }

    public function update_product($product_id)
    {
        $this->auth->admin();
        $name = $this->clean->post('name');
        $description = $this->clean->postx('description');
        $category = $this->clean->post('category');
        $image = $this->clean->post('image');
        $price = $this->clean->post('price');
        $instructor = $this->clean->post('instructor');

        if ($product_id == "") {
            $this->error = 1;
            $this->error_msg .= "Product Id empty";
        }
        if ($name == "") {
            $this->error = 1;
            $this->error_msg .= "Course Field Wasn't Filled";
        }
        if ($description == "") {
            $this->error = 1;
            $this->error_msg .= "Course Description Filed Wasn't Filled";
        }
        if ($category == "") {
            $this->error = 1;
            $this->error_msg .= "category Field Wasn't Selected";
        }
        if ($image == "") {
            $this->error = 1;
            $this->error_msg .= "Course Image Filed Wasn't Fiiled";
        }
        if ($price == "") {
            $this->error = 1;
            $this->error_msg .= "Course Price Filed Wasn't Fiiled";
        }
        if ($instructor == "") {
            $this->error = 1;
            $this->error_msg .= "Course Instructor Filed Wasn't Fiiled";
        }
        
        if ($this->error == 0) {
            $slug = to_slug($name);
            $this->db->query("UPDATE products SET name='$name',
            description='$description', image='$image', price='$price', category='$category',
            slug='$slug', instructor='$instructor' WHERE id='$product_id'");

            $this->alert->set("Product Updated successfully", "success");
            header('location:' . BURL . 'management');
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('location:' . BURL . 'management/edit_product/' . $product_id);
        }
    }
}
