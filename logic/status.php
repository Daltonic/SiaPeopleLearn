<?php
class status extends boiler
{
    public function defaultb()
    {
        $this->auth->user();
        $_SESSION['_PAGE_TITLE'] = 'User Status';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "status";
        $_SESSION['_PAGE_DESCRIPTOR'] = "See your current status";
        $this->set_token();

        include_once 'views/header.php';
        include_once 'views/status.php';
        include_once 'views/footer.php';
    }
}
