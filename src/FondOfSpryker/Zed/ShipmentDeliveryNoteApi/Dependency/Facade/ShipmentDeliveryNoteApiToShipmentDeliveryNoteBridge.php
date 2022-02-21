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
     * @param \FondOfSpryker\Zed\ShipmentDeliveryNote\Business\ShipmentDeliveryNoteFacadeInterface $shipmentDeliveryNoteFacade
     */
    public function __construct(ShipmentDeliveryNoteFacadeInterface $shipmentDeliveryNoteFacade)
    {
        $this->shipmentDeliveryNoteFacade = $shipmentDeliveryNoteFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer
     */
    public function createShipmentDeliveryNote(
        ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
    ): ShipmentDeliveryNoteResponseTransfer {
        return $this->shipmentDeliveryNoteFacade->createShipmentDeliveryNote($shipmentDeliveryNoteTransfer);
    }
}
