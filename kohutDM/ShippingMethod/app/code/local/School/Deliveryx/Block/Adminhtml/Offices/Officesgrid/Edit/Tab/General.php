<?php
/**
 * Class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit_Tab_General
 */
class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Edit_Tab_General extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('deliveryx_officesgrid');

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('offices_form', array('legend' => Mage::helper('deliveryx')->__('Number & Address Information'), 'class' => 'fieldset-wide'));

        $fieldset->addField('entity_id', 'hidden', array(
            'name' => 'entity_id',
        ));

        $fieldset->addField('number', 'text', array(
            'name' => 'number',
            'label' => Mage::helper('deliveryx')->__('Office number'),
            'title' => Mage::helper('deliveryx')->__('Office number'),
            'required' => true,
            'class' => 'validate-alphanum'
        ));

        $fieldset->addField('short_address', 'text', array(
            'name' => 'short_address',
            'label' => Mage::helper('deliveryx')->__('Short Address'),
            'title' => Mage::helper('deliveryx')->__('Short Address'),
            'required' => true,
        ));

        $fieldset->addField('country_id', 'select', array(
            'name'	=> 'country_id',
            'label' 	=> 'Country',
            'values'	=> Mage::getModel('adminhtml/system_config_source_country')->toOptionArray(true),
            'required' => true,
        ));

        $fieldset->addField('city', 'text', array(
            'name' => 'city',
            'label' => Mage::helper('deliveryx')->__('City'),
            'title' => Mage::helper('deliveryx')->__('City'),
            'required' => true,
        ));

        $fieldset->addField('street', 'text', array(
            'name' => 'street',
            'label' => Mage::helper('deliveryx')->__('Street'),
            'title' => Mage::helper('deliveryx')->__('Street'),
            'required' => true,
        ));

        $fieldset->addField('postcode', 'text', array(
            'name' => 'postcode',
            'label' => Mage::helper('deliveryx')->__('Postcode'),
            'title' => Mage::helper('deliveryx')->__('Postcode'),
            'required' => true,
        ));

        $fieldset->addField('phone_number', 'text', array(
            'name' => 'phone_number',
            'label' => Mage::helper('deliveryx')->__('Phone Number'),
            'title' => Mage::helper('deliveryx')->__('Phone Number'),
            'required' => true,
        ));

        $fieldset->addField('contact_email', 'text', array(
            'name' => 'contact_email',
            'label' => Mage::helper('deliveryx')->__('Contact Email'),
            'title' => Mage::helper('deliveryx')->__('Contact Email'),
            'required' => true,
            'class'     => 'validate-email email',
        ));

        $form->setValues($model->getData());

        return parent::_prepareForm();
    }
}
