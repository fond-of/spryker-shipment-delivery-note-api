<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer\ShipmentDeliveryNoteApiToApiQueryContainerInterface;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Psr\Log\LoggerInterface;
use Spryker\Zed\Api\ApiConfig;
use Spryker\Zed\Api\Business\Exception\EntityNotSavedException;

class ShipmentDeliveryNoteApi implements ShipmentDeliveryNoteApiInterface
{
    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer\ShipmentDeliveryNoteApiToApiQueryContainerInterface
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
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer\ShipmentDeliveryNoteApiToApiQueryContainerInterface $apiQueryContainer
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface $transferMapper
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface $shipmentDeliveryNoteFacade
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        ShipmentDeliveryNoteApiToApiQueryContainerInterface $apiQueryContainer,
        TransferMapperInterface $transferMapper,
        ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface $shipmentDeliveryNoteFacade,
        LoggerInterface $logger
    ) {
        $this->apiQueryContainer = $apiQueryContainer;
        $this->shipmentDeliveryNoteFacade = $shipmentDeliveryNoteFacade;
        $this->transferMapper = $transferMapper;
        $this->logger = $logger;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\EntityNotSavedException
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        $data = (array)$apiDataTransfer->getData();

        $shipmentDeliveryNoteTransfer = $this->transferMapper->toTransfer($data);

        $shipmentDeliveryNoteResponseTransfer = $this->shipmentDeliveryNoteFacade->createShipmentDeliveryNote(
            $shipmentDeliveryNoteTransfer,
        );

        $shipmentDeliveryNoteTransfer = $shipmentDeliveryNoteResponseTransfer->getShipmentDeliveryNoteTransfer();

        if ($shipmentDeliveryNoteTransfer === null || $shipmentDeliveryNoteResponseTransfer->getIsSuccess() === false) {
            $errors = [];
            foreach ($shipmentDeliveryNoteResponseTransfer->getErrors() as $error) {
                $errors[] = $error->getMessage();
            }
            $this->logger->error('Could not save shipment delivery note.', ['data' => $data, 'error' => $errors]);

            throw new EntityNotSavedException(
                'Could not save shipment delivery note.',
                ApiConfig::HTTP_CODE_INTERNAL_ERROR,
            );
        }

        return $this->apiQueryContainer->createApiItem(
            $shipmentDeliveryNoteTransfer,
            $shipmentDeliveryNoteTransfer->getIdShipmentDeliveryNote(),
        );
    }
}
