<?php
/**
 * Class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Grid
 */
class School_Deliveryx_Block_Adminhtml_Offices_Officesgrid_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('id');
        $this->setId('deliveryx_offices_officesgrid_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    /**
     * @return string
     */
    protected function _getCollectionClass()
    {
        return 'deliveryx/offices_collection';
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $collection->addAttributeToSelect('number');
        $collection->addAttributeToSelect('short_address');
        $collection->addAttributeToSelect('work_status');
        $collection->addAttributeToSelect('max_weight');
        $collection->addAttributeToSelect('opening');
        $collection->addAttributeToSelect('closing');
        $collection->addAttributeToSelect('country_id');

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid
     * @throws Exception
     */
    protected function _prepareColumns()
    {

        $this->addColumn('id',
            array(
                'header' => Mage::helper('deliveryx')->__('ID'),
                'align' => 'left',
                'width' => '30px',
                'index' => 'entity_id'
            )
        );

        $this->addColumn('number',
            array(
                'header'=> Mage::helper('deliveryx')->__('Number'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'number'
            )
        );

        $this->addColumn('short_address',
            array(
                'header'=> Mage::helper('deliveryx')->__('Short Address'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'short_address'
            )
        );

        $this->addColumn('country_id',
            array(
                'header'=> Mage::helper('deliveryx')->__('Country'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'country_id',
            )
        );

        $this->addColumn('work_status',
            array(
                'header'=> Mage::helper('deliveryx')->__('Work Status'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'work_status'
            )
        );

        $this->addColumn('max_weight',
            array(
                'header'=> Mage::helper('deliveryx')->__('Max Weight'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'max_weight'
            )
        );

        $this->addColumn('opening',
            array(
                'header'=> Mage::helper('deliveryx')->__('Opening Time'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'opening'
            )
        );

        $this->addColumn('closing',
            array(
                'header'=> Mage::helper('deliveryx')->__('Closing Time'),
                'align' =>'left',
                'width' => '50px',
                'index' => 'closing'
            )
        );

        $this->addExportType('*/*/exportCsv', Mage::helper('deliveryx')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('deliveryx')->__('XML'));

        return parent::_prepareColumns();
    }

    /**
     * @param $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('entity_id' => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('deliveryx');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'    => Mage::helper('deliveryx')->__('Delete'),
            'url'      => $this->getUrl('*/*/massDelete'),
            'confirm'  => Mage::helper('deliveryx')->__('Are you sure?')
        ));

        $groups = $this->helper('customer')->getGroups()->toOptionArray();

        array_unshift($groups, array('label'=> '', 'value'=> ''));

        return $this;
    }
}
