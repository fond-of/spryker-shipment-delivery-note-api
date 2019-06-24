<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model;

use Generated\Shared\Transfer\ApiDataTransfer;

interface ShipmentDeliveryNoteApiInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer);
}
