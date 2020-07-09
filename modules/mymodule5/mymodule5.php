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

class Mymodule5 extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'mymodule5';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Urza';
        $this->need_instance = 1;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Mi nuevo modulo 5');
        $this->description = $this->l('Gran modulo para prestashop');

        $this->confirmUninstall = $this->l('¿Estas seguro que deseas desinstalar el modulo?');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('MYModule5_LIVE_MODE', false);
        //Configuration::updateValue('MYModule53_LIVE_MODE', false);

        include(dirname(__FILE__).'/sql/install.php');

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayLeftColumn') &&
            $this->registerHook('displayRightColumn');
    }

    public function uninstall()
    {
        Configuration::deleteByName('MYModule5_LIVE_MODE');
        //Configuration::updateValue('MYModule5_LIVE_MODE', true);


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
        echo "por aqui0";
        if (((bool)Tools::isSubmit('submitMymodule5Module')) == true) {
            $this->postProcess();
            echo "por aqui1";
        }
echo "por aqui2: ".$this->_path;
        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitMymodule5Module';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
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
                        'name' => 'MYModule5_LIVE_MODE',
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
                        'name' => 'MYModule5_ACCOUNT_EMAIL',
                        'label' => $this->l('Email'),
                    ),
                    array(
                        'type' => 'password',
                        'name' => 'MYModule5_ACCOUNT_PASSWORD',
                        'label' => $this->l('Password'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'MYModule5_LIVE_MODE' => Configuration::get('MYModule5_LIVE_MODE', true),
            'MYModule5_ACCOUNT_EMAIL' => Configuration::get('MYModule5_ACCOUNT_EMAIL', 'contact@prestashop.com'),
            'MYModule5_ACCOUNT_PASSWORD' => Configuration::get('MYModule5_ACCOUNT_PASSWORD', null),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

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
        //$this->hookDisplayLeftColumn();
        //vamos a hacer lo del contact
        $address = $this->context->shop->getAddress();
       // echo "a ".$address->id_country;
       // echo "direccion: ". var_dump($this->context->shop->getAddress());

        $contact_infos = [
            'company' => Configuration::get('PS_SHOP_NAME'),
            'address' => [
                'formatted' => AddressFormat::generateAddress($address, array(), '<br />'),
                'address1' => $address->address1,
                'address2' => $address->address2,
                'postcode' => $address->postcode,
                'city' => $address->city,
                'state' => (new State($address->id_state))->name[$this->context->language->id],
                'country' => (new Country($address->id_country))->name[$this->context->language->id],
            ],
            'phone' => Configuration::get('PS_SHOP_PHONE'),
            'fax' => Configuration::get('PS_SHOP_FAX'),
            'email' => Configuration::get('PS_SHOP_EMAIL'),
        ];

        $this->context->smarty->assign([
            'my_module_name' => $this->name,
            'contact_infos' => $contact_infos,
            'my_module_message' => $this->l('This is a simple text message') // Do not forget to enclose your strings in the l() translation method
        ]);

        return $this->display(__FILE__, 'mymodule3.tpl');

    }

    public function hookDisplayLeftColumn()
    {

       // $category = new Category((int)Configuration::get('PS_HOME_CATEGORY'), $this->context->language->id);
        $categoria = (int)Configuration::get('PS_HOME_CATEGORY');
       // var_dump($categoria);

        $language = $this->context->language->id;

        echo "esto no funciona ".$this->context->language->id;
        $category = new Category($categoria, $language);
      // var_dump($category);

        /* Place your code here. */
        $this->context->smarty->assign([
            'current_category' => $category->id,
            'categories' =>$this->getCategories($category),
            'my_module_name' => $this->name,
            'my_module_link' => $this->context->link->getModuleLink('mymodule5', 'display'),
            'my_module_message' => $this->l('This is a simple text message') // Do not forget to enclose your strings in the l() translation method
        ]);

        return $this->display(__FILE__, 'mymodule5.tpl');
    }

    public function hookDisplayRightColumn()
    {
        $this->hookDisplayLeftColumn();
    }

    public function getCategories($category){
        return "Hhhhh";
    }
}
