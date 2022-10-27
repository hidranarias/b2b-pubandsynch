<?php


namespace Pyz\Zed\AntelopeStorage\Business;

use Pyz\Zed\AntelopeStorage\AntelopeStorageDependencyProvider;
use Pyz\Zed\AntelopeStorage\Business\Writer\AntelopeStorageWriter;
use Spryker\Client\Store\StoreClient;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class AntelopeStorageBusinessFactory extends AbstractBusinessFactory
{
    public function createAntelopeStorageWriter()
    {
        return new AntelopeStorageWriter(
            $this->getEventBehaviorFacade(),
            $this->getStoreClient()
        );
    }

    public function getEventBehaviorFacade(): EventBehaviorFacadeInterface
    {
        return $this->getProvidedDependency(AntelopeStorageDependencyProvider::FACADE_EVENT_BEHAVIOR);
    }
    public function getStoreClient(): StoreClient
    {
        return $this->getProvidedDependency(AntelopeStorageDependencyProvider::STORAGE_CLIENT);
    }
}
