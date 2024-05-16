<?php
/**
 * Meross_ModelCompatibility Module 
 *
 * @category    Crud Functionality
 * @package     Meross_ModelCompatibility
 * @author      Patrick Flores
 *
 */
namespace Meross\ModelCompatibility\Controller\Adminhtml\Grid;

use Magento\Framework\Controller\ReswultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Meross\ModelCompatibility\Model\ResourceModel\Grid\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * Massactions filter.
     * @var Filter
     */
    protected $_filter;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param Context           $context
     * @param Filter            $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {

        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $recordDeleted = 0;
        foreach ($collection->getItems() as $record) {
            $record->setId($record->getEntityId());
            $record->delete();
            $recordDeleted++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $recordDeleted));

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }

    /**
     * Check Category Map recode delete Permission.
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Meross_ModelCompatibility::row_data_delete');
    }
}