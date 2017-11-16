<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 16/11/2017
 * Time: 18:24
 */

namespace CTA\Noticias\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db;
use Magento\Framework\Stdlib\DateTime;

class Noticia extends Db\AbstractDb
{
    /**
     * @var DateTime
     */
    private $date;

    public function __construct(DateTime $date, Db\Context $context)
    {
        $this->date = $date;
        parent::__construct($context);
    }

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('cta_noticias', 'id');
    }
}
