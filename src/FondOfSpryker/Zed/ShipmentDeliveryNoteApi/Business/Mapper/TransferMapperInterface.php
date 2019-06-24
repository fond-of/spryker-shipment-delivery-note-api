<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper;

interface TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer
     */
    public function toTransfer(array $data);

    /**
     * @param array $shipmentDeliveryNoteEntityCollection
     *
     * @return \Generated\Shared\Transfer\ShipmentDeliveryNoteTransfer[]
     */
    public function toTransferCollection(array $shipmentDeliveryNoteEntityCollection);
}
