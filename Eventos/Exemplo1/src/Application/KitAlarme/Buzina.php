<?php
namespace Application\KitAlarme;

use Zend\EventManager\Event;

/**
 * Representa uma buzina de alarme
 */
class Buzina
{
    public function tocar(Event $objEvent)
    {
        echo "<HR>";
        echo "A buzina está tocando";
        echo "<BR>";
        echo "O alarme foi disparado por: ";

        echo $objEvent->getTarget()
            ->getNome();

        return $this;
    }
}
?>