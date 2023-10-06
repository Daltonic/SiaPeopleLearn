<?php
class notfound extends boiler
{
    public function defaultb()
    {
        $_SESSION['_PAGE_TITLE'] = '404';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "notfound";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Page not found";
        $this->set_token();
        include_once 'views/header.php';
        include_once 'views/404.php';
        include_once 'views/footer.php';
    }
}
