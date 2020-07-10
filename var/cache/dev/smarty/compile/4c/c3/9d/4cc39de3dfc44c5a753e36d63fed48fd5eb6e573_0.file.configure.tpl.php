<?php
/* Smarty version 3.1.33, created on 2020-07-10 17:39:46
  from 'F:\wamp\www\prestashop1_7\modules\mymo1\views\templates\admin\configure.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f088bc29bc5d6_19111243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cc39de3dfc44c5a753e36d63fed48fd5eb6e573' => 
    array (
      0 => 'F:\\wamp\\www\\prestashop1_7\\modules\\mymo1\\views\\templates\\admin\\configure.tpl',
      1 => 1594310795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f088bc29bc5d6_19111243 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel">
	<h3>Esto es mi panel</h3>
	<p><?php echo $_smarty_tpl->tpl_vars['variable1']->value;?>
</p>
</div>

<div class="panel">
	<h3><i class="icon icon-credit-card"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'My Mo1','mod'=>'mymo1'),$_smarty_tpl ) );?>
</h3>
	<p>
		<strong><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Here is my new generic module!','mod'=>'mymo1'),$_smarty_tpl ) );?>
</strong><br />
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Thanks to PrestaShop, now I have a great module.','mod'=>'mymo1'),$_smarty_tpl ) );?>
<br />
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'I can configure it using the following configuration form.','mod'=>'mymo1'),$_smarty_tpl ) );?>

	</p>
	<br />
	<p>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'This module will boost your sales!','mod'=>'mymo1'),$_smarty_tpl ) );?>

	</p>
</div>

<div class="panel">
	<h3><i class="icon icon-tags"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Documentation','mod'=>'mymo1'),$_smarty_tpl ) );?>
</h3>
	<p>
		&raquo; <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can get a PDF documentation to configure this module','mod'=>'mymo1'),$_smarty_tpl ) );?>
 :
		<ul>
			<li><a href="#" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'English','mod'=>'mymo1'),$_smarty_tpl ) );?>
</a></li>
			<li><a href="#" target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'French','mod'=>'mymo1'),$_smarty_tpl ) );?>
</a></li>
		</ul>
	</p>
</div>
<?php }
}
