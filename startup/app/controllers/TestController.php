<?php

class TestController extends ControllerBase{
    protected $semantic;
    public function initialize(){
        $this->semantic=$this->jquery->semantic();
    }
	/**
	 * Default action
	 */
	public function indexAction(){
		$semantic = $this->jquery->semantic();

		$bt = $semantic->htmlButtonGroups("bts", ["One","Two","Three"]);
		$bt->getOnClick("index/ajax", "#ajaxResponse",["attr"=>"html"]);
		$header = $semantic->htmlHeader("header1", 1);
		$header->asTitle("Congratulations", "<div>You're now flying with Phalcon. Great things are about to happen with phpMv-UI!</div>");
		$header2=$semantic->htmlHeader("header2",3);
		$header2->asTitle("Semantic-UI test","<p>Click on one of these buttons :</p>");
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

    public function ChangeCssAction(){
        $semantic=$this->jquery->semantic();
        $bt1=$semantic->htmlButton("btnPage1","Bouton 1");
        $bt1->addIcon("user");
        $bt2=$semantic->htmlButton("btnPage2","Bouton 2");
        $bt2->addIcon("user");
        $bt1->getOnClick("test/page1", "#PageContent", ["attr"=>"data-ajax","ajaxTransition"=>"random"]);
        $bt2->getOnClick("test/page2", "#PageContent", ["attr"=>"data-ajax","ajaxTransition"=>"random"]);
        $bt1->on("mouseover","test/page2", "#PageContent", ["attr"=>"data-ajax","ajaxTransition"=>"random"]);
        $this->jquery->compile($this->view);
    }

	public function hideShowAction(){
	    $semantic=$this->jquery->semantic();
	    $bt=$semantic->htmlCheckbox("ckTest","Afficher/Masquer");
	    $bt->setChecked(true);
	    $message=$this->semantic->htmlMessage("zone");
	    $bt->on("change",$message->jsToggle("$(this).prop('checked')"));
	    $this->jquery->compile($this->view);
    }

    public function page1Action($id=""){
        $semantic=$this->jquery->semantic();
        $info=$semantic->htmlMessage("mess","Contenu de la page 1".$id);
        $info->setIcon("info circle");
        echo $info;
    }

    public function page2Action($id=""){
        $semantic=$this->jquery->semantic();
        $info=$semantic->htmlMessage("mess","Contenu de la page 2".$id);
        $info->setIcon("info circle");
        echo $info;
    }

    public function reponseAction($id=""){
        $semantic=$this->jquery->semantic();
        $info=$semantic->htmlMessage("mess","Reponse ok".$id);
        $info->setIcon("info circle");
        echo $info;
    }
}

