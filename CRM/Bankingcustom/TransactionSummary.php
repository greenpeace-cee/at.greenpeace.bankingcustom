<?php

class CRM_Bankingcustom_TransactionSummary {

  private $transaction;
  private $blocks;

  public function __construct($transaction, &$blocks) {
    $this->transaction = $transaction;
    $this->blocks = &$blocks;
  }

  public function modify() {
    $template = CRM_Core_Smarty::singleton();
    $partyBaRefs = $template->_tpl_vars['party_ba_references'];
    $iban = NULL;
    if (count($partyBaRefs ?? []) > 0 && $partyBaRefs[0]['reference_type'] === 'IBAN') {
      $iban = $partyBaRefs[0]['reference'];
    }
    elseif (!empty($template->_tpl_vars['party_account_ref']) && $template->_tpl_vars['party_account_reftype'] ?? '' == 'IBAN') {
      // fallback for multi-match during analyze stage
      $iban = $template->_tpl_vars['party_account_ref'];
    }

    if (!empty($iban)) {
      $matchingContactIDs = self::getMatchingContactIDsForIBAN($iban);
      $template->assign('iban_contact_count', count($matchingContactIDs));
    }

    $this->blocks['ReviewDebtor'] = $template->fetch(
      'CRM/Bankingcustom/TransactionSummary/ReviewDebtor.tpl'
    );
    $ruleMatchIndicators = new CRM_Banking_RuleMatchIndicators($this->transaction, $this->blocks);
    $ruleMatchIndicators->addContactMatchIndicator();
    $ruleMatchIndicators->addIbanMatchIndicator();
  }

  private static function getMatchingContactIDsForIBAN(string $iban): array {
    $contactIDs = [];

    $query = CRM_Core_DAO::executeQuery(
      "SELECT DISTINCT contact_id FROM civicrm_bank_account_reference bar
      INNER JOIN civicrm_bank_account ba ON bar.ba_id = ba.id
      WHERE reference = %1",
      [
        1 => [$iban, 'String'],
      ]
    );

    while ($query->fetch()) {
      $contactIDs[] = $query->contact_id;
    }

    return $contactIDs;
  }

}
