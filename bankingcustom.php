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
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function bankingcustom_civicrm_install() {
  _bankingcustom_civix_civicrm_install();
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
 * Replace (some of) the summary blocks on the banking review page
 *
 * @param $banking_transaction
 * @param $summary_blocks
 */
function bankingcustom_civicrm_banking_transaction_summary($banking_transaction, &$summary_blocks) {
  $summary = new CRM_Bankingcustom_TransactionSummary($banking_transaction, $summary_blocks);
  $summary->modify();
}

/**
 * Add JS to the banking review page
 *
 * @param $page
 */
function bankingcustom_civicrm_pageRun(&$page) {
  $pageName = $page->getVar('_name');
  if ($pageName == 'CRM_Banking_Page_Review') {
    $resources = CRM_Core_Resources::singleton();
    $resources->addScriptFile('at.greenpeace.bankingcustom', 'js/change_contact_label.js', 0, 'html-header');
    $resources->addScriptFile('at.greenpeace.bankingcustom', 'js/preselect_conditions.js', 0, 'html-header');
  }
}
