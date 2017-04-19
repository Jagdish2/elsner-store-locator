<?php

class Elsner_Storelocator_Block_Adminhtml_Storelocator_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('storelocator_form', array('legend'=>Mage::helper('storelocator')->__('Item information')));
     
      $fieldset->addField('storelocator_name', 'text', array(
          'label'     => Mage::helper('storelocator')->__('Store Name'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'storelocator_name',
      ));

      $fieldset->addField('storelocator_address', 'text', array(
          'label'     => Mage::helper('storelocator')->__('Store Address'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'storelocator_address',
      ));
    
      $fieldset->addField('storelocator_zipcode', 'text', array(
          'label'     => Mage::helper('storelocator')->__('Zipcode'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'storelocator_zipcode',
      ));
      if ( Mage::getSingleton('adminhtml/session')->getStorelocatorData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getStorelocatorData());
          Mage::getSingleton('adminhtml/session')->setStorelocatorData(null);
      } elseif ( Mage::registry('storelocator_data') ) {
          $form->setValues(Mage::registry('storelocator_data')->getData());
      }
      return parent::_prepareForm();
  }
}