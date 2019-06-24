<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model;


use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\EntityMapperInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\ShipmentDeliveryNoteApiInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToProductInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer\ShipmentDeliveryNoteApiToApiInterface;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteItemTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;
use Spryker\Zed\Api\Business\Exception\EntityNotFoundException;
use Spryker\Zed\Availability\Persistence\AvailabilityQueryContainerInterface;

class ShipmentDeliveryNoteApi implements ShipmentDeliveryNoteApiInterface
{
    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer\ShipmentDeliveryNoteApiToApiInterface
     */
    protected $apiQueryContainer;

    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface
     */
    protected $shipmentDeliveryNoteFacade;

    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface
     */
    protected $transferMapper;

    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\EntityMapperInterface
     */
    protected $entityMapper;

    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToProductInterface
     */
    protected $productFacade;

    /**
     * ShipmentDeliveryNoteApi constructor.
     *
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer\ShipmentDeliveryNoteApiToApiInterface $apiQueryContainer
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\EntityMapperInterface $entityMapper
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface $transferMapper
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface $shipmentDeliveryNoteFacade
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToProductInterface $productFacade
     */
    public function __construct(
        ShipmentDeliveryNoteApiToApiInterface $apiQueryContainer,
        EntityMapperInterface $entityMapper,
        TransferMapperInterface $transferMapper,
        ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface $shipmentDeliveryNoteFacade,
        ShipmentDeliveryNoteApiToProductInterface $productFacade
    ) {
        $this->apiQueryContainer = $apiQueryContainer;
        $this->shipmentDeliveryNoteFacade = $shipmentDeliveryNoteFacade;
        $this->entityMapper = $entityMapper;
        $this->transferMapper = $transferMapper;
        $this->productFacade = $productFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        $data = (array)$apiDataTransfer->getData();

        $shipmentDeliveryNoteTransfer = new ShipmentDeliveryNoteTransfer();
        $shipmentDeliveryNoteTransfer->fromArray($data, true);

        $itemsCollection = [];

        if (!isset($data['items'])) {
            $data['items'] = [];
        }

        foreach ($data['items'] as $item) {
            $itemsCollection[] = (new ShipmentDeliveryNoteItemTransfer())->fromArray($item, true);
        }

        $shipmentDeliveryNoteResponseTransfer = $this->shipmentDeliveryNoteFacade->addShipmentDeliveryNote($shipmentDeliveryNoteTransfer, $itemsCollection);

        $shipmentDeliveryNoteTransfer = $this->getShipmentDeliveryNoteFromResponse($shipmentDeliveryNoteResponseTransfer);

        return $this->apiQueryContainer->createApiItem($shipmentDeliveryNoteTransfer, $shipmentDeliveryNoteTransfer->getIdShipmentDeliveryNote());
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer $shipmentDeliveryNoteResponseTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer
     */
    protected function getShipmentDeliveryNoteFromResponse(
        ShipmentDeliveryNoteResponseTransfer $shipmentDeliveryNoteResponseTransfer
    ): ShipmentDeliveryNoteTransfer
    {
        $shipmentDeliveryNoteTransfer = $shipmentDeliveryNoteResponseTransfer->getShipmentDeliveryNoteTransfer();

        if (!$shipmentDeliveryNoteTransfer) {
            $errors = [];
            foreach ($shipmentDeliveryNoteResponseTransfer->getErrors() as $error) {
                $errors[] = $error->getMessage();
            }

            throw new EntityNotSavedException('Could not save Shipment Delivery Note: ' . implode(',', $errors));
        }

        return $this->shipmentDeliveryNoteFacade->findShipmentDeliveryNoteById($shipmentDeliveryNoteTransfer);
    }
}
