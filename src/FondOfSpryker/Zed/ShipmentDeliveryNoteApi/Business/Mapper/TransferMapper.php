<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper;

use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;

class TransferMapper implements TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer
     */
    public function toTransfer(array $data): ShipmentDeliveryNoteTransfer
    {
        return (new ShipmentDeliveryNoteTransfer())->fromArray($data, true);
    }
}
