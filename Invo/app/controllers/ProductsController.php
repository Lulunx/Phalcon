<?php

/**
 * Class ProductsController
 * @property Ajax\JsUtils $jquery
 */
class ProductsController extends ControllerBase
{

    public function indexAction()
    {
        $semantic = $this->jquery->semantic();
        $products=Products::find([
                "order"=>"name"]
        );
        $semantic=$this->jquery->semantic();
        $lv=$semantic->dataTable("lv1-1","Products",$products);
        $lv->setFields(["name","productTypes"]);
        $lv->setCaptions(["Name","Type"]);
        $lv->setTargetSelector("#ProductDetails");
        $lv->setIdentifierFunction("getId");
        $lv->getOnRow("click","Products/click","#ProductDetails",["attr"=>"data-ajax","preventDefault"=>false,"stopPropagation"=>false]);
        $lv->addEditButton(true);
        $lv->setUrls([edit=>"products/edit"]);
        $lv->setActiveRowSelector("error");

        $this->jquery->compile($this->view);
    }

    public function clickAction($value)
    {
        $semantic = $this->jquery->semantic();
        $products=Products::findFirst("id=".$value);
        $de=$semantic->dataElement("de2",$products);
        $de->setFields(["name","productTypes","price", "active"]);
        echo $de;
    }

    public function editAction($value)
    {
        $semantic = $this->jquery->semantic();
        $products=Products::findFirst("id=".$value);
        $df=$semantic->dataForm("df9",$products);
        $df->setValidationParams(["inline"=>true]);
        $df->setFields(["name\n","product_types_id\n","price\n", "active\n", "Envoyer", "Annuler"]);
        $df->fieldAsDropdown("product_types_id\n",\Ajax\service\JArray::modelArray(ProductTypes::find(),"getId","getName"));
        $df->setCaptions(["Nom","Type","Prix", "Actif"]);
        //$df->addButtonInToolbar("Return");
        $df->fieldAsSubmit(4,"green fluid","product/submit","#df9-submit");
        $df->fieldAsButton(5, "red fluid","product/submit","#df9-submit");
        echo $df;
    }

    public function submitAction($value)
    {
        $semantic = $this->jquery->semantic();
        $products=Products::findFirst("id="+$value);
        $de=$semantic->dataElement("de2",$products);
        $de->setFields(["name","productTypes","price", "active"]);
        echo $de;
    }

}
/**
 * @var Ajax\Semantic
 */
