<?php
namespace Application\Log;

use Zend\EventManager\Event;

class LogTxt
{

    /**
     * Funcao que eh chamada apos o login
     *
     * @param Event $objEvent            
     */
    public function onLogged(Event $objEvent)
    {
        dump('Efutuar o log do usuario logado');
        
        dump($objEvent);
        
        dump($objEvent->getTarget());
        
        dump($objEvent->getParams());
    }
}

?>