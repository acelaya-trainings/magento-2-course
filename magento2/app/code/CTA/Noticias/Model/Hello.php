<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 23/11/2017
 * Time: 20:20
 */

namespace CTA\Noticias\Model;

use CTA\Noticias\API\HelloInterface;

class Hello implements HelloInterface
{
    /**
     * @param string $name
     * @return string
     */
    public function name(string $name)
    {
        return sprintf('Hello, %s', $name);
    }
}