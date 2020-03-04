<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper;

use Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer;

interface TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer
     */
    public function toTransfer(array $data): ShipmentDeliveryNoteTransfer;
}
