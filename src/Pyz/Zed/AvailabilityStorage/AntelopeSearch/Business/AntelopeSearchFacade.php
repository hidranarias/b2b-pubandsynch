<?php


namespace Pyz\Zed\AntelopeSearch\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\AntelopeSearch\Business\AntelopeSearchBusinessFactory getFactory()
 */
class AntelopeSearchFacade extends AbstractFacade implements AntelopeSearchFacadeInterface
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
