<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer\ShipmentDeliveryNoteApiToApiInterface;

class ShipmentDeliveryNoteApiToApiBridge implements ShipmentDeliveryNoteApiToApiInterface
{
    /**
     * @var \Spryker\Zed\Api\Persistence\ApiQueryContainerInterface
     */
    protected $apiQueryContainer;

    /**
     * @param \Spryker\Zed\Api\Persistence\ApiQueryContainerInterface $apiQueryContainer
     */
    public function __construct($apiQueryContainer)
    {
        $this->apiQueryContainer = $apiQueryContainer;
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ApiCollectionTransfer
     */
    public function createApiCollection(array $data)
    {
        return $this->apiQueryContainer->createApiCollection($data);
    }

    /**
     * @param array|\Spryker\Shared\Kernel\Transfer\AbstractTransfer $data
     * @param int|null $id
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function createApiItem($data, $id = null)
    {
        return $this->apiQueryContainer->createApiItem($data, $id);
    }
}
