<?php
/**
 * Class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid
 */
class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'deliveryx';
        $this->_controller = 'adminhtml_offices_officesgrid';
        $this->_headerText = Mage::helper('deliveryx')->__('OFFICES');

        parent::__construct();

        if ($this->_isAllowedAction('save')) {
            $this->_updateButton('add', 'label', Mage::helper('deliveryx')->__('Add New Office'));
        } else {
            $this->_removeButton('add');
        }
    }

    /**
     * Check permission for passed action
     * @param string $action
     * @return bool
     */
    protected function _isAllowedAction($action)
    {
        return Mage::getSingleton('admin/session')->isAllowed('deliveryx_deliveryxgrid/' . $action);
    }
}
