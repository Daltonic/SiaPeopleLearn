<?php
class membership extends boiler
{
    public function defaultb()
    {
        $_SESSION['_PAGE_TITLE'] = 'Dapp Mentors Academy';
        $_SESSION['_PAGE_TYPE'] = 'Page';
        $_SESSION['_PAGE_URL'] = BURL . "membership";
        $_SESSION['_PAGE_IMAGE'] = BURL . "assets/academy.png";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Your all-in-one resource and transition center for web3 is live, check it out the link below!";
        $this->set_token();

        include_once 'views/header.php';
        include_once 'views/membership.php';
        include_once 'views/loader.php';
        include_once 'views/footer.php';
    }
}