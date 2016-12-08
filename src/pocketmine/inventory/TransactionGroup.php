<?php
/**
 * src/pocketmine/inventory/TransactionGroup.php
 *
 * @package default
 */




namespace pocketmine\inventory;

interface TransactionGroup
{


    /**
     *
     * @return float
     */
    public function getCreationTime();


    /**
     *
     * @return Transaction[]
     */
    public function getTransactions();


    /**
     *
     * @return Inventory[]
     */
    public function getInventories();


    /**
     *
     * @param Transaction $transaction
     */
    public function addTransaction(Transaction $transaction);


    /**
     *
     * @return bool
     */
    public function canExecute();


    /**
     *
     * @return bool
     */
    public function execute();


    /**
     *
     * @return bool
     */
    public function hasExecuted();
}
