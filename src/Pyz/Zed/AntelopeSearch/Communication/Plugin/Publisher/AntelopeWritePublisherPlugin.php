<?php

namespace Pyz\Zed\AntelopeSearch\Communication\Plugin\Publisher;

use Pyz\Shared\AntelopeSearch\AntelopeSearchConfig;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PublisherExtension\Dependency\Plugin\PublisherPluginInterface;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeSearchFacadeInterface getFacade()
 */
class AntelopeWritePublisherPlugin extends AbstractPlugin implements PublisherPluginInterface
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
            AntelopeSearchConfig::ANTELOPE_PUBLISH,
            AntelopeSearchConfig::ENTITY_PYZ_ANTELOPE_CREATE,
            AntelopeSearchConfig::ENTITY_PYZ_ANTELOPE_UPDATE,
            AntelopeSearchConfig::ENTITY_PYZ_ANTELOPE_DELETE
        ];
    }
}
