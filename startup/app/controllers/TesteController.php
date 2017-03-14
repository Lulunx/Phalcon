<?php

class TesteController extends ControllerBase{
    protected $semantic;
    public function initialize(){
        $this->semantic=$this->jquery->semantic();
    }
    /**
     * Default action
     */
    public function indexAction(){
        $semantic = $this->jquery->semantic();
        $bt1=$semantic->htmlButton("btLoad","Chargement");
        $bt1->addIcon("user");
        $bt1->getOnClick("teste/page1", "#page1");
        $this->jquery->compile($this->view);
    }

    /**
     * Ajax action
     * @param $id
     */
    public function ajaxAction($value){
        $semantic = $this->jquery->semantic();
        $bt = $semantic->htmlButton("btReturn", "Return to index/index", "teal basic");
        $bt->onClick($this->jquery->doJQueryDeferred("#ajaxResponse", "html", "Return clicked"));
        $message = $semantic->htmlMessage("msg", "You clicked the button with value : <b>" . $value . "</b><br>", "info");
        echo $message->addContent($bt)->setIcon("info")->setDismissable();
        echo $this->jquery->compile($this->view);
        $this->view->disable();
    }

    public function page1Action($id=""){
        $this->view->disable();
        $semantic=$this->jquery->semantic();
        $info=$semantic->htmlMessage("mess","Contenu de la page 1");
        $info->setIcon("info circle");
        echo $info;
        echo "<div id=\"page2\">";
        $this->jquery->get("Teste/page2","#page2");
        echo $this->jquery->compile();
        echo "</div>";
    }

    public function page2Action($id=""){
        $this->view->disable();
        $semantic=$this->jquery->semantic();
        $info=$semantic->htmlMessage("mess","Contenu de la page 2");
        $info->setIcon("info circle");
        echo $info;
    }

}

