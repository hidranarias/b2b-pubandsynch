<?php


namespace Pyz\Zed\AntelopeStorage\Business\Writer;

use Orm\Zed\Antelope\Persistence\PyzAntelopeQuery;
use Orm\Zed\AntelopeStorage\Persistence\PyzAntelopeStorageQuery;
use Spryker\Client\Storage\StorageClient;
use Spryker\Client\Store\StoreClient;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;

class AntelopeStorageWriter
{
    protected EventBehaviorFacadeInterface $eventBehaviorFacade;
  protected  StoreClient $storeClient;
    public function __construct(
        EventBehaviorFacadeInterface $eventBehaviorFacade,
        StoreClient  $storeClient
    )
    {
        $this->eventBehaviorFacade = $eventBehaviorFacade;
        $this->storeClient = $storeClient;
    }

    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
    {
        $antelopeIds = $this->eventBehaviorFacade->getEventTransferIds($eventTransfers);

        $this->writeCollectionByAntelopeIds($antelopeIds);
    }

    protected function writeCollectionByAntelopeIds(array $antelopeIds): void
    {
        if (!$antelopeIds) {
            return;
        }

        // Note: The following code should not be part of the Business Layer because it contains persistence logic.
        // For training purposes we keep this block here to focus on the publish&synchronize process.
        // In an optional exercise you will have the task to move the persistence logic properly into the Persistence Layer.

        foreach ($antelopeIds as $antelopeId) {
            $antelopeEntity = PyzAntelopeQuery::create()
                ->filterByIdAntelope($antelopeId)
                ->findOne();

            $searchEntity = PyzAntelopeStorageQuery::create()
                ->filterByFkAntelope($antelopeId)
                ->findOneOrCreate();
            $searchEntity->setFkAntelope($antelopeId);

            $searchData = $antelopeEntity->toArray();
            $searchEntity->setData($searchData);
            $searchEntity->setStore($this->storeClient->getCurrentStore()->getName());


            $searchEntity->save();
        }
    }
}
