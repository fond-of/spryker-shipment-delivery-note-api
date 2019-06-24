<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Business\Mapper;

use Orm\Zed\ShipmentDeliveryNote\Persistence\FosShipmentDeliveryNote;

class EntityMapper implements EntityMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Orm\Zed\ShipmentDeliveryNote\Persistence\FosShipmentDeliveryNote
     */
    public function toEntity(array $data)
    {
        $shipmentDeliveryNoteEntity = new FosShipmentDeliveryNote();
        $shipmentDeliveryNoteEntity->fromArray($data);

        return $shipmentDeliveryNoteEntity;
    }

    /**
     * @param array $data
     *
     * @return \Orm\Zed\ShipmentDeliveryNote\Persistence\FosShipmentDeliveryNote[]
     */
    public function toEntityCollection(array $data)
    {
        $entityList = [];
        foreach ($data as $itemData) {
            $entityList[] = $this->toEntity($itemData);
        }

        return $entityList;
    }
}
