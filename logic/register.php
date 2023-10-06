<?php
class register extends boiler
{
    public function defaultb()
    {
        $_SESSION['_PAGE_TITLE'] = 'Register';
        $_SESSION['_PAGE_TYPE'] = 'Register';
        $_SESSION['_PAGE_URL'] = BURL . "register";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Join Dapp Mentors Academy";

        $this->set_token();
        include_once 'views/header.php';
        include_once 'views/register.php';
        include_once 'views/footer.php';
    }
}
