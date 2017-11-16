<?php
/**
 * Created by PhpStorm.
 * User: CTA
 * Date: 16/11/2017
 * Time: 17:57
 */

namespace CTA\Noticias\Model\Api\Data;

interface NoticiaInterface
{
    public function getId();
    public function setId($id);

    public function getIdNoticia();
    public function setIdNoticia($id);

    public function getTitulo();
    public function setTitulo($titulo);
}
