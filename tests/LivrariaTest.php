<?php

class LivrariaTest extends PHPUnit_Framework_TestCase
{
    protected $livro;
    protected $pedido;
    const NOME = "A Pedra Filosofal";
    const PRECO = 41;

    // run before any test method of this class will be executed
    public static function setUpBeforeClass()
    {
    }

    // run before each test method
    protected function setUp()
    {
        $this->livro = new Livro(self::NOME, self::PRECO);
        $this->pedido = new Pedido();
    }

    public function testLivro()
    {
        $this->assertEquals(self::NOME, $this->livro->nome());
        $this->assertEquals(self::PRECO, $this->livro->preco());
    }

    public function testPedido(){
        $this->assertEquals(0,$this->pedido->getQuantidade());
    }

    public function testAdicionarLivro(){
        $this->pedido->addLivro($this->livro);
        $this->assertEquals(1,$this->pedido->getQuantidade());
    } 

    public function testValorTotalPedido(){
        $this->assertEquals(0, $this->pedido->checarValor());
    }

    public function testDesconto() {
        $this->pedido->addLivro($this->livro);
        $this->pedido->addLivro($this->livro);
        $this->assertEquals(0.95*2*self::PRECO, $this->pedido->checarValor());
    }



    // run after each test method
    protected function tearDown()
    {
        $this->sample = null;
    }

    // run after all test methods of this class have been executed
    public static function tearDownAfterClass()
    {
    }
}
