<?php
/* Smarty version 3.1.33, created on 2020-07-09 18:36:52
  from 'module:psgdprviewstemplateshookd' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f0747a4016506_16822449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5eee242e5cbca9bb89b8ffa439cebef7beaaf2e4' => 
    array (
      0 => 'module:psgdprviewstemplateshookd',
      1 => 1593674308,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0747a4016506_16822449 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- begin F:\wamp\www\prestashop1_7/modules/psgdpr/views/templates/hook/displayGDPRConsent.tpl -->
<div id="gdpr_consent" class="gdpr_module_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['psgdpr_id_module']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
">
    <span class="custom-checkbox">
        <label class="psgdpr_consent_message">
            <input id="psgdpr_consent_checkbox_<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['psgdpr_id_module']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
" name="psgdpr_consent_checkbox" type="checkbox" value="1">
            <span><i class="material-icons rtl-no-flip checkbox-checked psgdpr_consent_icon"></i></span>
            <span><?php echo $_smarty_tpl->tpl_vars['psgdpr_consent_message']->value;?>
</span>        </label>
    </span>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
    var psgdpr_front_controller = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['psgdpr_front_controller']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    psgdpr_front_controller = psgdpr_front_controller.replace(/\amp;/g,'');
    var psgdpr_id_customer = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['psgdpr_id_customer']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    var psgdpr_customer_token = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['psgdpr_customer_token']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    var psgdpr_id_guest = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['psgdpr_id_guest']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
    var psgdpr_guest_token = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['psgdpr_guest_token']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";

    document.addEventListener('DOMContentLoaded', function() {
        let psgdpr_id_module = "<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['psgdpr_id_module']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
";
        let parentForm = $('.gdpr_module_' + psgdpr_id_module).closest('form');

        let toggleFormActive = function() {
            let parentForm = $('.gdpr_module_' + psgdpr_id_module).closest('form');
            let checkbox = $('#psgdpr_consent_checkbox_' + psgdpr_id_module);
            let element = $('.gdpr_module_' + psgdpr_id_module);
            let iLoopLimit = 0;

            // Look for parent elements until we find a submit button, or reach a limit
            while(0 === element.nextAll('[type="submit"]').length &&  // Is there any submit type ?
                element.get(0) !== parentForm.get(0) &&  // the limit is the form
                element.length &&
                iLoopLimit != 1000) { // element must exit
                    element = element.parent();
                    iLoopLimit++;
            }

            if (checkbox.prop('checked') === true) {
                if (element.find('[type="submit"]').length > 0) {
                    element.find('[type="submit"]').removeAttr('disabled');
                } else {
                    element.nextAll('[type="submit"]').removeAttr('disabled');
                }
            } else {
                if (element.find('[type="submit"]').length > 0) {
                    element.find('[type="submit"]').attr('disabled', 'disabled');
                } else {
                    element.nextAll('[type="submit"]').attr('disabled', 'disabled');
                }
            }
        }

        // Triggered on page loading
        toggleFormActive();

        // Listener ion the checkbox click
        $(document).on('click' , '#psgdpr_consent_checkbox_'+psgdpr_id_module, function() {
            toggleFormActive();
        });

        $(document).on('submit', parentForm, function(event) {
            $.ajax({
                data: 'POST',
                url: psgdpr_front_controller,
                data: {
                    ajax: true,
                    action: 'AddLog',
                    id_customer: psgdpr_id_customer,
                    customer_token: psgdpr_customer_token,
                    id_guest: psgdpr_id_guest,
                    guest_token: psgdpr_guest_token,
                    id_module: psgdpr_id_module,
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });
    });
<?php echo '</script'; ?>
>

<!-- end F:\wamp\www\prestashop1_7/modules/psgdpr/views/templates/hook/displayGDPRConsent.tpl --><?php }
}
