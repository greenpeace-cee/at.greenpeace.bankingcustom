<?php

require_once 'bankingcustom.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function bankingcustom_civicrm_config(&$config) {
  _bankingcustom_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function bankingcustom_civicrm_xmlMenu(&$files) {
  _bankingcustom_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function bankingcustom_civicrm_install() {
  _bankingcustom_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function bankingcustom_civicrm_postInstall() {
  _bankingcustom_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function bankingcustom_civicrm_uninstall() {
  _bankingcustom_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function bankingcustom_civicrm_enable() {
  _bankingcustom_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function bankingcustom_civicrm_disable() {
  _bankingcustom_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function bankingcustom_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _bankingcustom_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function bankingcustom_civicrm_managed(&$entities) {
  _bankingcustom_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function bankingcustom_civicrm_caseTypes(&$caseTypes) {
  _bankingcustom_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function bankingcustom_civicrm_angularModules(&$angularModules) {
  _bankingcustom_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function bankingcustom_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _bankingcustom_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function bankingcustom_civicrm_entityTypes(&$entityTypes) {
  _bankingcustom_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Replace (some of) the summary blocks on the banking review page
 *
 * @param $banking_transaction
 * @param $summary_blocks
 */
function bankingcustom_civicrm_banking_transaction_summary($banking_transaction, &$summary_blocks) {
  // $summary = new CRM_Bankingcustom_TransactionSummary($banking_transaction, $summary_blocks);
  // $summary->modify();
}

/**
 * Add JS to the banking review page
 *
 * @param $page
 */
function bankingcustom_civicrm_pageRun(&$page) {
  $pageName = $page->getVar('_name');
  if ($pageName == 'CRM_Banking_Page_Review') {
    CRM_Core_Resources::singleton()->addScriptFile('at.greenpeace.bankingcustom', 'js/change_contact_label.js', 0, 'html-header');
  }
}
