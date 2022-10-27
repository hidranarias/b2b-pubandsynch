<?php


namespace Pyz\Zed\AntelopeStorage\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\AntelopeStorage\Business\AntelopeStorageBusinessFactory getFactory()
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
            ->createAntelopeStorageWriter()
            ->writeCollectionByAntelopeEvents($eventTransfers);
    }
}
