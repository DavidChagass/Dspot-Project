<?php
class Estoque
{
    // atributos do objeto
    private $nomeproduto;
    private $quanttotal;
    private $quantatual;
    private $marca;
    private $ultimasaida;
    
    // metodo contrutor 
    public function __construct($nomeproduto, $quanttotal, $quantatual, $marca, $ultimasaida)
    {
        $this->nomeproduto = $nomeproduto;
        $this->quanttotal = $quanttotal;
        $this->quantatual = $quantatual;
        $this->marca = $marca;
        $this->ultimasaida = $ultimasaida;
    }
    // funções do objeto
    public function getNomeproduto(){
        return $this->nomeproduto;
    }
    public function getquanttotal(){
        return $this->quanttotal;
    }
    public function getquantatual(){
        return $this->quantatual;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function getultimasaida(){
        return $this->ultimasaida;
    }
}
