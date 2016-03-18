<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class Gerador extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->strEntityName = 'Cookbook\Entity\Gerador';
        parent::__construct($em);
    }

    public function gerarArquivo($arrPosts = array())
    {
        $strContent = '';
        unset($arrPosts['submit']);

        foreach ($arrPosts as $post => $intId) {
            $postRecuperado = $this->getService('Cookbook\Service\Post')->find((int)$intId);
            $strContent .= $postRecuperado->getCodigo();
        }

        $this->download('Controller', $strContent, 'php', 'application/x-httpd-php');
    }

    public function download($nomeArquivo, $conteudoArquivo, $extensao, $contentType)
    {
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: public', false);
        header('Content-Description: File Transfer');
        header("Content-type: {$contentType}");
        header("Content-Disposition: attachment; filename={$nomeArquivo}.{$extensao};");
        exit($conteudoArquivo);
    }
}
