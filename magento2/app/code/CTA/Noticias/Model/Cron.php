<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 20/11/2017
 * Time: 20:51
 */

namespace CTA\Noticias\Model;

use Magento\Cron\Model\Schedule;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Psr\Log\LoggerInterface;

class Cron extends Schedule
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(Context $context, Registry $registry, LoggerInterface $logger)
    {
        parent::__construct($context, $registry);
        $this->logger = $logger;
    }

    public function logHola()
    {
        $this->logger->debug('Hola');
    }
}
