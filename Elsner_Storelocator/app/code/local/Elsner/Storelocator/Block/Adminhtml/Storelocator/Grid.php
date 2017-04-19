<?php

class Elsner_Storelocator_Block_Adminhtml_Storelocator_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('storelocatorGrid');
      $this->setDefaultSort('storelocator_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('storelocator/storelocator')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('storelocator_id', array(
          'header'    => Mage::helper('storelocator')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'storelocator_id',
      ));

      $this->addColumn('storelocator_name', array(
          'header'    => Mage::helper('storelocator')->__('Store Name'),
          'align'     =>'left',
          'index'     => 'storelocator_name',
      ));

      $this->addColumn('storelocator_address', array(
          'header'    => Mage::helper('storelocator')->__('Store Address'),
          'align'     =>'left',
          'index'     => 'storelocator_address',
      ));

      $this->addColumn('storelocator_zipcode', array(
          'header'    => Mage::helper('storelocator')->__('Zipcode'),
          'align'     =>'left',
          'index'     => 'storelocator_zipcode',
      ));
	 
		$this->addExportType('*/*/exportCsv', Mage::helper('storelocator')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('storelocator')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('storelocator_id');
        $this->getMassactionBlock()->setFormFieldName('storelocator');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('storelocator')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('storelocator')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('storelocator/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('storelocator')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('storelocator')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}