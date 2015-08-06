<?php
namespace Application\Log;

use Zend\EventManager\Event;

class LogHtml
{

    /**
     * Funcao que eh chamada apos o login
     *
     * @param Event $objEvent            
     */
    public function onLoggedHtml(Event $objEvent)
    {
        dump('Efutuar o log do usuario logado no formato HTML');
        
        dump($objEvent);
        
        dump($objEvent->getTarget());
        
        dump($objEvent->getParams());
        
        //$objEvent->stopPropagation(true);
        //return 'testando';
    }
}

?>