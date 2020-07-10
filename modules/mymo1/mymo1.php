<?php
/**
* 2007-2020 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2020 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Mymo1 extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'mymo1';
        $this->tab = 'others';
        $this->version = '1.0.0';
        $this->author = 'Isma';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('My Mo1');
        $this->description = $this->l('Gran modulo para prestashop');

        $this->confirmUninstall = $this->l('Estas seguro que deseas desinstalar?');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('MYMO1_LIVE_MODE', false);

        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayLeftColumn') &&
            $this->registerHook('displayRightColumn');
    }

    public function uninstall()
    {
        Configuration::deleteByName('MYMO1_LIVE_MODE');

        include(dirname(__FILE__).'/sql/uninstall.php');

        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
       /* if (((bool)Tools::isSubmit('submitMymo1Module')) == true) {
            $this->postProcess();
        }*/
        if( (Tools::isSubmit('submitMymo1Module')) == true ){
            echo "hemos echo submit";
            $this->postProcess2();
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        $resultadosConsulta = $this->getResults();
        $this->context->smarty->assign('variable1', $resultadosConsulta);
        $this->getResult2();
       // echo "Esta logueado ".$this->context->employee->isLoggedBack();
       // echo "este valor esta en la tabla configuratrion: ". Configuration::get('PS_VERSION_DB');

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        //return $output.$this->retornarTabla();

        return $output.$this->renderForm();
    }

    public function getResult(){
        $sql = 'SELECT * FROM'._DB_PREFIX_.'address';
        if($row = DB::getInstance()->getRow($sql)){
            return $row['alias'];
        }
    }

    public function obtenerGeneros(){
        $options = array();
        $sql = 'SELECT * FROM '._DB_PREFIX_.'gender';
        if($results = DB::getInstance()->executeS( $sql ))
            $genero ='';
            foreach($results as $row){
                if($row['type'] == 0) $genero = 'hombre';
                if($row['type'] == 1) $genero = 'mujer';
                $options[]= array(
                    'id_option' => (int)$row['id_gender'],
                    'name' => $genero
                );
            }

        var_dump($options);
            return $options;
    }

    public function getResults(){
        $sql = 'SELECT * FROM '._DB_PREFIX_.'address';
        if ($results = Db::getInstance()->ExecuteS($sql))
            foreach ($results as $row) {
                //echo $row['id_address'] . ' :: ' . $row['alias'] . '<br />';
                $devolver = 'Direccion: '.$row['alias'];
            }

        return $devolver;
    }

    public function getResult2(){
        //$sql = 'SELECT * FROM '._DB_PREFIX_.'address';
        $sql = 'SELECT count(*) FROM '._DB_PREFIX_.'address';
        $total = Db::getInstance()->getValue($sql);
        echo "bienn ".$total;
    }

    protected function renderForm(){
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitMymo1Module';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm2()));
    }

    private function retornarTabla(){
        $resultados = Db::getInstance()->executes("SELECT * FROM "._DB_PREFIX_."category ");
        $this->fields_list = array(
            'id_category' => array(
                'title' => $this->l('Id'),
                'width' => 140,
                'type' => 'text',
                'filter_key' => 'sf!tipo',
                'havingFilter' => true
            ),
            'id_parent' => array(
                'title' => $this->l('Name'),
                'width' => 140,
                'type' => 'text',
                'filter_key' => 'sf!tipo',
                'havingFilter' => true
            ),
            'level_depth' => array(
                'title' => $this->l("Level"),
                'width' => 140,
                'type' => 'text',
                'filter_key' => 'sf!tipo',
                'havingFilter' => true
            )
        );
        $helper = new HelperList();

        $helper->shopLinkType = '';

        $helper->simple_header = false;
        $helper->listTotal = count($resultados);

        // Actions to be displayed in the "Actions" column
        $helper->actions = array('edit', 'delete', 'view');

        $helper->identifier = 'id_category';
        $helper->show_toolbar = true;
        $helper->title = 'HelperList';
        $helper->table = $this->name.'_categories';
        $helper->_pagination = array(10, 20, 50, 100, 200);


        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        return $helper->generateList($resultados, $this->fields_list);

    }

    protected function getConfigForm(){
        /*$options = array(
            array(
              'id_option' => '0',
              'name'=> 'Seleccione una opcion'
            ),
            array(
                'id_option' => 1,
                'name' => 'Hombre'
            ),
            array(
                'id_option' => 2,
                'name' => 'Mujer'
            )
        );*/
        $options = array();
        $options = $this->obtenerGeneros();
        return array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Configuraciones'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'name' => 'configuracion1',
                        'label' => $this->l("Escriba Configuracion1")
                    ),
                    array(
                        'col' => 3,
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'type' => 'text',
                        'name' => 'email',
                        'desc' => 'Escriba su email',
                        'label' => 'Email'
                    ),
                    array(
                        'type' => 'select',
                        'label'=> $this->l('Sexo'),
                        'desc' => $this->l('Seleccione Sexo'),
                        'name' => 'sexo',
                        'options' => array(
                            'query' => $options,
                            'id'=> 'id_option',
                            'name' => 'name'
                        )

                    ),
                    array(
                        'type' =>'radio',
                        'label' =>$this->l('HAbilitar esta opcion'),
                        'desc' =>$this->l('Eres también un cliente'),
                        'is_bool' => true,
                        'class'     => 't',
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' =>1,
                                'label'=>$this->l("es activo")
                            ),
                            array(
                                'id' => 'active_off',
                                'value' =>0,
                                'label'=>$this->l("Disable")
                            )
                        )

                    ),
                    array(
                        'type' => 'checkbox',
                        'label' => $this->l('Options'),
                        'desc' => $this->l('choose option'),
                        'name' => 'options',
                        'values' => array(
                            'query' => $options,
                            'id' => 'id_option',
                            'name' => 'name'
                        ),
                        'expand' => array(
                            ['print_total'] => count($options),
                            'default' => 'show',
                            'show' => array('text' => $this->l('show'), 'icon' => 'plus-sign-alt'),
                            'hide' => array('text' => $this->l('hide'), 'icon' => 'minus-sign-alt')
                        ),
                    )
                ),
                'submit' => array(
                    'title' => $this->l(' Enviar '),
                    'class' => 'btn btn-default pull-right'
                )
            )
        );
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm2()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitMymo1Module';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm2()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm2()
    {
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Live mode'),
                        'name' => 'MYMO1_LIVE_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Use this module in live mode'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'desc' => $this->l('Enter a valid email address'),
                        'name' => 'MYMO1_ACCOUNT_EMAIL',
                        'label' => $this->l('Email'),
                    ),
                    array(
                        'type' => 'password',
                        'name' => 'MYMO1_ACCOUNT_PASSWORD',
                        'label' => $this->l('Password'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save')
                ),
            ),
        );
    }

    protected function getConfigForm3()
    {
        return
            $this->fields_options = array(
                'general' => array(
                    'title' => $this->l('Parameters'),
                    'fields' => array(
                        'PS_MYMODULE_OPTION1' => array(
                            'title' => $this->l('Choose one'),
                            'desc' => $this->l('Choose between Yes and No.'),
                            'cast' => 'boolval',
                            'type' => 'bool'
                        ),
                        'PS_MYMODULE_OPTION2' => array(
                            'title' => $this->l('Add some text'),
                            'desc' => $this->l('This is where you can add some text'),
                            'cast' => 'strval',
                            'type' => 'text',
                            'size' => '10'
                        )
                    )
                )
            );

    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'MYMO1_LIVE_MODE' => Configuration::get('MYMO1_LIVE_MODE', true),
            'MYMO1_ACCOUNT_EMAIL' => Configuration::get('MYMO1_ACCOUNT_EMAIL', 'contact@prestashop.com'),
            'MYMO1_ACCOUNT_PASSWORD' => Configuration::get('MYMO1_ACCOUNT_PASSWORD', null),
        );
    }

    public function postProcess(){

    }

    /**
     * Save form data.
     */
    protected function postProcess2()
    {
        $form_values = $this->getConfigFormValues();

        //Configuration::updateValue('PS_PDF_IMG_DELIVERY', 1);
        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }

    public function hookDisplayLeftColumn()
    {
        $this->context->controller->registerJavascript('fichero.js', 'modules/'.$this->name.'/views/js/fichero.js',['position' => 'bottom', 'priority' => 150]);
        $this->context->controller->registerStylesheet('fichero.css', 'modules/'.$this->name.'/views/css/fichero.css', ['media' => 'all', 'priority' => 150]);
        /* Place your code here. */
        $this->context->smarty->assign([
            'my_module_name' => $this->name,
            'my_module_link' => $this->context->link->getModuleLink('mymodule5', 'display'),
            'my_module_message' => $this->l('This is a simple text message') // Do not forget to enclose your strings in the l() translation method
        ]);

        return $this->display(__FILE__, 'mymo1.tpl');
    }

    public function hookDisplayRightColumn()
    {
        /* Place your code here. */
    }
}
