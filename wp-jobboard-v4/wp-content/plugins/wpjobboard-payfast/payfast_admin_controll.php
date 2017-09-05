<?php

/**
 * Class Config_PayFast
 **/

class Config_PayFast extends Wpjb_Form_Abstract_Payment
{ 
    public function init()
    {
        parent::init();
        
        parent::init();
        

        $this->addGroup("payfast", __("PayFast", "wpjobboard"));
        
        $e = $this->create("payfast_merchant_id");
        $e->setValue($this->conf("payfast_merchant_id"));
        $e->setLabel(__("PayFast Merchant ID", "wpjobboard"));
        $this->addElement($e, "payfast");

        $e = $this->create("payfast_merchant_key");
        $e->setValue($this->conf("payfast_merchant_key"));
        $e->setLabel(__("PayFast Merchant Key", "wpjobboard"));
        $this->addElement($e, "payfast");

        $this->_env = array(
            1 => __("Sandbox (For testing only)", "wpjobboard"),
            2 => __("Live Environment (Real money)", "wpjobboard")
        );
        $e = $this->create("payfast_sandbox", Daq_Form_Element::TYPE_SELECT);
        $e->setValue($this->conf("payfast_sandbox"));
        $e->setLabel(__("PayFast Mode", "wpjobboard"));
        $e->addValidator(new Daq_Validate_InArray(array_keys($this->_env)));
        foreach($this->_env as $k => $v) {
            $e->addOption($k, $k,  $v);
        }
        $this->addElement($e, "payfast");
        
        $this->_env = array(
            1 => __("Debug On", "wpjobboard"),
            2 => __("Debug Off", "wpjobboard")
        );
        $e = $this->create("payfast_debug", Daq_Form_Element::TYPE_SELECT);
        $e->setValue($this->conf("payfast_debug"));
        $e->setLabel(__("PayFast Debug", "wpjobboard"));
        $e->addValidator(new Daq_Validate_InArray(array_keys($this->_env)));
        foreach($this->_env as $k => $v) {
            $e->addOption($k, $k,  $v);
        }
        $this->addElement($e, "payfast");
        
    }
}

?>
