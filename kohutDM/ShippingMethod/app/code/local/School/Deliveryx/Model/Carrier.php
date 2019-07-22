<?php
/**
 * Class School_Deliveryx_Model_Carrier
 */
class School_Deliveryx_Model_Carrier extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    const YES = 1;
    const NO = 0;

    protected $_code = 'deliveryx';

    /**
     * Calculate all item`s weight
     * @param $allItems - Mage_Shipping_Model_Rate_Request $request->getAllItems()
     * @return int
     */
    protected function calculateAllItemWeight($allItems)
    {
        $purchaseWeight=0;

        foreach ($allItems as $item) {
            $purchaseWeight += $item->getWeight();
        }

        return $purchaseWeight;
    }

    /**
     * @param Mage_Shipping_Model_Rate_Request $request
     * @return bool|false|Mage_Core_Model_Abstract|Mage_Shipping_Model_Rate_Result|null
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        /* @var $result Mage_Shipping_Model_Rate_Result */
        $allItemWeight = $this->calculateAllItemWeight($request->getAllItems());
        $isFreeShoppingAllowed = $request->getFreeShipping() && $this->getConfigData('free_shipping_enabled');

        $result = Mage::getModel('shipping/rate_result');

        $destCountryId = $request->getDestCountryId();

        $enableDeliveryxOffices = Mage::getResourceModel('deliveryx/offices_collection')
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('country_id', $destCountryId)
            ->addAttributeToFilter('work_status',self::YES)
            ->addAttributeToFilter('max_weight', array('gteq' => $allItemWeight))
            ->addAttributeToFilter('min_weight', array('lteq' => $allItemWeight));

        //method name must be written in one word without snake case "_"
        foreach ($enableDeliveryxOffices as $office){
            $result->append($this->_getShippingRate('standard_' . $office->getNumber(), $this->getConfigData('standard_method_price')));
            if ($isFreeShoppingAllowed) {
                foreach ($enableDeliveryxOffices as $office) {
                    $result->append($this->_getShippingRate('freeShipping_' . $office->getNumber(), 0));
                }
            }
            $result->append($this->_getShippingRate('express_' . $office->getNumber(), $this->getConfigData('express_method_price')));
        }

        return $result;
    }

    /**
     * @param $method
     * @param $price
     * @return false|Mage_Core_Model_Abstract
     */
    protected function _getShippingRate ($method, $price)
    {
        $rate = Mage::getModel('shipping/rate_result_method');
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));

        $rate->setMethod($method);
        $rate->setMethodTitle($method);

        $rate->setPrice($price);
        $rate->setCost(0);

        return $rate;
    }

    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return array(
            'standard' => 'Standard',
            'express' => 'Express',
            'freeShipping' => 'Free Shipping',
        );
    }
}
