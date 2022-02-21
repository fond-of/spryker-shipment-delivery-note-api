<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business;

use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\ShipmentDeliveryNoteApiBusinessFactory getFactory()
 */
class ShipmentDeliveryNoteApiFacade extends AbstractFacade implements ShipmentDeliveryNoteApiFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function addShipmentDeliveryNote(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
         return $this->getFactory()
            ->createShipmentDeliveryNoteApi()
            ->add($apiDataTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array
    {
        return $this->getFactory()
            ->createShipmentDeliveryNoteApiValidator()
            ->validate($apiDataTransfer);
    }
}
