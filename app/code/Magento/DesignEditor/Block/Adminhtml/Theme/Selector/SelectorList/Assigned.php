<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_DesignEditor
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Assigned theme list
 */
namespace Magento\DesignEditor\Block\Adminhtml\Theme\Selector\SelectorList;

class Assigned
    extends \Magento\DesignEditor\Block\Adminhtml\Theme\Selector\SelectorList\AbstractSelectorList
{
    /**
     * Store manager model
     *
     * @var \Magento\Core\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @param \Magento\Core\Helper\Data $coreData
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Core\Model\StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
        \Magento\Core\Helper\Data $coreData,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Core\Model\StoreManagerInterface $storeManager,
        array $data = array()
    ) {
        $this->_storeManager = $storeManager;
        parent::__construct($coreData, $context, $data);
    }

    /**
     * Get list title
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Themes Assigned to Store Views');
    }

    /**
     * Add theme buttons
     *
     * @param \Magento\DesignEditor\Block\Adminhtml\Theme $themeBlock
     * @return \Magento\DesignEditor\Block\Adminhtml\Theme\Selector\SelectorList\Assigned
     */
    protected function _addThemeButtons($themeBlock)
    {
        parent::_addThemeButtons($themeBlock);
        $this->_addDuplicateButtonHtml($themeBlock);
        if (count($this->_storeManager->getStores()) > 1) {
            $this->_addAssignButtonHtml($themeBlock);
        }
        $this->_addEditButtonHtml($themeBlock);
        return $this;
    }
}
