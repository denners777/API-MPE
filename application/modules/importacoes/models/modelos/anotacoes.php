<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of anotacoes
 *
 * @author rafael.reis
 */
class anotacoes {

    public $chapa = '';                           //String	16	1
    public $numeroAnotacao = 0;                   //Inteiro	2	2
    public $tipoAnotacao = 0;                     //Inteiro	2	3
    public $dataAnotacao = '';                    //Data	8	4
    public $dataResolucao = '';                   //Data	8	5
    public $texto = '';                           // (começa com /@ e termina com @/)Memo	-6
    public $codigoPessoaSolicitanteAnotacao = 0;  //Inteiro	4	7

    public function montar() {

        $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
        $linha .= substr(str_pad($this->numeroAnotacao, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
        $linha .= substr(str_pad($this->tipoAnotacao, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
        $linha .= substr(str_pad($this->dataAnotacao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
        $linha .= substr(str_pad($this->dataResolucao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
        $linha .= '/@' . $this->texto . '@/;';
        $linha .= substr(str_pad($this->codigoPessoaSolicitanteAnotacao, 4, 0, STR_PAD_LEFT), 0, 4);

        return $linha;
    }

}
