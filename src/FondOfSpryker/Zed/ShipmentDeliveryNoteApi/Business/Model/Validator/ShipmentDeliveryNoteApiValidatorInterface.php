<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Model\Validator;

use Generated\Shared\Transfer\ApiRequestTransfer;

interface ShipmentDeliveryNoteApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\ApiValidationException
     *
     * @return array
     */
    public function validate(ApiRequestTransfer $apiRequestTransfer): array;
}
