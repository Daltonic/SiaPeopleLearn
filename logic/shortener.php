<?php
class shortener extends boiler
{

    public function defaultb()
    {
        $this->auth->admin();
        $_SESSION['_PAGE_TITLE'] = 'Link Shortener';
        $links = $this->db->query("SELECT * FROM links WHERE deleted=false ORDER BY created_at DESC");

        include_once 'views/header.php';
        include_once 'views/shortened_links.php';
        include_once 'views/footer_assets_only.php';
    }

    public function link()
    {
        $this->set_token();
        $this->auth->admin();
        $_SESSION['_PAGE_TITLE'] = 'Create Shortened Link';

        include_once 'views/header.php';
        include_once 'views/create_link.php';
        include_once 'views/footer_assets_only.php';
    }

    public function edit_link($id)
    {
        $this->set_token();
        $this->auth->admin();
        $link = $this->db->query("SELECT * FROM `links` WHERE id='$id' ");
        $row = $link->fetch_assoc();

        $_SESSION['_PAGE_TITLE'] = 'Edit ' . $row['name'];
        include_once 'views/header.php';
        include_once 'views/edit_link.php';
        include_once 'views/footer_assets_only.php';
    }

    public function create_link()
    {
        $this->auth->admin();
        $name = $this->clean->post('name');
        $url = $this->clean->postx('url');

        if ($name == "") {
            $this->error = 1;
            $this->error_msg .= "Course Field Wasn't Filled";
        }
        if ($url == "") {
            $this->error = 1;
            $this->error_msg .= "Course Description Filed Wasn't Filled";
        }

        if ($this->error == 0) {
            $short_code = generate_short_code($name, $url);
            $this->db->query("INSERT INTO links (name, url, short_code) VALUES('$name', '$url', '$short_code')");

            $this->alert->set("Link Added successfully", "success");
            header('location:' . BURL . 'shortener');
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('location:' . BURL);
        }
    }

    public function update_link($id)
    {
        $this->auth->admin();
        $name = $this->clean->post('name');
        $url = $this->clean->postx('url');

        if ($name == "") {
            $this->error = 1;
            $this->error_msg .= "Course Field Wasn't Filled";
        }
        if ($url == "") {
            $this->error = 1;
            $this->error_msg .= "Course Description Filed Wasn't Filled";
        }

        if ($this->error == 0) {
            $this->db->query("UPDATE links SET name='$name', url='$url' WHERE id='$id'");

            $this->alert->set("Link Updated successfully", "success");
            header('location:' . BURL . 'shortener');
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('location:' . BURL);
        }
    }

    public function delete_link($id)
    {
        $this->auth->admin();

        if ($this->error == 0) {
            $this->db->query("UPDATE links SET deleted=true WHERE id='$id'");
            header('location:' . BURL . 'shortener');
        } else {
            $this->alert->set($this->error_msg, "danger");
            header('location:' . BURL);
        }
    }
}
