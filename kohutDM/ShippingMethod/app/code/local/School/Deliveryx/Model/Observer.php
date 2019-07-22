<?php
/**
 * Class School_Deliveryx_Model_Observer
 */
class School_Deliveryx_Model_Observer
{
    /**
     * Change shipping address after shipping_method step
     * @param $observer
     */
    public function changeShippingAddress($observer)
    {
        $shippingMethod = $observer->getQuote()->getShippingAddress()->getShippingMethod();
        $carrierCode = Mage::getModel('deliveryx/carrier')->getCarrierCode();

        if (preg_match("/{$carrierCode}/i", $shippingMethod)){
            $strArray = explode('_', $shippingMethod);
            $officeNumber = $strArray[2];

            $office = Mage::getModel('deliveryx/offices')->load($officeNumber, 'number');

            $quote = $observer->getQuote()
              ->getShippingAddress()
               ->setStreet($office->getStreet())
                ->setCity($office->getSity())
                ->setPostcode($office->getPostcode())
                ->setCountryId($office->getCountryId())
                ->setRegion($office->getCountryId())
                ->setTelephone($office->getPhoneNumber())
                ->setSameAsBilling('0');
            $quote ->save();
        }
    }
}
