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
    //return;
    //$template->assignAll($vars);
    $this->blocks['ReviewBasic'] = $template->fetch(
      'CRM/Bankingcustom/TransactionSummary/ReviewBasic.tpl'
    );
    $this->blocks['ReviewDebtor'] = $template->fetch(
      'CRM/Bankingcustom/TransactionSummary/ReviewDebtor.tpl'
    );
    $this->blocks['ReviewTransaction'] = $template->fetch(
      'CRM/Bankingcustom/TransactionSummary/ReviewTransaction.tpl'
    );
  }

}
