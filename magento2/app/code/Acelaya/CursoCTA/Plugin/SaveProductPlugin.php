<?php
declare(strict_types=1);

namespace Acelaya\CursoCTA\Plugin;

use Magento\Catalog\Model\Product;

class SaveProductPlugin
{
    public function beforeBeforeSave(Product $product)
    {
        if (strpos($product->getSku(), '001A') === false) {
            $product->setSku($product->getSku() . '001A');
        }
    }
}