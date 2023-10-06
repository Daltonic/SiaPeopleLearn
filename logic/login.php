<?php
class login extends boiler
{
    public function defaultb()
    {
        $_SESSION['_PAGE_TITLE'] = 'Login';
        $_SESSION['_PAGE_TYPE'] = 'Website';
        $_SESSION['_PAGE_URL'] = BURL . "login";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Admin Login";
        $this->set_token();
        include_once 'views/header.php';
        include_once 'views/login.php';
        include_once 'views/footer.php';
    }
}
