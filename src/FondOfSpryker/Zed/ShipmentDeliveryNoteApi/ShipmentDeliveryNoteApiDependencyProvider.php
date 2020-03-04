<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteBridge;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\QueryContainer\ShipmentDeliveryNoteApiToApiQueryContainerBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ShipmentDeliveryNoteApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const QUERY_CONTAINER_API = 'QUERY_CONTAINER_API';

    public const FACADE_SHIPMENT_DELIVERY_NOTE = 'FACADE_SHIPMENT_DELIVERY_NOTE';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addApiQueryContainer($container);
        $container = $this->addShipmentDeliveryNoteFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addApiQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_API] = function (Container $container) {
            return new ShipmentDeliveryNoteApiToApiQueryContainerBridge($container->getLocator()->api()->queryContainer());
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addShipmentDeliveryNoteFacade(Container $container)
    {
        $container[static::FACADE_SHIPMENT_DELIVERY_NOTE] = function (Container $container) {
            return new ShipmentDeliveryNoteApiToShipmentDeliveryNoteBridge(
                $container->getLocator()->shipmentDeliveryNote()->facade()
            );
        };

        return $container;
    }
}
