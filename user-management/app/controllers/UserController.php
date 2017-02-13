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
    function formAction($id=1)
    {
        $users=User::find([
                "id = $id"]
        );
        $this->view->setVar("user",$users);
    }

    /*
     * Met à jour l'utilisateur posté dans la base de données, puis affiche un message
     */
    function updateAction($id)
    {

    }

    /*
     * Supprime l'utilisateur dont l'id est passé en paramètre
     */
    function deleteAction($id=-1)
    {

    }

    /*
     * Gère le message de mise à jour et affiche la vue
     */
    function messageAction($action="",$id=-1)
    {
        $message="L'utilisateur a bien été supprimé !";
        $this->view->setVar("message",$message);
    }
}
