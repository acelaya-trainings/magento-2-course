<?php
declare(strict_types=1);

namespace Acelaya\CursoCTA\Block;

use Magento\Framework\View\Element\Template;

class Magento extends Template
{
    public function sayHi(): string
    {
        return (string) __('Hi!!');
    }
}