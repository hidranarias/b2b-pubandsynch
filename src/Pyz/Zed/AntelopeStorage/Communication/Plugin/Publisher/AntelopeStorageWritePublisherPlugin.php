<?php

namespace Pyz\Zed\AntelopeStorage\Communication\Plugin\Publisher;


use Pyz\Shared\AntelopeStorage\AntelopeStorageConfig;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PublisherExtension\Dependency\Plugin\PublisherPluginInterface;

/**
 * @method \Pyz\Zed\AntelopeStorage\Business\AntelopeStorageFacadeInterface getFacade()
 */
class AntelopeStorageWritePublisherPlugin extends AbstractPlugin implements PublisherPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     * @api
     *
     */
    public function handleBulk(array $eventEntityTransfers, $eventName)
    {
        $this->getFacade()
            ->writeCollectionByAntelopeEvents($eventEntityTransfers);
    }

    /**
     * {@inheritDoc}
     *
     * @return string[]
     * @api
     *
     */
    public function getSubscribedEvents(): array
    {
        return [
            AntelopeStorageConfig::ANTELOPE_PUBLISH,
            AntelopeStorageConfig::ENTITY_PYZ_ANTELOPE_CREATE,
            AntelopeStorageConfig::ENTITY_PYZ_ANTELOPE_UPDATE,
            AntelopeStorageConfig::ENTITY_PYZ_ANTELOPE_DELETE
        ];
    }
}
