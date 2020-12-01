<?php 
class Pagamento
{
  private $id;
  private $contaId;
  private $dataPagamento;

  public function __construct($contaId, $dataPagamento) {
    $this->contaId = $contaId;
    $this->dataPagamento = $dataPagamento;
  }

  public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getContaId(){
		return $this->contaId;
	}

	public function setContaId($contaId){
		$this->contaId = $contaId;
	}

	public function getDataPagamento(){
		return $this->dataPagamento;
	}

}
