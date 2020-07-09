<?php
/* Smarty version 3.1.33, created on 2020-07-08 18:25:29
  from 'F:\wamp\www\prestashop1_7\admin6774pg67d\themes\default\template\helpers\tree\tree_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f05f379ae9047_63237461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af9d9dbe5c888d965fef767baf14e1b23b0f8378' => 
    array (
      0 => 'F:\\wamp\\www\\prestashop1_7\\admin6774pg67d\\themes\\default\\template\\helpers\\tree\\tree_header.tpl',
      1 => 1587040546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f05f379ae9047_63237461 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><i class="icon-tag"></i>&nbsp;<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl ) );
}?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)) {
echo $_smarty_tpl->tpl_vars['toolbar']->value;
}?>
</div>
<?php }
}
