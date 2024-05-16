<?php
/**
 * Meross_ModelCompatibility Module 
 *
 * @category    Crud Functionality
 * @package     Meross_ModelCompatibility
 * @author      Patrick Flores
 *
 */
namespace Meross\ModelCompatibility\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const MANUFACTURER = 'manufacturer';
    const MODEL = 'model';
    const DISPLAYFRONTEND = 'display_frontend';
    const IS_ACTIVE = 'is_active';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId);

    /**
     * Get Manufacturer.
     *
     * @return varchar
     */
    public function getManufacturer();

    /**
     * Set Manufacturer.
     */
    public function setManufacturer($manufacturer);

    /**
     * Get Model.
     *
     * @return varchar
     */
    public function getModel();

    /**
     * Set Model.
     */
    public function setModel($model);

    /**
     * Get DisplayFrontend.
     *
     * @return varchar
     */
    public function getDisplayFrontend();

    /**
     * Set DisplayFrontend.
     */
    public function setDisplayFrontend($display_frontend);

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive();

    /**
     * Set StartingPrice.
     */
    public function setIsActive($isActive);

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime();

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime);

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);
}