<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToProductInterface;

class ShipmentDeliveryNoteApiToProductBridge implements ShipmentDeliveryNoteApiToProductInterface
{
    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct($productFacade)
    {
        $this->productFacade = $productFacade;
    }

}
