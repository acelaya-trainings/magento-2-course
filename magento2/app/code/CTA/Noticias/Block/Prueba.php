<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 16/11/2017
 * Time: 20:03
 */

namespace CTA\Noticias\Block;

use CTA\Noticias\Model\Noticia;
use CTA\Noticias\Model\ResourceModel\Noticia as NoticiaResourceModel;
use Magento\Framework\View\Element\Template;

class Prueba extends Template
{
    /**
     * @var Noticia
     */
    private $noticia;
    /**
     * @var NoticiaResourceModel
     */
    private $noticiaResource;

    public function __construct(
        Template\Context $context,
        Noticia $noticia,
        NoticiaResourceModel $noticiaResource,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->noticia = $noticia;
        $this->noticiaResource = $noticiaResource;
    }

    public function getNoticias()
    {
        return 'Foo';
        return $this->noticia->getCollection();
    }
}
