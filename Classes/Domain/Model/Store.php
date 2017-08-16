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

/**
 * Store
 */
class Store extends AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * $city
     *
     * @var City
     */
    protected $city = null;

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
     * @return Store|null
     */
    public function getCity(): ?City
    {
        return $this->city;
    }

    /**
     * @param Store|null $store
     */
    public function setCity(?City $city)
    {
        $this->city = $city;
    }
}
