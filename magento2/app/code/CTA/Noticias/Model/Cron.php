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
    /**
     * @var NoticiaFactory
     */
    private $noticiaFactory;

    public function __construct(
        Context $context,
        Registry $registry,
        LoggerInterface $logger,
        NoticiaFactory $noticiaFactory
    ) {
        parent::__construct($context, $registry);
        $this->logger = $logger;
        $this->noticiaFactory = $noticiaFactory;
    }

    public function logHola()
    {
        $this->logger->info('Hola');
    }

    public function generarXML()
    {
        $xml = new \SimpleXMLElement('<xml />');

        $noticias = $this->noticiaFactory->create()->getCollection();
        foreach ($noticias as $noticiaData) {
            $noticia = $xml->addChild('noticia');
            $noticia->addChild('titulo', $noticiaData['titulo']);
            $noticia->addChild('fechaPublicacion', $noticiaData['fechaPublicacion']);
        }
        $result = $xml->asXML();

        $this->logHola();
        $ruta = __DIR__ . '/../../../../../fichero.xml';
        \file_put_contents($ruta, $result);
    }
}
