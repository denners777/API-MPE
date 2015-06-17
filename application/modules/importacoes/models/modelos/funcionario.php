<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funcionario
 *
 * @author denner.fernandes
 */
class funcionario {

  //Legenda
  //F - campos cuja alteração ligam os flags de FGTS
  //H - campos cuja alteração geram histórico
  //Q - campos que podem ser alterados via RM Portal

  public $chapa = '';                                 //F String 16 1
  public $nome = '';                                  //F String 120 2
  public $apelido = '';                               //String 40 3
  public $dataNascimento = '';                        //F Data 08 4
  public $estadoCivil = '';                           //Char 01 5
  public $sexo = '';                                  //(M/F) Char 01 6
  public $nacionalidade = '';                         //String 02 7
  public $grauInstrucao = '';                         //String 01 8
  public $rua = '';                                   //FHQ String 30 9
  public $numero = '';                                //FHQ String 08 10
  public $complemento = '';                           //FHQ String 16 11
  public $bairro = '';                                //FHQ String 20 12
  public $estado = '';                                //FHQ (Unidade da Federação) String 02 13
  public $cidade = '';                                //FHQ String 32 14
  public $cep = '';                                   //FHQ String 09 15
  public $nomePais = '';                              //FHQ String 16 16
  public $registroProfissional = '';                  //String 15 17
  public $cpf = '';                                   //String 12 18
  public $telefone1 = '';                             //FQ String 15 19
  public $telefone2 = '';                             //FQ String 15 20
  public $numeroCarteiraIdentidade = '';              //String 15 21
  public $ufCarteiraIdentidade = '';                  //String 02 22
  public $orgaoEmissorCarteiraIdentidade = '';        //String 15 23
  public $dataEmissaoCarteiraIdentidade = '';         //Data 08 24
  public $dataVencimentoCarteiraIdentidade = '';      //Data 08 25
  public $tituloEleitor = '';                         //String 14 26
  public $zonaVotacao = '';                           //String 06 27
  public $secaoVotacao = '';                          // String 06 28
  public $numeroCarteiraTrabalho = '';                //F String 10 29
  public $serieCarteiraTrabalho = '';                 //F String 05 30
  public $ufCarteiraTrabalho = '';                    //String 02 31
  public $dataEmissaoCarteiraTrabalho = '';           //Data 08 32
  public $dataVencimentoCarteiraTrabalho = '';        //Data 08 33
  public $nitTipoCarteiraTrabalho = 0;                //(0-Não/1-Sim) Inteiro 01 34
  public $numeroCarteiraMotorista = '';               //String 15 35
  public $tipoCarteiraHabilitacao = '';               //String 05 36
  public $dataVencimentoHabilitacao = '';             //Data 08 37
  public $numeroCertificadoReservista = '';           //String 40 38
  public $categoriaMilitar = '';                      //String 10 39
  public $naturalidade = '';                          //String 32 40
  public $estadoNatal = '';                           //String 02 41
  public $dataChegadaBrasil = '';                     //Data 08 42
  public $cartaModelo19 = '';                         //String 15 43
  public $conjugeBrasil = 0;                          //(0-Não/1-Sim) Inteiro 01 44
  public $naturalizado = 0;                           //(0-Não/1-Sim) Inteiro 01 45
  public $filhosBrasil = 0;                           //(0-Não/1-Sim) Inteiro 01 46
  public $numeroFilhosBrasil = 0;                     //Inteiro 02 47
  public $numeroRegistroGeral = '';                   //String 15 48
  public $numeroDecreto = '';                         //String 15 49
  public $tipoVisto = '';                             //String 10 50
  public $email = '';                                 //String 60 51
  public $senha = '';                                 //Q String 08 52
  public $numeroFichaRegistro = 0;                    //Inteiro 10 53
  public $codigoRecebimento = '';                     //Char 01 54
  public $codigoSituacao = '';                        //H Char 01 55
  public $codigoTipoFuncionario = '';                 //F Char 01 56
  public $codigoSecao = '';                           //F H String 35 57
  public $codigoFuncao = '';                          //H String 10 58
  public $codigoSindicato = '';                       //String 10 59
  public $jornada = '';                               //H (Formato HHH:MM) String 06 60
  public $codigoHorario = '';                         //H  String 10 61
  public $numeroDependentesIrrf = 0;                  //H Inteiro 02 62
  public $numeroDependentesSalarioFamilia = 0;        //Inteiro 02 63
  public $dataBase = '';                              //Data 08 64
  public $salario = 0;                                //H (Formato 999999999999, 99) Real 15 65
  public $situacaoFgts = '';                          //(1-Optante / 2-Não Optante) Char 01 66
  public $dataOpcaoFgts = '';                         //F Data 08 67
  public $numeroContaFgts = '';                       //String 11 68
  public $saldoFgtsBanco = 0;                         //(Formato 999999999999, 99) Real 15 69
  public $dataSaldoFgts = '';                         //Data 08 70
  public $pisPasep = '';                              //F String 11 71
  public $dataCadastroPis = '';                       //Data 08 72
  public $codigoBancoPis = '';                        //String 03 73
  public $contribuicaoSindical = '';                  //(J-Já descontou L-Liberal N-Não descontou) Char 01 74
  public $aposentado = 0;                             //(0-Não/1-Sim) Inteiro 01 75
  public $mais65Anos = 0;                             //(0-Não/1-Sim) Inteiro 01 76
  public $ajudaCusto = 0;                             //(Formato 999999999999, 99) Real 15 77
  public $percentualAdiantamento = 0;                 //(Formato 999, 99) Real 06 78
  public $arredondamento = 0;                         //(Formato 99999, 99) Real 08 79
  public $dataAdmissao = '';                          //F Data 08 80
  public $tipoAdmissao = '';                          //F Char 01 81
  public $dataTransferencia = '';                     //Data 08 82
  public $motivoAdmissao = '';                        //String 02 83
  public $contratoTemPrazoDeterminado = 0;            //(0-Não/1-Sim) Inteiro 01 84
  public $fimPrazoContrato = '';                      //Data 08 85
  public $dataDemissao = '';                          //Data 08 86
  public $tipoDemissao = '';                          //Char 01 87
  public $motivoDemissao = '';                        //String 02 88
  public $dataDesligamento = '';                      //Data 08 89
  public $dataUltimaMovimentacao = '';                //Data 08 90
  public $dataPagamentoRescisao = '';                 //Data 08 91
  public $codigoSaqueFgts = '';                       //String 02 92
  public $temAvisoPrevio = 0;                         //(0- Não / 1-Sim) Inteiro 01 93
  public $dataAvisoPrevio = '';                       //Data 08 94
  public $numeroDiasAviso = 0;                        //Inteiro 03 95
  public $dataVencimentoFerias = '';                  //Data 08 96
  public $inicioProgramacaoFerias1 = '';               //Q  Data 08 97
  public $fimProgramacaoFerias1 = '';                 //Q Data 08 98
  public $querAbono = 0;                              //(0- Não / 1-Sim) Inteiro 01 99
  public $querPrimeiraParcela13 = 0;                  //(0- Não / 1-Sim) Inteiro 01 100
  public $numeroDiasAdiantamentoFerias = 0;           //Inteiro 03 101
  public $eventoAdiantamentoFerias = '';              //String 04 102
  public $feriasColetivasGlobais = 0;                 //(0-Não/1-Sim) Inteiro 01 103
  public $numeroDiasFerias = 0;                       //Q (Formato 9999, 99, onde 1º dígito ésinal. Se for positivo, 1º dígito é 0) Real 07 104
  public $numeroDiasAbono = 0;                        //(Formato 999, 99) Real 06 105
  public $saldoFerias = 0;                            //(Formato 999, 99) Real 06 106
  public $saldoFeriasAnterior = 0;                    //Formato 999, 99) Real 06 107
  public $saldoFeriasAuxiliar = 0;                    //(Formato 999, 99) Real 06 108
  public $observacaoFerias = '';                      //String 80 109
  public $dataPagamentoFerias = '';                   //Data 08 110
  public $dataAvisoFerias = '';                       //Data 08 111
  public $numeroDiasLicencaRemunerada1 = 0;           //(Formato 999, 99) Real 06 112
  public $numeroDiasLicencaRemunerada2 = 0;           //(Formato 999, 99) Real 06 113
  public $dataInicioLicenca = '';                     //Data 08 114
  public $mediaSalarioMaternidade = 0;                //(Formato 999999999999, 99) Real 15 115
  public $situacaoRais = '';                          //Char 01 116
  public $codigoBancoPagamento = '';                  //Q String 03 117
  public $codigoAgenciaPagamento = '';                //Q String 06 118
  public $contaPagamento = '';                        //Q String 15 119
  public $membroSindical = 0;                         //(0-Não/1-Sim) Inteiro 01 120
  public $vinculoRais = '';                           //F Char 01 121
  public $usaValeTransporte = 0;                      //(0-Não/1-Sim) Inteiro 01 122
  public $diasUteisMes = 0;                           //Inteiro 02 123
  public $diasUteisMeioExpediente = 0;                //Inteiro 02 124
  public $diasUteisProximoMes = 0;                    //Inteiro 02 125
  public $diasUteisProximoMesMeioexpediente = 0;      //Inteiro 02 126
  public $diasUteisRestantes = 0;                     //Inteiro 02 127
  public $diasUteisRestantesMeio = 0;                 //Inteiro 02 128
  public $mudouEndereco = 0;                          //(0-Não/1-Sim) Inteiro 01 129
  public $mudouCarteiraTrabalho = 0;                  //(0-Não/1-Sim) Inteiro 01 130
  public $antigaCarteiraTrabalho = '';                //String 10 131
  public $antigaSerieCarteiraTrabalho = '';           //String 05 132
  public $mudouNome = 0;                              //(0-Não/1-Sim) Inteiro 01 133
  public $antigoNome = '';                            //String 45 134
  public $mudouPis = 0;                               //(0-Não/1-Sim) Inteiro 01 135
  public $antigoPis = '';                             //String 11 136
  public $mudouChapa = 0;                             //(0-Não/1-Sim) Inteiro 01 137
  public $antigaChapa = '';                           //String 16 138
  public $mudouDataAdmissao = 0;                      //(0-Não/1-Sim) Inteiro 01 139
  public $antigaDataAdmissao = '';                    //Data 08 140
  public $antigoVinculo = '';                         //Char 01 141
  public $antigoTipoFuncionario = '';                 //Char 01 142
  public $antigoTipoAdmissao = '';                    //Char 01 143
  public $mudouDataOpcao = 0;                         //(0-Não/1-Sim) Inteiro 01 144
  public $antigaDataOpcao = '';                       //Data 08 145
  public $mudouSecao = 0;                             //(0-Não/1-Sim) Inteiro 01 146
  public $antigaSecao = '';                           //String 35 147
  public $mudouDataNascimento = 0;                    //(0-Não/1-Sim) Inteiro 01 148
  public $antigaDataNascimento = '';                  //Data 08 149
  public $faltaAlterarFgts = 0;                       //(0-Não/1-Sim) Inteiro 01 150
  public $deduzirIrrfMais65 = 0;                      //(0-Não/1-Sim) Inteiro 01 151
  public $pisParaFgts = '';                           //String 11 152
  public $codigoBancoFgts = '';                       //String 03 153
  public $descontaAvisoPrevio = 0;                    //(0-Não/1-Sim) Inteiro 01 154
  public $codigoFilial = 0;                           //Inteiro 07 155
  public $indiceInicioHorario = '';                   //H String 05 156
  public $usaSalarioComposto = 0;                     //(0-Não/1-Sim) Inteiro 01 157
  public $funcionarioMembroCipa = 0;                  //(0-Não/1-Sim) Inteiro 01 158
  public $operacaoBancaria = '';                      //String 05 159
  public $numeroVezesParaDescontoEmprestimoFerias = 0; //Inteiro 02 160
  public $dataInicioParaDescontoEmprestimoFerias = ''; //Data 08 161
  public $grupoSalarial = '';                         //String 10 162
  public $funcionarioAtual = 1;                       // (0-Não/1-Sim) Atenção: Este campo deve ser preenchido com 1 nos casos em que o funcionário tenha apenas um vínculo (registro) a er importado na mesma coligada. Caso exista mais de um vínculo, o critério de preenchimento do campo deve ser o seguinte : 1 para o vínculo com data de admissão mais recente (seja este ativo ou já demitido) 0 para os demais vínculos Inteiro 1 163
  public $previsaoDisponibilidade = 0;                //Atenção: Este campo deverá ficar em branco pois o mesmo não é mais utilizado Data 8 164
  public $codigoOcorrencia = 0;                       //Inteiro 2 165
  public $codigoCategoria = 0;                        //Inteiro 2 166
  public $classeContribuicaoParaInss = 0;             //Inteiro 8 167
  public $codigoEquipeFuncionario = '';               //String 4 168
  public $funcionarioTemStatusSupervisor = 0;         //(0-Não/1-Sim) Inteiro 1 169
  public $integracaoContabil = '';                    //String 22 170
  public $integracaoGerencial = '';                   //String 22 171
  public $usaControleSaldoVerbas = 0;                 //(0-Não/1-Sim) Inteiro 1 172
  public $codigoContribuinteIndividual = '';          //String 11 173
  public $mudouCodigoContribuinteIndividual = 0;      //(0-Não/1-Sim) Inteiro 01 174
  public $antigoCodigoContribuinteIndividual = 0;     //Inteiro 11 175
  public $periodoRescisao = 0;                        //Inteiro 2 176
  public $corRaca = 0;                                //( 0 Indígena - 2 Branca - 4 Preta - 6 Amarela - 8 Parda) Inteiro 1 177
  public $flagDeficienteFisico = 0;                   //Inteiro 1 178
  public $fgtsMesAnteriorSeraRecolhidoNaGrfc = 0;     //(0-Não/1-Sim) Inteiro 1 179
  public $codigoNivelTabelaSalarial = '';             //String 10 180
  public $numeroDiasFeriasParaJornadaReduzida = 0;    //Inteiro 02 181
  public $temAlvaraJudicialFuncionarioMenor16 = 0;    //(1-Sim/2-Não) String 01 182
  public $situacaoInss = 0;                           //Inteiro 01 183
  public $dataAposentadoria = '';                     //Data 08 184
  public $querAdiantamentoFerias = 0;                 //(0-Não/1-Sim) Inteiro 01 185
  public $dataProximoPeriodoAquisitivoFerias = '';    //Data 08 186
  public $coligadaFornecedor = 0;                     //Inteiro 05 187
  public $codigoFornecedor = '';                      //String 25 188
  public $deficienteAuditivo = 0;                     //Inteiro 1 189
  public $deficienteFala = 0;                         //Inteiro 1 190
  public $deficienteMental = 0;                       //Inteiro 1 191
  public $deficienteVisual = 0;                       //Inteiro 1 192
  public $localidade = '';                            //(implementação futura) String 40 193
  public $codigoMunicipio = '';                       //(implementação futura) String 20 194
  public $posicaoAbono = 0;                           //(0-Não/1-Sim) Inteiro 2 195
  public $numeroDiasFeriasCorridos = 0;               //Inteiro 2 196
  public $paisOrigem = '';                            //String 20 197
  public $fumante = 0;                                //(0-Não/1-Sim) Inteiro 2 198
  public $numeroPassaporte = '';                      //String 15 199
  public $telefone3 = '';                             //String 15 200
  public $dataEmissaoPassaporte = '';                 //Data 8 201
  public $dataValidadePassaporte = '';                //Data 8 202
  public $tipoAposentadoria = 0;                      //Inteiro 1 203
  public $reposicaoVaga = '';                         //(N-Não/S-Sim) String 1 204
  public $saldoFgtsReal = 0;                          //Real 15 205
  public $brPdh = 0;                                  //Inteiro 5 206

