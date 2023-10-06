<?php
class forget extends boiler
{
    public function defaultb()
    {
        $_SESSION['_PAGE_TITLE'] = 'Reset Password';
        $_SESSION['_PAGE_TYPE'] = 'Website';
        $_SESSION['_PAGE_URL'] = BURL . "reset";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Reset your password";
        $this->set_token();
        include_once 'views/header.php';
        include_once 'views/forget.php';
        include_once 'views/footer.php';
    }
}
