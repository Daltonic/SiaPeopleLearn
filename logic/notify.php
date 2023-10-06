<?php
class notify extends boiler
{
    public function defaultb()
    {
        $this->auth->user();
        $_SESSION['_PAGE_TITLE'] = 'Success';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "notify";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Early Access Registration Successful";

        include_once 'views/header.php';
        include_once 'views/notify.php';
        include_once 'views/footer.php';
    }
}
