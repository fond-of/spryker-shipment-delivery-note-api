<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade;

use FondOfSpryker\Zed\ShipmentDeliveryNote\Business\ShipmentDeliveryNoteFacadeInterface;
use Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;

class ShipmentDeliveryNoteApiToShipmentDeliveryNoteBridge implements ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface
{
    /**
     * @var \FondOfSpryker\Zed\ShipmentDeliveryNote\Business\ShipmentDeliveryNoteFacadeInterface
     */
    protected $shipmentDeliveryNoteFacade;

    /**
     * ShipmentDeliveryNoteApiToShipmentDeliveryNoteBridge constructor.
     *
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNote\Business\ShipmentDeliveryNoteFacadeInterface $shipmentDeliveryNoteFacade
     */
    public function __construct(ShipmentDeliveryNoteFacadeInterface $shipmentDeliveryNoteFacade)
    {
        $this->shipmentDeliveryNoteFacade = $shipmentDeliveryNoteFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
     * @param array $itemCollection
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer
     */
    public function addShipmentDeliveryNote(
        ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer,
        array $itemCollection): ShipmentDeliveryNoteResponseTransfer
    {
        return $this->shipmentDeliveryNoteFacade->addShipmentDeliveryNote($shipmentDeliveryNoteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer
     */
    public function findShipmentDeliveryNoteById(ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer): ShipmentDeliveryNoteTransfer
    {
        return $this->shipmentDeliveryNoteFacade->findShipmentDeliveryNoteById($shipmentDeliveryNoteTransfer);
    }
}
