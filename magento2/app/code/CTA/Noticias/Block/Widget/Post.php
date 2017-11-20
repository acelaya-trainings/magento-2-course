<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 20/11/2017
 * Time: 20:02
 */

namespace CTA\Noticias\Block\Widget;

use CTA\Noticias\Model\NoticiaFactory;
use Magento\Framework\View\Element\Template;

class Post extends Template
{
    protected $_template = 'widget/posts.phtml';

    /**
     * @var NoticiaFactory
     */
    private $noticiaFactory;

    public function __construct(
        Template\Context $context,
        NoticiaFactory $noticiaFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->noticiaFactory = $noticiaFactory;
    }

    public function getNoticiasCollection()
    {
        $post = $this->noticiaFactory->create();
        $limit = 10;
//        $limit = (int) $this->getRequest()->getParam('limit', 10);

        $collection = $post->getCollection();
        $collection->addFieldToSelect('titulo');
        $collection->getSelect()->limitPage(1, $limit);

        return $collection;
    }
}
