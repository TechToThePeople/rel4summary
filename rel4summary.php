<?php

require_once 'rel4summary.civix.php';

function rel4summary_civicrm_summary( $contactID, &$content) {
$rel = civicrm_api ("relationship", "get", array("version"=>3,"contact_id"=>$contactID ));

$content = "<div id='relationships'>";
foreach ($rel["values"] as $r) {
  $content .= "<div class='crm-label'>". $r["relation"] . "</div><div class='crm-content'>".$r["display_name"]."</div>";
}
$content .=  <<< EOT
</div>
<style>
</style>
<script>
cj(function($){
  if ($("#crm-demographic-content").length == 0)
    return;
console.log($(".crm-config-option"));
  $("#relationships").appendTo("#crm-demographic-content");
});
</script>
EOT;
 
}


/**
 * Implementation of hook_civicrm_config
 */
function rel4summary_civicrm_config(&$config) {
  _rel4summary_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 */
function rel4summary_civicrm_xmlMenu(&$files) {
  _rel4summary_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 */
function rel4summary_civicrm_install() {
  return _rel4summary_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 */
function rel4summary_civicrm_uninstall() {
  return _rel4summary_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 */
function rel4summary_civicrm_enable() {
  return _rel4summary_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 */
function rel4summary_civicrm_disable() {
  return _rel4summary_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 */
function rel4summary_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _rel4summary_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 */
function rel4summary_civicrm_managed(&$entities) {
  return _rel4summary_civix_civicrm_managed($entities);
}
