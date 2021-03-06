<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Rlab\ShoppingClub\Block\Account;

use Magento\Customer\Model\Context;
use Magento\Framework\UrlInterface;

/**
 * Customer register link
 *
 * @api
 * @SuppressWarnings(PHPMD.DepthOfInheritance)
 * @since 100.0.2
 */
class RegisterLink extends \Magento\Framework\View\Element\Html\Link
{

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Customer session
     *
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;

    /**
     * @var \Magento\Customer\Model\Registration
     */
    protected $_registration;

    /**
     * @var \Magento\Customer\Model\Url
     */
    protected $_customerUrl;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\Http\Context $httpContext
     * @param \Magento\Customer\Model\Registration $registration
     * @param \Magento\Customer\Model\Url $customerUrl
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Customer\Model\Registration $registration,
        \Magento\Customer\Model\Url $customerUrl,
        UrlInterface $urlBuilder,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->httpContext = $httpContext;
        $this->_registration = $registration;
        $this->_customerUrl = $customerUrl;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return  $this->urlBuilder->getUrl('shoppingclub/account/create');
    }

    /**
     * {@inheritdoc}
     */
    protected function _toHtml()
    {
        if (!$this->_registration->isAllowed()
            || $this->httpContext->getValue(Context::CONTEXT_AUTH)
        ) {
            return '';
        }
        return parent::_toHtml();
    }
}
