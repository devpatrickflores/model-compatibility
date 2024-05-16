<?php

/**
 * Meross_ModelCompatibility Module 
 *
 * @category    Crud Functionality
 * @package     Meross_ModelCompatibility
 * @author      Patrick Flores
 *
 */
namespace Meross\ModelCompatibility\Model;

use Meross\ModelCompatibility\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'meross_model_compatibility';

    /**
     * @var string
     */
    protected $_cacheTag = 'meross_model_compatibility';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'meross_model_compatibility';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Meross\ModelCompatibility\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get Manufacturer.
     *
     * @return varchar
     */
    public function getManufacturer()
    {
        return $this->getData(self::MANUFACTURER);
    }

    /**
     * Set Manufacturer.
     */
    public function SetManufacturer($manufacturer)
    {
        return $this->setData(self::MANUFACTURER, $manufacturer);
    }

    /**
     * Get Model.
     *
     * @return varchar
     */
    public function getModel()
    {
        return $this->getData(self::MODEL);
    }

    /**
     * Set Model.
     */
    public function setModel($model)
    {
        return $this->setData(self::MODEL, $model);
    }

    /**
     * Get DisplayFrontend.
     *
     * @return varchar
     */
    public function getDisplayFrontend()
    {
        return $this->getData(self::DISPLAYFRONTEND);
    }

    /**
     * Set DisplayFrontend.
     */
    public function setDisplayFrontend($display_frontend)
    {
        return $this->setData(self::DISPLAYFRONTEND, $display_frontend);
    }

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}