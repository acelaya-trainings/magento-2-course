<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 16/11/2017
 * Time: 20:03
 */

namespace CTA\Noticias\Block;

use CTA\Noticias\Model\NoticiaFactory;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\View\Element\Template;
use Magento\Theme\Block\Html\Pager;

class Prueba extends Template
{
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

    public function getNoticias()
    {
        $collection = $this->noticiaFactory->create()->getCollection();
        $collection->addFieldToSelect('titulo');
        return $this->serializeCollection($collection);
    }

    public function getNoticiasCollection()
    {
        $post = $this->noticiaFactory->create();
        $page = (int) $this->getRequest()->getParam('p', 1);
        $limit = (int) $this->getRequest()->getParam('limit', 10);
        $title = '%' . $this->getRequest()->getParam('titulo', '') . '%';
        $date = $this->getRequest()->getParam('date', '');

        $collection = $post->getCollection();
        $collection->getSelect()->limitPage($page, $limit);

        // Apply "OR" conditions
//        $collection->addFieldToFilter([
//            [
//                'attribute' => 'titulo',
//                'like' => $title,
//            ],
//            [
//                'attribute' => 'fechaPublicacion',
//                'eq' => $date,
//            ],
//        ]);
        $collection->addFieldToFilter('titulo', ['like' => $title]);
//        $collection->addFieldToFilter('fechaPublicacion', ['eq' => $date]);

        return $collection;
    }

    private function serializeCollection(AbstractCollection $collection)
    {
        $data = [];
        foreach ($collection as $item) {
            $data[] = $item->getData();
        }

        return $data;
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Listado noticias'));

        $collection = $this->getNoticiasCollection();
        if (count($collection) > 0) {
            /** @var Pager $pager */
            $pager = $this->getLayout()->createBlock(Pager::class, 'my.custom.pager');
            $pager->setAvailableLimit([
                1 => 1,
                10 => 10,
                50 => 50,
                100 => 100,
            ]);
            $pager->setCollection($collection);

            $this->setChild('pager', $pager);

            $collection->load();
        }

        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