  public function montar() {

    $linha = substr(str_pad($this->chapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->nome, 120, ' ', STR_PAD_RIGHT), 0, 120) . ';';
    $linha .= substr(str_pad($this->apelido, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->dataNascimento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->estadoCivil, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->sexo, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->nacionalidade, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->grauInstrucao, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->rua, 30, ' ', STR_PAD_RIGHT), 0, 30) . ';';
    $linha .= substr(str_pad($this->numero, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->complemento, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->bairro, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->estado, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->cidade, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->cep, 9, ' ', STR_PAD_RIGHT), 0, 9) . ';';
    $linha .= substr(str_pad($this->nomePais, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->registroProfissional, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->cpf, 12, ' ', STR_PAD_RIGHT), 0, 12) . ';';
    $linha .= substr(str_pad($this->telefone1, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->telefone2, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->numeroCarteiraIdentidade, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->ufCarteiraIdentidade, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->orgaoEmissorCarteiraIdentidade, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->dataEmissaoCarteiraIdentidade, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataVencimentoCarteiraIdentidade, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->tituloEleitor, 14, ' ', STR_PAD_RIGHT), 0, 14) . ';';
    $linha .= substr(str_pad($this->zonaVotacao, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->secaoVotacao, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->numeroCarteiraTrabalho, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->serieCarteiraTrabalho, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->ufCarteiraTrabalho, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->dataEmissaoCarteiraTrabalho, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataVencimentoCarteiraTrabalho, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->nitTipoCarteiraTrabalho, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->numeroCarteiraMotorista, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->tipoCarteiraHabilitacao, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->dataVencimentoHabilitacao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroCertificadoReservista, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->categoriaMilitar, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->naturalidade, 32, ' ', STR_PAD_RIGHT), 0, 32) . ';';
    $linha .= substr(str_pad($this->estadoNatal, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->dataChegadaBrasil, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->cartaModelo19, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->conjugeBrasil, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->naturalizado, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->filhosBrasil, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->numeroFilhosBrasil, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroRegistroGeral, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->numeroDecreto, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->tipoVisto, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->email, 60, ' ', STR_PAD_RIGHT), 0, 60) . ';';
    $linha .= substr(str_pad($this->senha, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroFichaRegistro, 10, 0, STR_PAD_LEFT), 0, 10) . ';';
    $linha .= substr(str_pad($this->codigoRecebimento, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoSituacao, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoTipoFuncionario, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoSecao, 35, ' ', STR_PAD_RIGHT), 0, 35) . ';';
    $linha .= substr(str_pad($this->codigoFuncao, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->codigoSindicato, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->jornada, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->codigoHorario, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->numeroDependentesIrrf, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroDependentesSalarioFamilia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->dataBase, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->salario, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->situacaoFgts, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->dataOpcaoFgts, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroContaFgts, 11, ' ', STR_PAD_RIGHT), 0, 11) . ';';
    $linha .= substr(str_pad($this->saldoFgtsBanco, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->dataSaldoFgts, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->pisPasep, 11, ' ', STR_PAD_RIGHT), 0, 11) . ';';
    $linha .= substr(str_pad($this->dataCadastroPis, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoBancoPis, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->contribuicaoSindical, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->aposentado, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->mais65Anos, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->ajudaCusto, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->percentualAdiantamento, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->arredondamento, 8, 0, STR_PAD_LEFT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataAdmissao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->tipoAdmissao, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->dataTransferencia, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->motivoAdmissao, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->contratoTemPrazoDeterminado, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->fimPrazoContrato, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataDemissao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->tipoDemissao, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->motivoDemissao, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->dataDesligamento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataUltimaMovimentacao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataPagamentoRescisao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoSaqueFgts, 2, ' ', STR_PAD_RIGHT), 0, 2) . ';';
    $linha .= substr(str_pad($this->temAvisoPrevio, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->dataAvisoPrevio, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroDiasAviso, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->dataVencimentoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->inicioProgramacaoFerias1, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->fimProgramacaoFerias1, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->querAbono, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->querPrimeiraParcela13, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->numeroDiasAdiantamentoFerias, 3, 0, STR_PAD_LEFT), 0, 3) . ';';
    $linha .= substr(str_pad($this->eventoAdiantamentoFerias, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->feriasColetivasGlobais, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->numeroDiasFerias, 7, 0, STR_PAD_LEFT), 0, 7) . ';';
    $linha .= substr(str_pad($this->numeroDiasAbono, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->saldoFerias, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->saldoFeriasAnterior, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->saldoFeriasAuxiliar, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->observacaoFerias, 80, ' ', STR_PAD_RIGHT), 0, 80) . ';';
    $linha .= substr(str_pad($this->dataPagamentoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataAvisoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->numeroDiasLicencaRemunerada1, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->numeroDiasLicencaRemunerada2, 6, 0, STR_PAD_LEFT), 0, 6) . ';';
    $linha .= substr(str_pad($this->dataInicioLicenca, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->mediaSalarioMaternidade, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->situacaoRais, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoBancoPagamento, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->codigoAgenciaPagamento, 6, ' ', STR_PAD_RIGHT), 0, 6) . ';';
    $linha .= substr(str_pad($this->contaPagamento, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->membroSindical, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->vinculoRais, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->usaValeTransporte, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->diasUteisMes, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->diasUteisMeioExpediente, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->diasUteisProximoMes, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->diasUteisProximoMesMeioexpediente, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->diasUteisRestantes, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->diasUteisRestantesMeio, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->mudouEndereco, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->mudouCarteiraTrabalho, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigaCarteiraTrabalho, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->antigaSerieCarteiraTrabalho, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->mudouNome, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigoNome, 45, ' ', STR_PAD_RIGHT), 0, 45) . ';';
    $linha .= substr(str_pad($this->mudouPis, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigoPis, 11, ' ', STR_PAD_RIGHT), 0, 11) . ';';
    $linha .= substr(str_pad($this->mudouChapa, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigaChapa, 16, ' ', STR_PAD_RIGHT), 0, 16) . ';';
    $linha .= substr(str_pad($this->mudouDataAdmissao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigaDataAdmissao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->antigoVinculo, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigoTipoFuncionario, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigoTipoAdmissao, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->mudouDataOpcao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigaDataOpcao, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->mudouSecao, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigaSecao, 35, ' ', STR_PAD_RIGHT), 0, 35) . ';';
    $linha .= substr(str_pad($this->mudouDataNascimento, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigaDataNascimento, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->faltaAlterarFgts, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->deduzirIrrfMais65, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->pisParaFgts, 11, ' ', STR_PAD_RIGHT), 0, 11) . ';';
    $linha .= substr(str_pad($this->codigoBancoFgts, 3, ' ', STR_PAD_RIGHT), 0, 3) . ';';
    $linha .= substr(str_pad($this->descontaAvisoPrevio, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoFilial, 7, 0, STR_PAD_LEFT), 0, 7) . ';';
    $linha .= substr(str_pad($this->indiceInicioHorario, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->usaSalarioComposto, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->funcionarioMembroCipa, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->operacaoBancaria, 5, ' ', STR_PAD_RIGHT), 0, 5) . ';';
    $linha .= substr(str_pad($this->numeroVezesParaDescontoEmprestimoFerias, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->dataInicioParaDescontoEmprestimoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->grupoSalarial, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->funcionarioAtual, 1, 1, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->previsaoDisponibilidade, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoOcorrencia, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->codigoCategoria, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->classeContribuicaoParaInss, 8, 0, STR_PAD_LEFT), 0, 8) . ';';
    $linha .= substr(str_pad($this->codigoEquipeFuncionario, 4, ' ', STR_PAD_RIGHT), 0, 4) . ';';
    $linha .= substr(str_pad($this->funcionarioTemStatusSupervisor, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->integracaoContabil, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->integracaoGerencial, 22, ' ', STR_PAD_RIGHT), 0, 22) . ';';
    $linha .= substr(str_pad($this->usaControleSaldoVerbas, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoContribuinteIndividual, 11, ' ', STR_PAD_RIGHT), 0, 11) . ';';
    $linha .= substr(str_pad($this->mudouCodigoContribuinteIndividual, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->antigoCodigoContribuinteIndividual, 11, ' ', STR_PAD_RIGHT), 0, 11) . ';';
    $linha .= substr(str_pad($this->periodoRescisao, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->corRaca, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->flagDeficienteFisico, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->fgtsMesAnteriorSeraRecolhidoNaGrfc, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->codigoNivelTabelaSalarial, 10, ' ', STR_PAD_RIGHT), 0, 10) . ';';
    $linha .= substr(str_pad($this->numeroDiasFeriasParaJornadaReduzida, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->temAlvaraJudicialFuncionarioMenor16, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->situacaoInss, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->dataAposentadoria, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->querAdiantamentoFerias, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->dataProximoPeriodoAquisitivoFerias, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->coligadaFornecedor, 5, 0, STR_PAD_LEFT), 0, 5) . ';';
    $linha .= substr(str_pad($this->codigoFornecedor, 25, ' ', STR_PAD_RIGHT), 0, 25) . ';';
    $linha .= substr(str_pad($this->deficienteAuditivo, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->deficienteFala, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->deficienteMental, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->deficienteVisual, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->localidade, 40, ' ', STR_PAD_RIGHT), 0, 40) . ';';
    $linha .= substr(str_pad($this->codigoMunicipio, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->posicaoAbono, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroDiasFeriasCorridos, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->paisOrigem, 20, ' ', STR_PAD_RIGHT), 0, 20) . ';';
    $linha .= substr(str_pad($this->fumante, 2, 0, STR_PAD_LEFT), 0, 2) . ';';
    $linha .= substr(str_pad($this->numeroPassaporte, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->telefone3, 15, ' ', STR_PAD_RIGHT), 0, 15) . ';';
    $linha .= substr(str_pad($this->dataEmissaoPassaporte, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->dataValidadePassaporte, 8, ' ', STR_PAD_RIGHT), 0, 8) . ';';
    $linha .= substr(str_pad($this->tipoAposentadoria, 1, 0, STR_PAD_LEFT), 0, 1) . ';';
    $linha .= substr(str_pad($this->reposicaoVaga, 1, ' ', STR_PAD_RIGHT), 0, 1) . ';';
    $linha .= substr(str_pad($this->saldoFgtsReal, 15, 0, STR_PAD_LEFT), 0, 15) . ';';
    $linha .= substr(str_pad($this->brPdh, 5, 0, STR_PAD_LEFT), 0, 5) . ';';

    return $linha;
  }

}
