<?php
class canceled extends boiler
{
    public function defaultb()
    {
        $_SESSION['_PAGE_TITLE'] = 'Canceled';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "canceled";
        $_SESSION['_PAGE_DESCRIPTOR'] = "You recent payment was not successful";
        $this->set_token();

        include_once 'views/header.php';
        include_once 'views/canceled.php';
        include_once 'views/footer.php';
    }
}
