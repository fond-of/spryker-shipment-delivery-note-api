<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToApiFacadeInterface;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Psr\Log\LoggerInterface;
use Spryker\Zed\Api\ApiConfig;
use Spryker\Zed\Api\Business\Exception\EntityNotSavedException;

class ShipmentDeliveryNoteApi implements ShipmentDeliveryNoteApiInterface
{
    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToApiFacadeInterface
     */
    protected ShipmentDeliveryNoteApiToApiFacadeInterface $apiFacade;

    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface
     */
    protected ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface $shipmentDeliveryNoteFacade;

    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface
     */
    protected TransferMapperInterface $transferMapper;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToApiFacadeInterface $apiFacade
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper\TransferMapperInterface $transferMapper
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface $shipmentDeliveryNoteFacade
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        ShipmentDeliveryNoteApiToApiFacadeInterface $apiFacade,
        TransferMapperInterface $transferMapper,
        ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface $shipmentDeliveryNoteFacade,
        LoggerInterface $logger
    ) {
        $this->apiFacade = $apiFacade;
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
        $data = $apiDataTransfer->getData();

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

        return $this->apiFacade->createApiItem(
            $shipmentDeliveryNoteTransfer,
            $shipmentDeliveryNoteTransfer->getIdShipmentDeliveryNote(),
        );
    }
}
