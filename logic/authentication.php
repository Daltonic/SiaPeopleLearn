<?php
class authentication extends boiler
{
    public function register()
    {
        if ($this->validate() == 1) {
            $firstname = $this->clean->post('firstname');
            $lastname = $this->clean->post('lastname');
            $email = $this->clean->post('email');
            $password = $this->clean->post('password');

            if ($firstname == "") {
                $this->error = 1;
                $this->error_msg .= "firstname Is Empty";
            }

            if ($lastname == "") {
                $this->error = 1;
                $this->error_msg .= "lastname Is Empty";
            }

            if ($password == "") {
                $this->error = 1;
                $this->error_msg .= ' Empty password!';
            } else {
                $password = sha1(md5($password));
            }

            if ($email != "") {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $email = strtolower($email);
                $userQuery = $this->db->query("SELECT uid FROM users WHERE email='$email' LIMIT 1 ");
                $user = $userQuery->fetch_assoc();

                if ($userQuery->num_rows > 0) {
                    $this->error = 1;
                    $this->error_msg .= "Email Already Exist";
                }
            } else {
                if ($user->num_rows > 0) {
                    $this->error = 1;
                    $this->error_msg .= "Email is Empty ";
                }
            }

            if ($this->error == 0) {
                $token = sha1(microtime() . rand(0, 1000) . $email);
                $this->db->query("INSERT INTO users(firstname, lastname, email, password, token) VALUES('$firstname', '$lastname', '$email', '$password', '$token')");

                include_once 'views/email.php';

                $message = <<<EOF
                    Hello Dear,
                    <br/>
                    <br/>
                    Your registration was successfull.
                    <br/>
                    <br/>
                    You can now login to your account with your password.
                    <br/>
                    <br/>
                    If you have any questions or concerns, please feel free to reach out to our support team for further assistance.
                    <br/>
                    <br/>
                    Thank you,<br/>
                    Dapp Mentors
                EOF;


                $body = build_body("Registration successfull", $message, "", "");
                $this->mail->set_sender('noreply@dappmentors.org', 'Dapp Mentors');
                $this->mail->send("Registration successfull", $body, $email);

                $this->alert->set("Registration successfull", "success");
                header('location:' . BURL . 'notify');
            } else {
                $this->alert->set($this->error_msg, "danger");
                header('location:' . BURL . 'register');
            }
        } else {
            $this->alert->set("Invalid request", "danger");
            header('location:' . BURL);
        }
    }

    public function login()
    {
        if ($this->validate() == 1) {
            $email = $this->clean->post('email');
            $password = $this->clean->post('password');
            if ($email == "" || $password == "") {
                $this->error = 1;
                $this->error_msg .= "Email Or Password Is Empty";
            }
            $email = strtolower($email);
            $password = sha1(md5($password));
            $user_query = $this->db->query("SELECT * FROM users WHERE email='$email' AND password='$password' ");

            if ($user_query->num_rows < 1) {
                $this->error = 1;
                $this->error_msg .= ' Invalid details ! ';
            }

            if ($this->error == 0) {
                $token = sha1($email . microtime() . rand(0, 100));
                $_SESSION["_auth"] = $token;
                $this->db->query("UPDATE users SET token='$token' WHERE email='$email'");

                if ($user_query->fetch_assoc()['type'] <= 8) {
                    header('location:' . BURL . 'academy');
                } else {
                    header('location:' . BURL . 'management');
                }
            } else {
                $this->alert->set($this->error_msg, 'danger');
                header('location:' . BURL . "login");
            }
        } else {
            $this->alert->set("Invalid request", "danger");
            header('location:' . BURL . 'login');
        }
    }

    public function reset($pin)
    {
        if ($pin == "") {
            header('location:' . BURL . 'login');
        }

        $user_query = $this->db->query("SELECT * FROM `users` WHERE pin='$pin' AND CHAR_LENGTH(pin) = 6 LIMIT 1");
        if ($user_query->num_rows < 1) {
            header('location:' . BURL . 'login');
        }

        $_SESSION['_PAGE_TITLE'] = 'Rest Pin';
        $_SESSION['_PAGE_TYPE'] = 'Website';
        $_SESSION['_PAGE_URL'] = BURL . "reset";
        $_SESSION['_PAGE_DESCRIPTOR'] = "Reset your forgotten password";
        $this->set_token();

        include_once 'views/header.php';
        include_once 'views/reset.php';
        include_once 'views/footer.php';
    }

