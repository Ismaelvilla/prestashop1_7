<?php
/* Smarty version 3.1.33, created on 2020-07-09 13:03:45
  from 'F:\wamp\www\prestashop1_7\pdf\invoice.shipping-tab.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f06f99150d5c4_49892614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd170aa6b7c9a7bc6eda97b2778c51f60e7c3aecb' => 
    array (
      0 => 'F:\\wamp\\www\\prestashop1_7\\pdf\\invoice.shipping-tab.tpl',
      1 => 1587040546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f06f99150d5c4_49892614 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Carrier','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl ) );?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }
}
