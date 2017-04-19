<?php
class Elsner_Storelocator_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	$this->loadLayout();     
		$this->renderLayout();
    }
    public function getDataAction()
    {
    	$model  = Mage::getModel('storelocator/storelocator')->getCollection();
    	$model->addFieldToFilter( 'storelocator_zipcode', $this->getRequest()->getParam('zip_code') );
    	if(count($model) > 0)
    	{
    		$value = "<table border='1'><th>Store Name</th><th>Store Address</th><th>Zipcode</th>";
    		foreach($model as $collect)
			{
				$value .= "<tr><td>".$collect->getData('storelocator_name')."</td><td>".$collect->getData('storelocator_address')."</td><td>".$collect->getData('storelocator_zipcode')."</td></tr>";
			}
			$value .= "</table>";
    	}
    	else
    	{
    		$value = "no record found";
    	}
    	$response['message'] = $value;
		$response['status'] = "success";
		$this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
        return;
    }
}