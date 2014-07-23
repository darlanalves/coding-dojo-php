<?php

class Pedido
{
	protected $livros = array();

	public function checarValor()
	{
		$total = 0;
		foreach($this->livros as $livro)
		{
			$total += $livro->preco();
		}
		return $total;
	}

	public function getQuantidade()
    {
        return count($this->livros);
    }

	public function addLivro(Livro $livro)
	{
		$this->livros[] = $livro;
	}
    
}
