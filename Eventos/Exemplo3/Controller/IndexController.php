<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Service\AlarmeService;

use Application\Entity\Usuario;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        $objAlarmeService = $this->getServiceLocator()
            ->get('Application\Service\AlarmeService');

        $objUsuario = new Usuario();

        $objAlarmeService->dispararAlarme(
            $objUsuario
        );

        return new ViewModel();
    }
}
