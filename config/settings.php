<?php 
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    DEFINE ('DBHOST','localhost');
	DEFINE ('DBUSR','root');
	DEFINE ('DBPASS','');
	DEFINE ('DB','dappmentors');
	DEFINE ('BURL','http://localhost/dappmentors/');
	DEFINE ('STRIPE_CHECKOUT','http://localhost:9000/checkout');
	DEFINE ('STRIPE_SUBSCRIBE','http://localhost:9000/subscribe');
} else {
    DEFINE ('DBHOST','localhost');
	DEFINE ('DBUSR','');
	DEFINE ('DBPASS','');
	DEFINE ('DB','');
	DEFINE ('BURL','');
	DEFINE ('STRIPE_CHECKOUT','');
	DEFINE ('STRIPE_SUBSCRIBE','');
}

DEFINE ('EX',"PHPMailer");


/*your global function*/
DEFINE ('GLOBALFUNC','helpers');
DEFINE ('DEFAULTSENDER','');
DEFINE ('DEFAULTSENDERNAME','');

/*your global classes */
DEFINE ('LOGINPG','index');
// Endpoint secret
DEFINE ('SECRET','');
