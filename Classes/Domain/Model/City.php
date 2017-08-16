<?php
namespace FRD\FrdInlineRelationBug\Domain\Model;

/***
 *
 * This file is part of the "Inline Relation Test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Benjamin Rannow <b.rannow@familie-redlich.de>, Familie Redlich Digital
 *
 ***/

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * City
 */
class City extends AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * stores
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\FRD\FrdInlineQueryBug\Domain\Model\Store>
     * @cascade remove
     */
    protected $stores = null;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->stores = new ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Adds a Store
     *
     * @param Store $store
     */
    public function addStore(Store $store)
    {
        $this->stores->attach($store);
    }

    /**
     * remove a Store
     *
     * @param Store $store
     */
    public function removeStore(Store $store)
    {
        $this->stores->detach($store);
    }

    /**
     * Returns the stores
     *
     * @return ObjectStorage
     */
    public function getStores(): ObjectStorage
    {
        return $this->stores;
    }

    /**
     * Sets the Stores
     *
     * @param ObjectStorage $stores
     */
    public function setStores(ObjectStorage $stores)
    {
        $this->stores = $stores;
    }
}
