<?php


namespace Pyz\Zed\AntelopeStorage\Business;

interface AntelopeStorageFacadeInterface
{
    /**
     * Specification:
     * - Retrieves all antelopes using IDs from $eventTransfers.
     * - Updates entities from `pyz_antelope_search` with actual data from obtained antelopes.
     * - Sends a copy of data to queue based on module config.
     *
     * @param \Generated\Shared\Transfer\EventEntityTransfer[] $eventTransfers
     *
     * @return void
     * @api
     *
     */
    public function writeCollectionByAntelopeEvents(array $eventTransfers): void;
}
