<?php

namespace FondOfSpryker\Zed\ShipmentDeliveryNoteApi;

use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToApiFacadeBridge;
use FondOfSpryker\Zed\ShipmentDeliveryNoteApi\Dependency\Facade\ShipmentDeliveryNoteApiToShipmentDeliveryNoteBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ShipmentDeliveryNoteApiDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_API = 'FACADE_API';

    /**
     * @var string
     */
    public const FACADE_SHIPMENT_DELIVERY_NOTE = 'FACADE_SHIPMENT_DELIVERY_NOTE';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addApiFacade($container);
        $container = $this->addShipmentDeliveryNoteFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addApiFacade(Container $container): Container
    {
        $container[static::FACADE_API] = static function (Container $container) {
            return new ShipmentDeliveryNoteApiToApiFacadeBridge($container->getLocator()->api()->facade());
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addShipmentDeliveryNoteFacade(Container $container): Container
    {
        $container[static::FACADE_SHIPMENT_DELIVERY_NOTE] = static function (Container $container) {
            return new ShipmentDeliveryNoteApiToShipmentDeliveryNoteBridge(
                $container->getLocator()->shipmentDeliveryNote()->facade(),
            );
        };

        return $container;
    }
}
