<?php
namespace Application\Permissions;

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

class ControleAcl extends Acl
{
    public function __construct() {
        
        $objRoleAluno = new Role('aluno');
        $objRolePai = new Role('pai');
        $objRoleProfessor = new Role('professor');
        $objRoleAdministrador = new Role('administrador');
        
        $this->addRole($objRoleAluno);
        
        $this->addRole($objRolePai, [
            $objRoleAluno
        ]);
        
        $this->addRole($objRoleProfessor, $objRoleAluno);
        
        $this->addRole($objRoleAdministrador);
        
        $objRecursoVerNotas = new Resource('vernotas');
        $objRecursoAdicionarComentario = new Resource('adicionarcomentario');
        $objRecursoExcluirComentario = new Resource('excluircomentario');
        $objRecursoLancarNotas = new Resource('lancarnotas');
        $objRecursoEditarNotas = new Resource('editarnotas');
        $objRecursoExcluirNotas = new Resource('excluirnotas');
        $objRecursoAdministracao = new Resource('administracao');
        
        
        $this->addResource($objRecursoVerNotas);
        $this->addResource($objRecursoAdicionarComentario);
        $this->addResource($objRecursoExcluirComentario);
        $this->addResource($objRecursoLancarNotas);
        $this->addResource($objRecursoEditarNotas, $objRecursoLancarNotas);
        $this->addResource($objRecursoExcluirNotas, $objRecursoLancarNotas);
        $this->addResource($objRecursoAdministracao);
        
        $this->allow('aluno', [
            'vernotas',
        ]);
        
        $this->allow(['professor', 'pai'], [
            'adicionarcomentario'
        ]);
        
        $this->allow('professor', [ 
            'lancarnotas'
        ]);
        
        $this->allow('administrador');
    }
}

?>