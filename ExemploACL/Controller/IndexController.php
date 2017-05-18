<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Permissions\ControleAcl;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
       
        $objControleAcl = new ControleAcl();
       
        
        // ALUNO
        dump('ALUNO');
        
        dump("Verificar o acesso do aluno ao ver as notas");
        
        dump($objControleAcl->isAllowed('aluno', 'vernotas'));
        
        
        dump("Verificar o acesso do aluno ao lancamento de notas");
        dump($objControleAcl->isAllowed('aluno', 'lancarnotas'));
        

        
        
        // PROFESSOR
        dump('PROFESSOR');
        
        dump('Verificar o acesso do professor ao lancar notas');
        dump($objControleAcl->isAllowed('professor', 'lancarnotas'));
        
        dump('Verificar o acesso do professor ao excluir notas');
        dump($objControleAcl->isAllowed('professor', 'excluirnotas'));
        
        dump('Verificar o acesso do professor ao editar notas');
        dump($objControleAcl->isAllowed('professor', 'editarnotas'));
        
        dump('Verificar o acesso do professoar a area de administracao');
        dump($objControleAcl->isAllowed('professor', 'administracao'));

        
        // PAI
        dump('PAI');
        
        dump('Verificar o acesso do pai a ver as notas');
        dump($objControleAcl->isAllowed('pai', 'vernotas'));
        
        dump('Verificar o acesso do pai a editar as notas');
        dump($objControleAcl->isAllowed('pai', 'editarnotas'));

        dump('Verificar o acesso do pai a adicionar um comentario');
        dump($objControleAcl->isAllowed('pai', 'adicionarcomentario'));
        
        dump('Verificar o acesso do pai a excluir um comentario');
        dump($objControleAcl->isAllowed('pai', 'excluircomentario'));        
        
        
        // ADMINISTRADOR
        dump('ADMINISTRADOR');
        
        dump('Verificar o acesso do administrador a area de administracao');
        dump($objControleAcl->isAllowed('administrador', 'administracao'));
        
        dump('Verificar o acesso do administrador a area de exclusao de comentario');
        dump($objControleAcl->isAllowed('administrador', 'excluircomentario'));
        
        dump('Verificar o acesso do administrador a area de lancamento de notas');
        dump($objControleAcl->isAllowed('administrador', 'lancarnotas'));
        
        dump('Verificar o acesso do administrador a area de ver notas');
        dump($objControleAcl->isAllowed('administrador', 'vernotas'));
        
        return new ViewModel();
    }
}
