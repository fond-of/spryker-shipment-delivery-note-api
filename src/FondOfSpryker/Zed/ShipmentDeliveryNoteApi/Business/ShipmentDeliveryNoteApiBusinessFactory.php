<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapper;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\ShipmentDeliveryNoteApi;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\Validator\ShipmentDeliveryNoteApiValidator;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToApiFacadeInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\ShipmentDeliveryNoteApiDependencyProvider;
use Spryker\Shared\Log\LoggerTrait;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\ShipmentDeliveryNoteApiConfig getConfig()
 */
class ShipmentDeliveryNoteApiBusinessFactory extends AbstractBusinessFactory
{
    use LoggerTrait;

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\ShipmentDeliveryNoteApiInterface
     */
    public function createShipmentDeliveryNoteApi()
    {
        return new ShipmentDeliveryNoteApi(
            $this->getApiFacade(),
            $this->createTransferMapper(),
            $this->getShipmentDeliveryNoteFacade(),
            $this->getLogger(),
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToApiFacadeInterface
     */
    protected function getApiFacade(): ShipmentDeliveryNoteApiToApiFacadeInterface
    {
        return $this->getProvidedDependency(ShipmentDeliveryNoteApiDependencyProvider::FACADE_API);
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface
     */
    protected function createTransferMapper(): TransferMapperInterface
    {
        return new TransferMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface
     */
    protected function getShipmentDeliveryNoteFacade(): ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface
    {
        return $this->getProvidedDependency(ShipmentDeliveryNoteApiDependencyProvider::FACADE_SHIPMENT_DELIVERY_NOTE);
    }

    /**
     * @return \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\Validator\ShipmentDeliveryNoteApiValidator
     */
    public function createShipmentDeliveryNoteApiValidator()
    {
        return new ShipmentDeliveryNoteApiValidator();
    }
}
