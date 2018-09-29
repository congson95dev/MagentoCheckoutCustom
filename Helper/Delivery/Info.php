<?php

namespace Aht\MagentoCheckoutCustom\Helper\Delivery;

use Magento\Framework\View\Element\Template;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderFactory;


class Info extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $template;

    protected $orderFactory;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        Template $template,
        OrderFactory $orderFactory
    )
    {
        parent::__construct($context);
        $this->template = $template;
        $this->orderFactory = $orderFactory;
    }

    // this file is used for get delivery instruction and delivery type in table sales_order in database.
    public function getDeliveryData(){        
        $order_id = $this->template->getRequest()->getParam('order_id');
        $order = $this->orderFactory->create();
        $order->addFieldToSelect('delivery_instruction')
              ->addFieldToSelect('delivery_type')
              ->addFieldToFilter('entity_id', array('eq' => $order_id));

        return $order->getItems();
    }
}