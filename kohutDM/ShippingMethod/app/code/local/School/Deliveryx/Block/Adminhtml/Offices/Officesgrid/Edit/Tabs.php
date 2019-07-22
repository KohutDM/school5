<?php
/**
 * Class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit_Tabs
 */
class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('offices_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle('Office information');
    }

    /**
     * @return Mage_Core_Block_Abstract
     * @throws Exception
     */
    protected function _beforeToHtml()
    {
        $this->addTab('general', array(
            'label' => 'Number & Address',
            'title' => 'Number & Address',
            'content' => $this->getLayout()
                ->createBlock('deliveryx/adminhtml_offices_officesgrid_edit_tab_general')
                ->toHtml()
        ));

        $this->addTab('max_weight', array(
            'label' => 'Max&Min Weight',
            'title' => 'Max&Min Weight',
            'content' => $this->getLayout()
                ->createBlock('deliveryx/adminhtml_offices_officesgrid_edit_tab_maxminweight')
                ->toHtml()
        ));

        $this->addTab('work_schedule', array(
            'label' => 'Work Schedule',
            'title' => 'Work Schedule',
            'content' => $this->getLayout()
                ->createBlock('deliveryx/adminhtml_offices_officesgrid_edit_tab_workschedule')
                ->toHtml()
        ));

        return parent::_beforeToHtml();
    }
}
