<?php
/**
 * Class School_Deliveryx_Model_Resource_Offices
 */
class School_Deliveryx_Model_Resource_Offices extends Mage_Eav_Model_Entity_Abstract
{
    protected function _construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('deliveryx_offices');
        $this->setConnection(
            $resource->getConnection('deliveryx_read'),
            $resource->getConnection('deliveryx_write')
        );
    }
}
