<?php
namespace ModuleTest\Application;

// unimestre
use Application\ClasseTeste;

class ClasseTesteTest extends \PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $objClasseTeste = new ClasseTeste();

        $this->assertEquals(
            1,
            $objClasseTeste->indexAction()
        );
    }
}