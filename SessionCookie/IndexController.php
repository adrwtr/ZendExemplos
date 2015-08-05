<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;
use Zend\Http\Header\SetCookie;

class IndexController extends AbstractActionController
{
    const NOME_SESSAO = 'MinhaSessao';
    const NOME_COOCKIE = 'MeuCookie';

    public function indexAction()
    {
        $arrPost = $this->getRequest()
                ->getPost()
                ->toArray();

        if ( $arrPost['aonde'] == 'Sessao' )
        {
            $this->salvaSessao($arrPost['valor']);
        }

        if ( $arrPost['aonde'] == 'Cookie' )
        {
            $this->salvaCookie($arrPost['valor']);
        }

        return new ViewModel(
            array(
                'valorSessao' => $this->getValorSessao(),
                'valorCookie' => $this->getValorCookie()
            )
        );
    }

    /**
     * Salva na sessao
     *
     * @param  string
     */
    private function salvaSessao($valor)
    {
        $objContainer = new Container(self::NOME_SESSAO);
        $objContainer->valor = $valor;

        // limpa o valor da session
        // $objContainerUm->getManager()->getStorage()->clear('meuContainer');

        return $this;
    }

    /**
     * Salva no cookie
     *
     * @param  string
     */
    private function salvaCookie($valor)
    {
        $objDateTime = new \DateTime('now');
        $objDateTime->add(new \DateInterval('PT15S'));

        $objSetCookie = new SetCookie(
            self::NOME_COOCKIE,
            $valor,
            $objDateTime
        );

        $objHeader = $this->getResponse()
            ->getHeaders();

        $objHeader->addHeader($objSetCookie);
        $this->response->send();

        return $this;
    }

    /**
     * Recupera valor da sessao
     *
     * @return string
     */
    private function getValorSessao()
    {
        $objContainer = new Container(self::NOME_SESSAO);
        return $objContainer->valor;
    }


    /**
     * Recupera valor do cookie
     *
     * @return string
     */
    private function getValorCookie()
    {
        $objCookie = $this->getRequest()
            ->getCookie();

        if($objCookie &&  $objCookie->offsetExists(self::NOME_COOCKIE)) {
            return $objCookie->offsetGet(self::NOME_COOCKIE);
        }

        return null;
    }
}
