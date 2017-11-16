<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 16/11/2017
 * Time: 18:04
 */

namespace CTA\Noticias\Model;

use CTA\Noticias\Model\Api\Data\NoticiaInterface;
use CTA\Noticias\Model\ResourceModel\Noticia as NoticiaResourceModel;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Noticia extends AbstractModel implements NoticiaInterface, IdentityInterface
{
    public const CACHE_TAG = 'CTA_Noticias_Model';

    protected $_cacheTag = self::CACHE_TAG;
    protected $_eventPrefix = self::CACHE_TAG;

    protected function _construct()
    {
        $this->_init(NoticiaResourceModel::class);
    }

    public function getIdNoticia()
    {
        // TODO: Implement getIdNoticia() method.
    }

    public function setIdNoticia($id)
    {
        // TODO: Implement setIdNoticia() method.
    }

    public function getTitulo()
    {
        // TODO: Implement getTitulo() method.
    }

    public function setTitulo($titulo)
    {
        // TODO: Implement setTitulo() method.
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        return [sprintf('%s_%s', self::CACHE_TAG, $this->getId())];
    }
}