<?php
namespace Application\Service;

use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\ServiceLocatorInterface;

use Application\KitAlarme\Luz;
use Application\KitAlarme\Buzina;
use Application\Entity\Usuario;

class AlarmeService implements EventManagerAwareInterface, FactoryInterface
{

    const C_EVENTO_ALARME = 'evento.alarme';

    /**
     *
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * Registra os eventos a serem executados
     * ao disparar a função dispararAlarme
     */
    public function __construct() {
        $objLuz = new Luz();
        $objBuzina = new Buzina();

        $this->getEventManager()
            ->attach(
                self::C_EVENTO_ALARME, 
                array(
                    $objLuz,
                    'ligar'
                ),
            1
        );

        $this->getEventManager()
            ->attach(
                self::C_EVENTO_ALARME, 
                array(
                    $objBuzina,
                    'tocar'
                ),
            1
        );
    }

    /**
     * setEventManager
     *
     * @param EventManagerInterface $eventManager
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(
            array(
                __CLASS__,
                get_called_class()
            )
        );

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
     * Altera os estados dos objetos ao disparar o alarme
     */
    public function dispararAlarme(Usuario $objUsuario)
    {
        $objResult = $this->getEventManager()
            ->trigger(
                self::C_EVENTO_ALARME,
                $objUsuario
            );
    }

    /**
     * Função implementada de FactoryInterface
     * Cria o serviço
     *
     * @param ServiceLocatorInterface $objServiceLocator
     *
     * @return Doctrine\ORM\EntityManager
     */
    public function createService(
        ServiceLocatorInterface $objServiceLocator
    ) {
        return $this;
    }
}

?>