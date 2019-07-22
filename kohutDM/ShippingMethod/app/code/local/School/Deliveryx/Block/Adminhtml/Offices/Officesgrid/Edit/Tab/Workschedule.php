<?php
/**
 * Class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit_Tab_Workschedule
 */
class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit_Tab_Workschedule extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('deliveryx_officesgrid');

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('offices_form', array('legend' => Mage::helper('deliveryx')->__('Work Schedule Information'), 'class' => 'fieldset-wide'));

        $fieldset->addField('entity_id', 'hidden', array(
            'name' => 'entity_id',
        ));

        $fieldset->addField('work_status', 'select', array(
            'name' => 'work_status',
            'label' => Mage::helper('deliveryx')->__('Work Status'),
            'title' => Mage::helper('deliveryx')->__('Work Status'),
            'required' => true,
            'values' => Mage::getSingleton('adminhtml/system_config_source_yesno')->toOptionArray(),
        ));

        $fieldset->addField('opening', 'time', array(
            'name' => 'opening',
            'label' => Mage::helper('deliveryx')->__('Opening Time'),
            'title' => Mage::helper('deliveryx')->__('Opening Time'),
            'required' => true,
        ));

        $fieldset->addField('closing', 'time', array(
            'name' => 'closing',
            'label' => Mage::helper('deliveryx')->__('Closing Time'),
            'title' => Mage::helper('deliveryx')->__('Closing Time'),
            'required' => true,
        ));

        $form->setValues($model->getData());

        return parent::_prepareForm();
    }
}
