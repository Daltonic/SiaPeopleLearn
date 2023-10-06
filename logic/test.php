<?php
class test extends boiler
{
    public function defaultb()
    {
        $_SESSION['_PAGE_TITLE'] = 'Test';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "test";
        $_SESSION['_PAGE_DESCRIPTOR'] = "You recent payment was successfully received";
        $this->set_token();

        include_once 'views/header.php';
        include_once 'views/test.php';
        include_once 'views/footer.php';
    }
}
