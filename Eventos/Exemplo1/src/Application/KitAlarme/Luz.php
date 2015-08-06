<?php
namespace Application\KitAlarme;

use Zend\EventManager\Event;

/**
 * Representa uma luz de alarme
 */
class Luz
{
    private $sn_luz_ligada;

    public function ligar(Event $objEvent)
    {
        $this->sn_luz_ligada = true;
        echo "A luz está ligada";
        echo "<BR>";
        echo "O alarme foi disparado por: ";

        echo $objEvent->getTarget()
            ->getNome();

        return $this;
    }

    public function desligar()
    {
        $this->sn_luz_ligada = false;
        echo "A luz está desligada";
        return $this;
    }

    public function isLuzLigada() {
        return $this->sn_luz_ligada;
    }
}
?>