<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade;

use Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer;
use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;

interface ShipmentDeliveryNoteApiToShipmentDeliveryNoteInterface
{
    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
     * @param array $itemCollection
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteResponseTransfer
     */
    public function addShipmentDeliveryNote(
        ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer,
        array $itemCollection): ShipmentDeliveryNoteResponseTransfer;

    /**
     * @param \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer
     * 
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer
     */
    public function findShipmentDeliveryNoteById(ShipmentDeliveryNoteTransfer $shipmentDeliveryNoteTransfer): ShipmentDeliveryNoteTransfer;
}
