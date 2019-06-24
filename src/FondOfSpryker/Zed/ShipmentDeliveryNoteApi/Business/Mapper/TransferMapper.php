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
    public function toTransfer(array $data)
    {
        $shipmentDeliveryNoteTransfer = new ShipmentDeliveryNoteTransfer();
        $shipmentDeliveryNoteTransfer->fromArray($data, true);

        return $shipmentDeliveryNoteTransfer;
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer[]
     */
    public function toTransferCollection(array $data)
    {
        $transferList = [];
        foreach ($data as $itemData) {
            $transferList[] = $this->toTransfer($itemData);
        }

        return $transferList;
    }
}
