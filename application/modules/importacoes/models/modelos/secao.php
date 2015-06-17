<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of secao
 *
 * @author denner.fernandes
 */
class secao {

  public $codigo = '';                                            //String 35 1
  public $descricao = '';                                         //String 60 2
  public $cnpj = '';                                              //String 20 3
  public $cnpjAnterior = '';                                      //String 20 4
  public $cei = '';                                               //(CNPJ Provisório) String 20 5
  public $fpas = '';                                              //Nº da Atividade da Empresa no INSS String 03 6
  public $sat = '';                                               //Seguro de Acidente de Trabalho String 12 7
  public $atividadeEconomica = '';                                //(CNAE 2.0) String 07 8
  public $inscricaoEstadual = '';                                 //String 15 9
  public $inscricaoMunicipal = '';                                //String 15 10
  public $rua = '';                                               //String 30 11
  public $numero = '';                                            //String 08 12
  public $complemento = '';                                       //String 30 13
  public $bairro = '';                                            //String 30 14
  public $estado = '';                                            //String 02 15
  public $cidade = '';                                            //String 32 16
  public $cep = '';                                               //String 09 17
  public $pais = '';                                              //String 16 18
  public $telefone = '';                                          //String 15 19
  public $codigoCaixaEconomicaFederal = '';                       //String 14 20
  public $numeroNaoEmpregadosProprietarios = 0;                   //Inteiro 04 21
  public $prefixoInscricaoRais = '';                              //String 02 22
  public $codigoCategoriaFgts = '';                               //(01-Entidade Filantrópica 02-Clube de Futebol 03-Pessoa Física Urbana 04-Pessoa Física Rural 05-Pessoa Jurídica Rural 06-Sindicato agreg. Trab. Avulso 99-Outros) String 02 23
  public $integracaoContabil = '';                                //String 15 24
  public $integracaoGerencial = '';                               //String 15 25
  public $codigoFilialContabil = 0;                               //Inteiro 07 26
  public $codigoTerceirosGuiaInss = '';                           //String 04 28
  public $percentualTerceiros = '';                               //(Formato 999, 99) Real 06 29
  public $percentualAcidenteTrabalho = '';                        //(Formato 999, 99) Real 06 30
  public $faturamentoBruto = '';                                  //(Formato 999999999999, 99) Real 15 31
  public $valorFrete = '';                                        //(Formato 999999999999, 99) Real 15 32
  public $informacoesGrps1 = '';                                  //String 37 33
  public $informacoesGrps2 = '';                                  //String 37 34
  public $informacoesGrps3 = '';                                  //String 37 35
  public $codigoUnidadeEntrega = '';                              //String 06 36
  public $pessoaContato = '';                                     //String 20 37
  public $ramal = '';                                             //String 04 38
  public $codigoDepartamentoVtTicket = '';                        //String 06 39
  public $inicioPrimeiroPeriodoRecolhimentoProprio = 0;           //Inteiro 02 40
  public $fimPrimeiroPeriodoRecolhimentoProprio = 0;              //Inteiro 02 41
  public $eventosPagosAteQuintoDiaUtil = 0;                       //(0-Não/1-Sim) Inteiro 01 42
  public $inicioSegundoPeriodoRecolhimentoProprio = 0;            //Inteiro 02 43
  public $fimSegundoPeriodoRecolhimentoProprio = 0;               //Inteiro 02 44
  public $eventosPagosAteQuintoDiaUtil2 = 0;                      //(0-Não/1-Sim) Inteiro 01 45
  public $inicioPrimeiroPeriodoRecCentralizado = 0;               //Inteiro 02 46
  public $fimPrimeiroPeriodoRecCentralizado = '';                 //Inteiro 02 47
  public $recCentrEventosAteQuintoDiaUtil = '';                   //(0-Não/1-Sim) Inteiro 01 48
  public $inicioSegundoPeriodoRecCentralizado = '';               //Inteiro 02 49
  public $fimSegundoPeriodoRecCentralizado = '';                  //Inteiro 02 50
  public $recCentrEventosAteQuintoDiaUtil2 = '';                  //(0-Não/1-Sim) Inteiro 01 51
  public $codigoSecaoCentralizadora = '';                         //String 35 52
  public $contribuicaoSesiSenai = '';                             //(0-Não/1-Sim) Inteiro 01 53
  public $distribuidoraPetrolifera = '';                          //(0-Não/1-Sim) Inteiro 01 54
  public $pessoaFisica = '';                                      //(0-Não/1-Sim) Inteiro 01 55
  public $indicativoSecaoDesativada = '';                         //(0-Não/1-Sim) Inteiro 01 56
  public $identificativoIdentificacaoCnpj = '';                   //(0-Não/1-Sim) Inteiro 01 57
  public $indicativoAlteracaoEndereco = '';                       //(0-Não/1-Sim) Inteiro 01 58
  public $enderecoParaPagamentoVtTicket = '';                     //String 48 59
  public $identificacaoPedidoVtTicket = '';                       //Inteiro 10 60
  public $identificacaoPersonalizadaVtTicket = '';                //Inteiro 10 61
  public $codigoClienteVtTicket = '';                             //String 06 62
  public $codigoLocalVtTicket = '';                               //String 10 63
  public $codigoSecaoFaturamentoVtTicket = '';                    //String 35 64
  public $codigoSecaoPedidoVtTicket = '';                            //String 35 65
  public $codigoSecaoCobrancaVtTicket = '';                       //String 35 66
  public $codigoSecaoEntregaVtTicket = '';                        //String 35 67
  public $codigoCentroCustoVtTicket = '';                         //String 25 68
  public $causaMudancaCnpj = '';                                  //0 - Não Alterou 1 - Fusão 2 - Incorporação 3 - Cisão 4 - Mudança CEI p/ CNPJ 5 - Encerramento das Atividades 6 - Matrícula CEI vinculada ao CNPJ Inteiro 01 69
  public $codigoMunicipio = '';                                   //String 07 70
  public $mesDataBase = '';                                       //Inteiro 02 71
  public $naturezaJuridica = '';                                  //String 04 72
  public $codigoCalendario = '';                                  //String 16 73
  public $prefixoInscricaoFgts = '';                              //String 02 74
  public $primeiraDeclaracaoCaged = '';                           //(0-Não/1-Sim) Inteiro 01 75
  public $alteracaoCaged = '';                                    //1 - Nada a atualizar 2 - Atualizar dados do Estabelecimento 3 - Encerramento das Atividades Inteiro 01 76
  public $codigoIdentificadorFilial = '';                         //Inteiro 07 77
  public $codigoIdentificadorDepartamento = '';                   //String 25 78
  public $limiteFuncionarios = '';                                //Inteiro 10 79
  public $optaSimples = '';                                       //Inteiro 01 80
  public $alterouCnae = '';                                       //(0-Não/1-Sim) Inteiro 01 81
  public $chapaFuncionárioResponsável = '';                       //(Obs: pode ser nula) Inteiro 16 82
  public $percentualGrps15AnosAposentadoria = '';                 //Inteiro 02 83
  public $percentualGrps20AnosAposentadoria = '';                 //Inteiro 02 84
  public $percentualGrps25AnosAposentadoria = '';                 //Inteiro 05 85
  public $ddd = '';                                               //String 04 86
  public $codigoPagamentoGps = '';                                //String 05 87
  public $porteEmpresa = '';                                      //Inteiro 05 88
  public $percentualIsencaoFilantropia = '';                      //Real 15 89
  public $participPat = '';                                       //(0-Não/1-Sim) Inteiro 05 90
  public $codigoDepartamentoContabil = '';                        //String 25 91
  public $isentaContribuicaoSocial = '';                          //(0-Sim/1- Não) Inteiro 01 92
  public $vinculosParticipantesPatAcimaCincoSalarioMinimo = '';   //Inteiro 10 93
  public $vinculosParticipantesPatAteCincoSalarioMinimo = '';     //Inteiro 10 94
  public $porcentagemAdministracaoCozinha = '';                   //Inteiro 05 95
  public $porcentagemAlimentacaoConvenio = '';                    //Inteiro 05 96
  public $porcentagemCestaAlimento = '';                          //Inteiro 05 97
  public $porcentagemRefeicaoConvenio = '';                       //Inteiro 05 98
  public $porcentagemRefeicaoTransportada = '';                   //Inteiro 05 99
  public $porcentagemServicosProprio = '';                        //Inteiro 05 100
  public $indicadorEncerramentoAtividades = '';                   //Inteiro 05 101
  public $dataEncerramentoAtividades = '';                        //Data 08 102
  public $brancos = '';                                           //String 05 103
  public $email = '';                                             //String 45 104
  public $localidade = '';                                        //(implementação futura) String 40 105
  public $capitalSocialEmpresa = '';                              //Real 15 106
  public $capitalSocialEstabelecimento = '';                      //Real 15 107
  public $codigoPagamentoGpssomenteTerceiros = '';                //Real 4 108

