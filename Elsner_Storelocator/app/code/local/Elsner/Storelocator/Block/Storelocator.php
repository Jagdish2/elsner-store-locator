<?php
class Elsner_Storelocator_Block_Storelocator extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getStorelocator()     
     { 
        if (!$this->hasData('storelocator')) {
            $this->setData('storelocator', Mage::registry('storelocator'));
        }
        return $this->getData('storelocator');
        
    }
}