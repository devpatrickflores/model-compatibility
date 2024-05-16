<?php
/**
 * Meross_ModelCompatibility Module 
 *
 * @category    Crud Functionality
 * @package     Meross_ModelCompatibility
 * @author      Patrick Flores
 *
 */
namespace Meross\ModelCompatibility\Block\Adminhtml\Grid\Edit;


/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Meross\ModelCompatibility\Model\Status $options,
        array $data = []
    ) 
    {
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                'id' => 'edit_form', 
                'enctype' => 'multipart/form-data', 
                'action' => $this->getData('action'), 
                'method' => 'post'
                ]
            ]
        );

        $form->setHtmlIdPrefix('pfgrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Model Compatibility'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Model Compatibility'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'manufacturer',
            'text',
            [
                'name' => 'manufacturer',
                'label' => __('Manufacturer'),
                'id' => 'manufacturer',
                'title' => __('Manufacturer'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'model',
            'text',
            [
                'name' => 'model',
                'label' => __('Model'),
                'id' => 'model',
                'title' => __('Model'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
		
		$fieldset->addField(
            'display_frontend',
            'select',
            [
                'label' => __('Compatibility'),
                'title' => __('Compatibility'),
                'name' => 'status',
                'required' => true, 
                'options' => ['it-works' => __('Yes It Works!'), 'need-accessories' => __('Need Accessory to make it work!')]
            ]
        );
		
        $fieldset->addField(
            'is_active',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'is_active',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );
        if (!$model->getId()) {
            $model->setData('is_active', '1');
        }
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
