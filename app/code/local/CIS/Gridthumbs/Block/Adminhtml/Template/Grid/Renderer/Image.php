<?php 
class CIS_Gridthumbs_Block_Adminhtml_Template_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    } 
    protected function _getValue(Varien_Object $row)
    {       
        $val = $row->getData($this->getColumn()->getIndex());
        $pro_id=$row->getData('entity_id');
        $product = Mage::getModel('catalog/product')->load($pro_id);
        try
        {
            $url=Mage::helper('catalog/image')->init($product,'small_image')->keepFrame(true)->resize(60,60);  
        }
        catch(Exception $ex){
        }
        $out = "<img src=". $url ." width='60px'/>"; 
        return $out;
    }
}