    public function change_password($pin)
    {
        if ($this->validate() == 1) {
            $password = $this->clean->post('password');
            $cpassword = $this->clean->post('cpassword');

            if ($password == "" || $cpassword == "") {
                $this->error = 1;
                $this->error_msg .= "Passwords Is empty";
            }

            if ($password != $cpassword) {
                $this->error = 1;
                $this->error_msg .= "Password not matching";
            }

            $password = sha1(md5($password));

            if ($this->error == 0) {
                $token = sha1($pin . microtime() . rand(0, 100));
                $reset_pin = substr($token, -6);

                $this->db->query("UPDATE users SET token='$token', password='$password', pin='$reset_pin' WHERE pin='$pin'");
                $user_query = $this->db->query("SELECT * FROM users WHERE pin='$reset_pin' AND password='$password' ");
                $user = $user_query->fetch_assoc();

                include_once 'views/email.php';

                $message = <<<EOF
                    Hello Dear,
                    <br/>
                    <br/>
                    Your password has been successfully changed.
                    <br/>
                    <br/>
                    You can now login to your account with your new password.
                    <br/>
                    <br/>
                    If you have any questions or concerns, please feel free to reach out to our support team for further assistance.
                    <br/>
                    <br/>
                    Thank you,<br/>
                    Dapp Mentors
                EOF;


                $body = build_body("Password change successfull", $message, "", "");
                $this->mail->set_sender('noreply@dappmentors.org', 'Dapp Mentors');
                $this->mail->send("Password change successfull", $body, $user['email']);

                $this->alert->set('Password change successfull', 'danger');
                header('location:' . BURL . "login");
            } else {
                $this->alert->set($this->error_msg, 'danger');
                header('location:' . BURL . "authentication/reset/" . $pin);
            }
        } else {
            $this->alert->set("Invalid request", "danger");
            header('location:' . BURL . 'register');
        }
    }

    public function send_pin()
    {
        if ($this->validate() == 1) {
            $email = $this->clean->post('email');
            if ($email == "") {
                $this->error = 1;
                $this->error_msg .= "Email Is Empty";
            }
            $email = strtolower($email);
            $user_query = $this->db->query("SELECT * FROM users WHERE email='$email' LIMIT 1");

            if ($user_query->num_rows < 1) {
                $this->error = 1;
                $this->error_msg .= ' Invalid details ! ';
            }

            if ($this->error == 0) {
                $reset_pin = substr(sha1($email . microtime() . rand(0, 100)), -6);
                $this->db->query("UPDATE users SET pin='$reset_pin' WHERE email='$email'");

                include_once 'views/email.php';

                $link = BURL . 'authentication/reset/' . $reset_pin;
                $message = <<<EOF
                    Hello Dear,
                    <br>
                    <br>
                    We have received a password recovery request for your account. If you did not initiate this request, please ignore this message.
                    <br>
                    <br>
                    If you did request to reset your password, please click on the link below to proceed with the password reset process.
                    <br>
                    <br>
                    If you have any questions or concerns, please feel free to reach out to our support team for further assistance.
                    <br>
                    <br>
                    Thank you,<br>
                    Dapp Mentors
                EOF;

                $body = build_body("Password Recovery Request", $message, "", $link);
                $this->mail->set_sender('noreply@dappmentors.org', 'Dapp Mentors');
                $this->mail->send("Password Recovery Request", $body, $email);

                $this->alert->set("Password Recovery Request", 'danger');
                header('location:' . BURL . "login");
            } else {
                $this->alert->set($this->error_msg, 'danger');
                header('location:' . BURL . "forget");
            }
        } else {
            $this->alert->set("Invalid request", "danger");
            header('location:' . BURL . 'forget');
        }
    }
}
