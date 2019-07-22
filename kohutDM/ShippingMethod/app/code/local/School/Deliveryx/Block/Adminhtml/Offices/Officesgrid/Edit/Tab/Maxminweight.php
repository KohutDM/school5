<?php
/**
 * Class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit_Tab_Maxminweight
 */
class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit_Tab_Maxminweight extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('deliveryx_officesgrid');

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('offices_form', array('legend' => Mage::helper('deliveryx')->__('Max Weight Information'), 'class' => 'fieldset-wide'));

        $fieldset->addField('entity_id', 'hidden', array(
            'name' => 'entity_id',
        ));

        $fieldset->addField('max_weight', 'text', array(
            'name' => 'max_weight',
            'label' => Mage::helper('deliveryx')->__('Max weight g'),
            'title' => Mage::helper('deliveryx')->__('Max weight g'),
            'required' => true,
        ));

        $fieldset->addField('min_weight', 'text', array(
            'name' => 'min_weight',
            'label' => Mage::helper('deliveryx')->__('Min weight g'),
            'title' => Mage::helper('deliveryx')->__('Min weight g'),
            'required' => true,
        ));

        $form->setValues($model->getData());

        return parent::_prepareForm();
    }
}
