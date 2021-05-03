<?php
class User{
    private $id = "";
    public $prenom = "";
    public $nom = "";
    public $mail = "";

    private function connectdb(){
        $db = new PDO('mysql:host=localhost;dbname=tdl', 'root', '');
        return($db);
    }

    public function register($nom, $prenom, $mail, $pass){
        $db = $this->connectdb();
        $password = password_hash($pass, PASSWORD_BCRYPT);
        $request = $db->prepare("INSERT INTO utilisateurs (nom, prenom, email, password) VALUES ('$nom', '$prenom', '$mail', '$password')");
        $request->execute();
    }

    public function login($mail, $pass){
        $db = $this->connectdb();
        $request = $db->prepare("SELECT id FROM utilisateurs WHERE email = '$mail'");
        $request->execute();
        $checkuser = $request->rowCount();
        if($checkuser === 1){
            $request = $db->prepare("SELECT password FROM utilisateurs WHERE email = '$mail'");
            $request->execute();
            $result = $request->fetchAll();
            $password = $result[0][0];
            $checkpass = password_verify($pass, $password);
            if($checkpass == true){
                $request = $db->prepare("SELECT id, nom, prenom, email FROM utilisateurs WHERE email = '$mail'");
                $request->execute();
                $data = $request->fetchAll();
                $this->id = $data[0][0];
                $this->nom = $data[0][1];
                $this->prenom = $data[0][2];
                $this->mail = $data[0][3];
                $user['id'] = $this->id;
                $user['nom'] = $this->nom;
                $user['prenom'] = $this->prenom;
                $user['mail'] = $this->mail;
                $_SESSION['user'] = $user;
                //var_dump($_SESSION);
                // $result needed pour script
                $result = true;
                echo json_encode(array("success"=>$result));
            }
            else{
                // $result needed pour script
                $result = false;
                echo json_encode(array("success"=>$result));
            }
        }
        else{
            // $result needed pour script
            $result = false;
            echo json_encode(array("success"=>$result));
        }
    }
}