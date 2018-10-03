<?php
namespace Aht\MagentoCheckoutCustom\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ObjectManager;
use Aht\MagentoCheckoutCustom\Helper\Delivery\Info as DeliveryInfo;

class AddCustomDeliveryData implements ObserverInterface
{

    public function __construct(
        DeliveryInfo $deliveryInfo
    ) {
        $this->deliveryInfo = $deliveryInfo;
    }

    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $delivery_info = $this->deliveryInfo->getDeliveryData();

        foreach($delivery_info as $rows){
            $delivery_instruction = $rows['delivery_instruction'];
            $delivery_type = $rows['delivery_type'];
        }

        $transport = $observer->getTransport();
        $transport['delivery_instruction'] = $delivery_instruction;
        $transport['delivery_type'] = $delivery_type;
    }
}