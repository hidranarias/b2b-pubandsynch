<?php


namespace Pyz\Zed\AntelopeSearch\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeStorageBusinessFactory getFactory()
 */
class AntelopeStorageFacade extends AbstractFacade implements AntelopeStorageFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\EventEntityTransfer[] $eventTransfers
     *
     * @return void
     * @api
     *
     */
    public function writeCollectionByAntelopeEvents(array $eventTransfers): void
    {
        $this->getFactory()
            ->createAntelopeSearchWriter()
            ->writeCollectionByAntelopeEvents($eventTransfers);
    }
}
