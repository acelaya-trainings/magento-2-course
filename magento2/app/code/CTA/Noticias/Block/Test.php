<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 21/11/2017
 * Time: 18:27
 */

namespace CTA\Noticias\Block;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
use Magento\Framework\View\Element\Template;

class Test extends Template
{
    /**
     * @var LayoutProcessorInterface[]
     */
    private $layoutProcessors;

    public function __construct(Template\Context $context, array $layoutProcessors, array $data = [])
    {
        parent::__construct($context, $data);
        $this->layoutProcessors = $layoutProcessors;
        $this->jsLayout = (array) ($data['jsLayout'] ?? []);
    }

    public function getJsLayout()
    {
        foreach ($this->layoutProcessors as $processor) {
            $this->jsLayout = $processor->process($this->jsLayout);
        }

        return \Zend_Json::encode($this->jsLayout);
    }
}
