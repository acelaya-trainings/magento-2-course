<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 13/11/2017
 * Time: 20:19
 */

namespace Acelaya\CursoCTA\Controller\Adminhtml\Curso;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Admin extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }
}