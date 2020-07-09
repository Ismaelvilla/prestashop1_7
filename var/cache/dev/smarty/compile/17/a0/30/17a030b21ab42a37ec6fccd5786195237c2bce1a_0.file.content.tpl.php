<?php
/* Smarty version 3.1.33, created on 2020-07-09 13:05:57
  from 'F:\wamp\www\prestashop1_7\admin6774pg67d\themes\default\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f06fa151fce57_31410748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17a030b21ab42a37ec6fccd5786195237c2bce1a' => 
    array (
      0 => 'F:\\wamp\\www\\prestashop1_7\\admin6774pg67d\\themes\\default\\template\\content.tpl',
      1 => 1587040546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f06fa151fce57_31410748 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
