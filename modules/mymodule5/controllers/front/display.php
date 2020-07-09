<?php
class mymodule3displayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        $this->setTemplate('module:mymodule3/views/templates/front/display.tpl');
    }
}