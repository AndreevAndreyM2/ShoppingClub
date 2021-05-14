<?php
namespace Rlab\ShoppingClub\ViewModel;
class Data implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    protected $sessionFactory;

    public function __construct(
        \Magento\Customer\Model\SessionFactory $sessionFactory
    ) {
        $this->sessionFactory = $sessionFactory;

    }

    public function isLoggedIn()
    {
        $user = $this->sessionFactory->create();
        return $user->isLoggedIn();
    }
}
