<?php
/* Smarty version 3.1.33, created on 2020-07-09 18:36:50
  from 'F:\wamp\www\prestashop1_7\modules\mymodule5\views\templates\hook\mymodule3.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0747a2eb6220_91219468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c15188e98125a6e051d4fd79ba381623a41b4e8c' => 
    array (
      0 => 'F:\\wamp\\www\\prestashop1_7\\modules\\mymodule5\\views\\templates\\hook\\mymodule3.tpl',
      1 => 1594162768,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0747a2eb6220_91219468 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="block-contact">
    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact us','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</h4>
    <?php echo $_smarty_tpl->tpl_vars['contact_infos']->value['address']['formatted'];?>


    <?php if ($_smarty_tpl->tpl_vars['contact_infos']->value['email']) {?>
        <br>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Email: [1]%email%[/1]','sprintf'=>array('%email%'=>$_smarty_tpl->tpl_vars['contact_infos']->value['email'],'[1]'=>'<a href="">','[/1]'=>'</a>')),$_smarty_tpl ) );?>


    <?php }?>
</div><?php }
}
