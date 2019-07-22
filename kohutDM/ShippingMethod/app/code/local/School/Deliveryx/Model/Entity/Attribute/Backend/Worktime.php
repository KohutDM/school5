<?php
/**
 * Class School_Deliveryx_Model_Entity_Attribute_Backend_Worktime
 */
class School_Deliveryx_Model_Entity_Attribute_Backend_Worktime extends Mage_Eav_Model_Entity_Attribute_Backend_Abstract
{
    /**
     * @param Varien_Object $object
     * @return $this|Mage_Eav_Model_Entity_Attribute_Backend_Abstract
     */
    public function beforeSave($object)
    {
        $attrCode = $this->getAttribute()->getAttributeCode();

        if ($attrCode=="opening"){
            $openingTime = $object->getData('opening');
            $openingTime = implode(':',$openingTime);
            $object->setData($attrCode, $openingTime);
        } elseif ($attrCode=="closing"){
            $closingTime = $object->getData('closing');
            $closingTime = implode(':',$closingTime);
            $object->setData($attrCode, $closingTime);
        }

        return $this;
    }

    /**
     * @param Varien_Object $object
     * @return $this|Mage_Eav_Model_Entity_Attribute_Backend_Abstract
     */
    public function afterLoad($object)
    {
        $attrCode = $this->getAttribute()->getAttributeCode();

        if ($attrCode=="opening"){
            $openingTime = $object->getData('opening');
            $openingTime = preg_replace('/:/', ',',$openingTime);
            $object->setData($attrCode, $openingTime);
        } elseif ($attrCode=="closing"){
            $closingTime = $object->getData('closing');
            $closingTime = preg_replace('/:/', ',',$closingTime);
            $object->setData($attrCode, $closingTime);
        }

        return $this;
    }
}
