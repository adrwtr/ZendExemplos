<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class ProcessoController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function listaAction()
    {
        $arrValores = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager')
            ->getRepository('Application\Entity\User')
            ->findAll();

        return new JsonModel(
            array(
                'arrValores' => $arrValores
            )
        );
    }

    public function formularioAction()
    {
        return new ViewModel();
    }

    public function persistirAction()
    {
        var_dump(
            json_decode(
                $this->getRequest()->getContent(),
                true
            )
        );
        die();
    }
}
