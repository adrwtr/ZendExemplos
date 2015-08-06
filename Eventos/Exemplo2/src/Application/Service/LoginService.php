<?php
namespace Application\Service;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;
use Application\Entity\Usuario;

class LoginService implements EventManagerAwareInterface
{

    const LOGGED_EVENT = 'logged.event.service.login';

    /**
     *
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * setEventManager
     *
     * @param EventManagerInterface $eventManager
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(array(
            __CLASS__,
            get_called_class()
        ));

        $this->eventManager = $eventManager;

        return $this;
    }

    /**
     *
     * getEventManager
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (null === $this->eventManager) {
            $this->setEventManager(new EventManager());
        }

        return $this->eventManager;
    }

    /**
     * login
     */
    public function login()
    {

        /** executar consulta no banco de dados para verificar se o usuario fio autenticado  */

        $objUsuario = new Usuario();

        $objResult = $this->getEventManager()->trigger(self::LOGGED_EVENT, $objUsuario);

        dump($objResult);
    }
}

?>