  public function montar() {

    $linha = substr(str_pad($this->codigo, 35, ' ', STR_PAD_RIGHT), 0, 35) . ';';
    $linha .= substr(str_pad($this->descricao, 60, ' ', STR_PAD_RIGHT), 0, 60) . ';';
    $linha .= substr(str_pad($this->cnpj, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->cnpjAnterior, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->cei, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->fpas, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->sat, 12, ' ', STR_PAD_RIGHT), 0, 12) . ';';
    $linha .= substr(str_pad($this->atividadeEconomica, 7, ' ', STR_PAD_RIGHT), 0, 7) . ';';
    $linha .= substr(str_pad($this->inscricaoEstadual, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->inscricaoMunicipal, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->rua, 30, ' ', STR_PAD_RIGHT), 0, 30) . ';';
    $linha .= substr(str_pad($this->numero, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->complemento, 30, ' ', STR_PAD_RIGHT), 0, 30) . ';';
    $linha .= substr(str_pad($this->bairro, 30, ' ', STR_PAD_RIGHT), 0, 30) . ';';
    $linha .= substr(str_pad($this->estado, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->cidade, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->cep, 9, ' ', STR_PAD_RIGHT), 0, 9) . ';';
    $linha .= substr(str_pad($this->pais, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->telefone, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->codigoCaixaEconomicaFederal, 14, ' ', STR_PAD_RIGHT), 0, 14) . ';';
    $linha .= substr(str_pad($this->numeroNaoEmpregadosProprietarios, 4, 0, STR_PAD_LEFT), 0, 4) . ';';
    $linha .= substr(str_pad($this->prefixoInscricaoRais, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoCategoriaFgts, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->integracaoContabil, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->integracaoGerencial, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->codigoFilialContabil, 7, 0, STR_PAD_LEFT), 0, 7) . ';';
    $linha .= substr(str_pad($this->codigoCentroCustoVtTicket, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->codigoTerceirosGuiaInss, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->percentualTerceiros, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->percentualAcidenteTrabalho, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->faturamentoBruto, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->valorFrete, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->informacoesGrps1, 37, ' ', STR_PAD_RIGHT), 0, 37) . ';';
    $linha .= substr(str_pad($this->informacoesGrps2, 37, ' ', STR_PAD_RIGHT), 0, 37) . ';';
    $linha .= substr(str_pad($this->informacoesGrps3, 37, ' ', STR_PAD_RIGHT), 0, 37) . ';';
    $linha .= substr(str_pad($this->codigoUnidadeEntrega, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->pessoaContato, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->ramal, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->codigoDepartamentoVtTicket, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->inicioSegundoPeriodoRecolhimentoProprio, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->fimPrimeiroPeriodoRecolhimentoProprio, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->eventosPagosAteQuintoDiaUtil, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->inicioSegundoPeriodoRecolhimentoProprio, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->fimSegundoPeriodoRecolhimentoProprio, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->eventosPagosAteQuintoDiaUtil2, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->inicioPrimeiroPeriodoRecCentralizado, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->fimPrimeiroPeriodoRecCentralizado, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->recCentrEventosAteQuintoDiaUtil, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->inicioSegundoPeriodoRecCentralizado, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->fimSegundoPeriodoRecCentralizado, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->recCentrEventosAteQuintoDiaUtil2, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoSecaoCentralizadora, 35, ' ', STR_PAD_RIGHT), 0, 35) . ';';
    $linha .= substr(str_pad($this->contribuicaoSesiSenai, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->distribuidoraPetrolifera, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->pessoaFisica, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicativoSecaoDesativada, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->identificativoIdentificacaoCnpj, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->indicativoAlteracaoEndereco, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->enderecoParaPagamentoVtTicket, 48, ' ', STR_PAD_RIGHT), 0, 48) . ';';
    $linha .= substr(str_pad($this->identificacaoPedidoVtTicket, 10, 0, STR_PAD_LEFT), 0, 10) . ';';
    $linha .= substr(str_pad($this->identificacaoPersonalizadaVtTicket, 10, 0, STR_PAD_LEFT), 0, 10) . ';';
    $linha .= substr(str_pad($this->codigoClienteVtTicket, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->codigoLocalVtTicket, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->codigoSecaoFaturamentoVtTicket, 35, ' ', STR_PAD_RIGHT), 0, 35) . ';';
    $linha .= substr(str_pad($this->codigoSecaoPedidoVtTicket, 35, ' ', STR_PAD_RIGHT), 0, 35) . ';';
    $linha .= substr(str_pad($this->codigoSecaoCobrancaVtTicket, 35, ' ', STR_PAD_RIGHT), 0, 35) . ';';
    $linha .= substr(str_pad($this->codigoSecaoEntregaVtTicket, 35, ' ', STR_PAD_RIGHT), 0, 35) . ';';
    $linha .= substr(str_pad($this->codigoCentroCustoVtTicket, 35, ' ', STR_PAD_RIGHT), 0, 35) . ';';
    $linha .= substr(str_pad($this->causaMudancaCnpj, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoMunicipio, 7, ' ', STR_PAD_RIGHT), 0, 7) . ';';
    $linha .= substr(str_pad($this->mesDataBase, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->naturezaJuridica, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->codigoCalendario, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->prefixoInscricaoFgts, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->primeiraDeclaracaoCaged, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->alteracaoCaged, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoIdentificadorFilial, 7, 0, STR_PAD_LEFT), 0, 7) . ';';
    $linha .= substr(str_pad($this->codigoIdentificadorDepartamento, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->limiteFuncionarios, 10, 0, STR_PAD_LEFT), 0, 10) . ';';
    $linha .= substr(str_pad($this->optaSimples, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->alterouCnae, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->chapaFuncionárioResponsável, 16, 0, STR_PAD_LEFT), 0, 16) . ';';
    $linha .= substr(str_pad($this->percentualGrps15AnosAposentadoria, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->percentualGrps20AnosAposentadoria, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->percentualGrps25AnosAposentadoria, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->ddd, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->codigoPagamentoGps, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->porteEmpresa, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->percentualIsencaoFilantropia, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->participPat, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->codigoDepartamentoContabil, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->isentaContribuicaoSocial, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->vinculosParticipantesPatAcimaCincoSalarioMinimo, 10, 0, STR_PAD_LEFT), 0, 10) . ';';
    $linha .= substr(str_pad($this->vinculosParticipantesPatAteCincoSalarioMinimo, 10, 0, STR_PAD_LEFT), 0, 10) . ';';
    $linha .= substr(str_pad($this->porcentagemAdministracaoCozinha, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->porcentagemAlimentacaoConvenio, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->porcentagemCestaAlimento, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->porcentagemRefeicaoConvenio, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->porcentagemRefeicaoTransportada, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->porcentagemServicosProprio, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->indicadorEncerramentoAtividades, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->dataEncerramentoAtividades, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->brancos, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->email, 45, ' ', STR_PAD_RIGHT), 0, 45) . ';';
    $linha .= substr(str_pad($this->localidade, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->capitalSocialEmpresa, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->capitalSocialEstabelecimento, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->codigoPagamentoGpssomenteTerceiros, 4, 0, STR_PAD_LEFT), 0, 4);

    return $linha;
  }
  
}
