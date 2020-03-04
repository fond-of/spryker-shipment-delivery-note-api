<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\ShipmentDeliveryNoteApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiValidatorPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\ShipmentDeliveryNoteApiFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\ShipmentDeliveryNoteApiBusinessFactory getFactory()
 */
class ShipmentDeliveryNoteApiValidatorPlugin extends AbstractPlugin implements ApiValidatorPluginInterface
{
    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return ShipmentDeliveryNoteApiConfig::RESOURCE_SHIPMENT_DELIVERY_NOTE;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiValidationErrorTransfer[]
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array
    {
        return $this->getFacade()->validate($apiDataTransfer);
    }
}
