<?php
/* Smarty version 3.1.33, created on 2020-07-09 13:13:05
  from 'F:\wamp\www\prestashop1_7\modules\mymodule5\views\templates\hook\mymodule5.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f06fbc12400e2_40630057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b4d03fb5343aa46b4b85ff2dad4555167efedf5' => 
    array (
      0 => 'F:\\wamp\\www\\prestashop1_7\\modules\\mymodule5\\views\\templates\\hook\\mymodule5.tpl',
      1 => 1594152353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f06fbc12400e2_40630057 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'categories' => 
  array (
    'compiled_filepath' => 'F:\\wamp\\www\\prestashop1_7\\var\\cache\\dev\\smarty\\compile\\1b\\4d\\03\\1b4d03fb5343aa46b4b85ff2dad4555167efedf5_2.file.mymodule5.tpl.php',
    'uid' => '1b4d03fb5343aa46b4b85ff2dad4555167efedf5',
    'call_name' => 'smarty_template_function_categories_18778596855f06fbc12362c4_45709146',
  ),
));
?>esto es una prueba



<div class="category-tree">
    <ul>
        <li>1<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_module_name']->value, ENT_QUOTES, 'UTF-8');?>
</li>
        <li>2<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_module_link']->value, ENT_QUOTES, 'UTF-8');?>
</li>
        <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['current_category']->value, ENT_QUOTES, 'UTF-8');?>
</li>
        <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categories']->value, ENT_QUOTES, 'UTF-8');?>
</li>
    </ul>
</div><?php }
/* smarty_template_function_categories_18778596855f06fbc12362c4_45709146 */
if (!function_exists('smarty_template_function_categories_18778596855f06fbc12362c4_45709146')) {
function smarty_template_function_categories_18778596855f06fbc12362c4_45709146(Smarty_Internal_Template $_smarty_tpl,$params) {
$params = array_merge(array('nodes'=>array(),'depth'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

    <ul><li><a href="">aaaa</a><div></div></li></ul>
<?php
}}
/*/ smarty_template_function_categories_18778596855f06fbc12362c4_45709146 */
}
