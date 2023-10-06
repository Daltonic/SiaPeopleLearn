<?php
class success extends boiler
{
    public function defaultb()
    {
        $_SESSION['_PAGE_TITLE'] = 'Success';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "success";
        $_SESSION['_PAGE_DESCRIPTOR'] = "You recent payment was successfully received";
        $this->set_token();

        include_once 'views/header.php';
        include_once 'views/success.php';
        include_once 'views/footer.php';
    }
}
