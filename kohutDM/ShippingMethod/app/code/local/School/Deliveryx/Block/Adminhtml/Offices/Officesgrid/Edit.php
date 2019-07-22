<?php
/**
 * Class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit
 */
class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'entity_id';
        $this->_controller = 'adminhtml_offices_officesgrid';
        $this->_blockGroup = 'deliveryx';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('deliveryx')->__('Save Office'));
        $this->_updateButton('delete', 'label', Mage::helper('deliveryx')->__('Delete Office'));

        $data = array(
            'label' =>  'Back',
            'onclick'   => 'setLocation(\'' . $this->getUrl('*/*/offices') . '\')',
            'class'     =>  'back'
        );
        $this->addButton ('deliveryx_back', $data, -1, -1500,  'header');
        $this->_removeButton('back');

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('deliveryx')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
                function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * Get edit form container header text
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('deliveryx_officesgrid')->getEntityId()) {
            return Mage::helper('deliveryx')->__("Edit Office '%s'", $this->escapeHtml(Mage::registry('deliveryx_officesgrid')->getNumber()));
        }
        else {
            return Mage::helper('deliveryx')->__('New Office');
        }
    }
}
