<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper;

interface EntityMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Orm\Zed\ShipmentDeliveryNoteApi\Persistence\FosShipmentDeliveryNote
     */
    public function toEntity(array $data);

    /**
     * @param array $shipmentDeliveryNoteApiDataCollection
     *
     * @return \Orm\Zed\ShipmentDeliveryNote\Persistence\FosShipmentDeliveryNote[]
     */
    public function toEntityCollection(array $shipmentDeliveryNoteApiDataCollection);
}
