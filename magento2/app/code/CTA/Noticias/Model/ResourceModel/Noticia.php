<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 16/11/2017
 * Time: 18:24
 */

namespace CTA\Noticias\Model\ResourceModel;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db;
use Magento\Framework\Stdlib\DateTime\DateTime;

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

    public function getNoticiaById($id): array
    {
        $adapter = $this->getConnection();
        $select = $adapter->select()
                          ->from($this->getMainTable())
                          ->where('id=:id');

        return $adapter->fetchRow($select, ['id' => (int) $id]);
    }

    protected function _beforeSave(AbstractModel $object)
    {
        $object->setUpdatedAt($this->date->date());
        if ($object->isObjectNew()) {
            $object->setCreatedAt($this->date->date());
        }
        return parent::_beforeSave($object);
    }
}
