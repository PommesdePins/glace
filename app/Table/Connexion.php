<?php


namespace App\Table;


class Connexion
{
    public function inscriptionTraitement()
    {

        require(ROOT_PROJECT. '/app/captcha/autoload.php');
        $secret = '6LeGbYcdAAAAADGRsng3vQiY5L57xBXuXhjjdUHu';
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);

        function verifMotDePasse(string $mdp)
        {
            if (strlen($mdp) >= 8) {
                $minCarac = false;
                $majCarac = false;
                $specialCarac = false;
                $special = ["!", "*", "#", "$", "&"];

                for ($i = 0; $i < strlen($mdp); $i++) {
                    if (ctype_lower($mdp[$i])) {
                        $minCarac = true;
                    }
                    if (ctype_upper($mdp[$i])) {
                        $majCarac = true;
                    }
                    foreach ($special as $caractere) {
                        if ($mdp[$i] == $caractere) {
                            $specialCarac = true;
                        }
                    }
                }
            }
//            return $minCarac && $majCarac && $specialCarac;
            return true;
        }

        try {
            $bdd = new \PDO("mysql:host=localhost;dbname=glace;charset=utf8", "root", "");

        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }


        if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password_retype = htmlspecialchars($_POST['password_retype']);

            $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateur WHERE email = ?');
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();

            $email = strtolower($email);
            if ($row == 0) {
                if (strlen($pseudo) <= 50) {
                    if (strlen($email) <= 50) {
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            if ($password === $password_retype) {
                                if (verifMotDePasse($password)) {
                                    $cost = ['cost' => 12];
                                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                                    $ip = $_SERVER['REMOTE_ADDR'];

                                    if (isset($_POST['g-recaptcha-response'])) {
                                        $resp = $recaptcha->verify($_POST['g-recaptcha-response']);
                                        if ($resp->isSuccess()) {

                                            $insert = $bdd->prepare('INSERT INTO utilisateur(pseudo, email, password, ip) VALUES(:pseudo, :email, :password, :ip)');
                                            $insert->execute(array(
                                                'pseudo' => $pseudo,
                                                'email' => $email,
                                                'password' => $password,
                                                'ip' => $ip
                                            ));

                                            header('Location:register?reg_err=success');
                                            die();
                                        } else {
                                            header('Location: register?reg_err=capchat');
                                            die();
                                        }

                                    } else {
                                        header('Location: register?reg_err=capchat');
                                        die();
                                    }


                                } else {
                                    header('Location: register?reg_err=password_condition');
                                    die();
                                }
                            } else {
                                header('Location: register?reg_err=password');
                                die();
                            }
                        } else {
                            header('Location: register?reg_err=email');
                            die();
                        }
                    } else {
                        header('Location: register?reg_err=email_length');
                        die();
                    }
                } else {
                    header('Location: register?reg_err=pseudo_length');
                    die();
                }
            } else {
                header('Location: register?reg_err=already');
                die();
            }
        }

    }
    public function connexion(){

        try {
            $bd = new \PDO('mysql:host=localhost;dbname=glace;', 'root', '');
        } catch (\Exception $e) {
            die("Erreur :" . $e->getMessage());
        }
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);


            $query = 'SELECT pseudo,email,password,id FROM utilisateur WHERE email = ?';
            $check = $bd->prepare($query);
            $check->execute(array($email));

            $data = $check->fetch();
            $row = $check->rowCount();

            if ($row == 1) {

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {



                    if (password_verify($password, $data['password'])) {

                        $_SESSION['user'] = ['pseudo'=>$data['pseudo'],'id'=>$data['id']];

                        header('Location:panier');
                        die();

                    } else header('Location:login?login_err=password');
                } else header('Location:login?login_err=email');
            } else header('Location:login?login_err=already');


        }else header('Location:');
    }

}