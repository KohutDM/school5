<?php
/**
 * Class School_Deliveryx_Model_Offices
 */
class School_Deliveryx_Model_Offices extends Mage_Core_Model_Abstract
{
    const CACHE_TAG              = 'deliveryx_offices';
    protected $_cacheTag         = 'deliveryx_offices';
    protected $_eventPrefix      = 'deliveryx_offices';
    protected $_eventObject      = 'offices';
    protected $_canAffectOptions = false;

    protected function _construct()
    {
        $this->_init('deliveryx/offices');
    }

    /**
     * @return $this
     */
    public function validate()
    {
        Mage::dispatchEvent($this->_eventPrefix.'_validate_before', array($this->_eventObject=>$this));
        $this->_getResource()->validate($this);
        Mage::dispatchEvent($this->_eventPrefix.'_validate_after', array($this->_eventObject=>$this));
        return $this;
    }
}
