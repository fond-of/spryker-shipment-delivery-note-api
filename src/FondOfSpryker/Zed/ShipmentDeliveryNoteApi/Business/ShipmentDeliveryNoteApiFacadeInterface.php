<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business;

use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;

/**
 * @method \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\ShipmentDeliveryNoteApiBusinessFactory getFactory()
 */
interface ShipmentDeliveryNoteApiFacadeInterface
{
    /**
     * Specification:
     * - Adds new shipment delivery note.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function addShipmentDeliveryNote(ApiDataTransfer $apiDataTransfer): ApiItemTransfer;

    /**
     * Specification:
     * - Validates given api data.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array;
}
