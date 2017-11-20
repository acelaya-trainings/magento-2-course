<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 16/11/2017
 * Time: 20:03
 */

namespace CTA\Noticias\Block;

use CTA\Noticias\Model\Noticia;
use CTA\Noticias\Model\NoticiaFactory;
use Magento\Framework\View\Element\Template;

class Prueba extends Template
{
    /**
     * @var NoticiaFactory
     */
    private $noticia;

    public function __construct(
        Template\Context $context,
        NoticiaFactory $noticia,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->noticia = $noticia;
    }

    public function getNoticias()
    {
        $collection = $this->noticia->create()->getCollection();
        $collection->addFieldToSelect('titulo');
        $data = [];

        foreach ($collection as $item) {
            $data[] = $item->getData();
        }

        return $data;
    }
}
