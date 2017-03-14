<?php

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
        $lv->setFields(["name","product_types_id"]);
        $lv->setCaptions(["Name","Type"]);
        $lv->setTargetSelector("#lv1-1-detail");
        $lv->getOnRow("click","sTest/show","#lv1-1-detail",["attr"=>"data-ajax","preventDefault"=>false,"stopPropagation"=>false]);
        $lv->setActiveRowSelector("error");
        echo $lv;
        $this->jquery->compile($this->view);
    }

}

