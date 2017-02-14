<?php

class UserController extends ControllerBase
{
    /**
     * Created by PhpStorm.
     * User: Lucas
     * Date: 01/02/2017
     * Time: 15:05
     */
    /*
     * Liste par défaut des utilisateurs, triés suivant sField dans l'ordre sens, en utilisant le filtre filter
     */
    public function indexAction($page=1,$sField="firstname",$sens="asc", $filter=NULL)
{
    $deb=10*$page-9;
    $users=User::find([
            "order"=>$sField." ".$sens,
            "offset"=>$deb,
            "limit"=>10]
    );
    $this->view->setVar("users",$users);
}

    /*
     * Formulaire de saisie/modification d'un utilisateur, id est la clé primaire de l'utilisateur à modifier
     */
    function formAction($id=-1)
    {
        $users=User::findFirst($id);
        $this->view->setVar("user",$users);
    }

    /*
     * Met à jour l'utilisateur posté dans la base de données, puis affiche un message
     */
    function updateAction($id)
    {
        $users=User::findFirst($id);
        $this->view->setVar("user",$users);
    }

    /*
     * Supprime l'utilisateur dont l'id est passé en paramètre
     */
    function deleteAction($id=-1)
    {
        $user=User::findFirst($id);
        $user->delete();
    }

    /*
     * Gère le message de mise à jour et affiche la vue
     */
    function messageAction($action="",$id=-1)
    {
        if ($action == "delete") {
            $message = $this->deleteAction($id);
            $message = "L'utilisateur a bien été supprimé !";
        } else if ($action == "add" || $action == "update") {
            if (isset($_POST['firstname']))
                $firstname = $_POST['firstname'];
            if (isset($_POST['lastname']))
                $lastname = $_POST['lastname'];
            if (isset($_POST['email']))
                $email = $_POST['email'];
            if (isset($_POST['role']))
                $role = $_POST['role'];
            if (isset($_POST['password']))
                $password = $_POST['password'];
            if (isset($_POST['login']))
                $login = $_POST['login'];

            if ($action == "add") {
                $user=new User();
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $user->setidRole(2);
                $user->setPassword($password);
                $user->setLogin($login);
                $user->save();
                $message = "L'utilisateur a bien été ajouté !";
            }

            if ($action == "update") {
                $user=User::findFirst($id);
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $user->setidRole(2);
                $user->setPassword($password);
                $user->setLogin($login);
                $user->save();
                $message = "L'utilisateur a bien été modifié !";
            }

            $this->view->setVar("message", $message);
        }
    }
}
