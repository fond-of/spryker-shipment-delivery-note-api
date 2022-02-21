<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\ShipmentDeliveryNoteApiConfig;
use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;
use Spryker\Zed\Api\ApiConfig;
use Spryker\Zed\Api\Business\Exception\ApiDispatchingException;
use Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\ShipmentDeliveryNoteApiFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\ShipmentDeliveryNoteApiBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\ShipmentDeliveryNoteApiConfig getConfig()
 */
class ShipmentDeliveryNoteApiResourcePlugin extends AbstractPlugin implements ApiResourcePluginInterface
{
    /**
     * @param int $idShipmentDeliveryNote
     *
     * @throws \Spryker\Zed\Api\Business\Exception\ApiDispatchingException
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function get($idShipmentDeliveryNote): ApiItemTransfer
    {
        throw new ApiDispatchingException('Add method is not implemented yet.', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @param int $idShipmentDeliveryNote
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\ApiDispatchingException
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function update($idShipmentDeliveryNote, ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        throw new ApiDispatchingException('Update method is not implemented yet.', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        return $this->getFacade()->addShipmentDeliveryNote($apiDataTransfer);
    }

    /**
     * @param int $idStock
     *
     * @throws \Spryker\Zed\Api\Business\Exception\ApiDispatchingException
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function remove($idStock): ApiItemTransfer
    {
        throw new ApiDispatchingException('Remove method not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\ApiDispatchingException
     *
     * @return \Generated\Shared\Transfer\ApiCollectionTransfer
     */
    public function find(ApiRequestTransfer $apiRequestTransfer): ApiCollectionTransfer
    {
        throw new ApiDispatchingException('Find method not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return ShipmentDeliveryNoteApiConfig::RESOURCE_SHIPMENT_DELIVERY_NOTE;
    }
}
