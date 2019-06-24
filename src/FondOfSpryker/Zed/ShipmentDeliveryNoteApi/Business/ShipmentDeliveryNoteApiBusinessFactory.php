<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\EntityMapper;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapper;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\ShipmentDeliveryNoteApi;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\Validator\ShipmentDeliveryNoteApiValidator;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\ShipmentDeliveryNoteApiDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\ShipmentDeliveryNoteApiConfig getConfig()
 */
class ShipmentDeliveryNoteApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\ShipmentDeliveryNoteApiInterface
     */
    public function createShipmentDeliveryNoteApi()
    {
        return new ShipmentDeliveryNoteApi(
            $this->getApiQueryContainer(),
            $this->createEntityMapper(),
            $this->createTransferMapper(),
            $this->getShipmentDeliveryNoteFacade(),
            $this->getProductFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\EntityMapper
     */
    public function createEntityMapper()
    {
        return new EntityMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapper
     */
    public function createTransferMapper()
    {
        return new TransferMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\Validator\ShipmentDeliveryNoteApiValidator
     */
    public function createShipmentDeliveryNoteApiValidator()
    {
        return new ShipmentDeliveryNoteApiValidator();
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer\ShipmentDeliveryNoteApiToApiInterface
     */
    protected function getApiQueryContainer()
    {
        return $this->getProvidedDependency(ShipmentDeliveryNoteApiDependencyProvider::QUERY_CONTAINER_API);
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface
     */
    protected function getShipmentDeliveryNoteFacade()
    {
        return $this->getProvidedDependency(ShipmentDeliveryNoteApiDependencyProvider::FACADE_SHIPMENT_DELIVERY_NOTE);
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToProductInterface
     */
    protected function getProductFacade()
    {
        return $this->getProvidedDependency(ShipmentDeliveryNoteApiDependencyProvider::FACADE_PRODUCT);
    }
}
