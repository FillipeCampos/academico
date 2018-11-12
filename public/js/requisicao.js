$(function() {

    $( document ).ready(function() {
       

    });


 /*   $('#formEmpresa').on('submit', function(e) {
        e.preventDefault(); 
        var campoNomeEmpresa = $('#campoNomeEmpresa').val();
        var entidade = $('#entidadeE').val();

        $.ajax({
            type: "GET",
            url: "public/empresa/adicionar/register",
            data: {name:campoNomeEmpresa, entidade:entidade},
            success: function( msg ) {
                alert( msg.data );
            }
        });
    }); 

    $('#formAdm').on('submit', function(e) {
        e.preventDefault(); 
        var estado = $('#campoEstadoSaudeAdm').val();
        var historico = $('#campoHistorico').val();
        var dataAdm = $('#dataAdmissaoAdm').val();
        var entidade = $('#entidadeS').val();
    
        $.ajax({
            type: "GET",
            url: "public/empresa/adicionar/register",
            data: {estadoSaudeA:estado, entidade:entidade, historicoA:historico, dataA:dataAdm},
            success: function( msg ) {
                alert( msg.data );
            }
        });
    }); 

    $('#formOcp').on('submit', function(e) {
        e.preventDefault(); 
        var campoNomeRisco = $('#campoNomeRisco').val();
        var entidade = $('#entidadeOcp').val();

        $.ajax({
            type: "GET",
            url: "public/empresa/adicionar/register",
            data: {name:campoNomeRisco, entidade:entidade},
            success: function( msg ) {
                alert( msg.data );
            }
        });
    }); 

    $('#formU').on('submit', function(e) {
        e.preventDefault(); 
        var nomeFuncionario = $('#campoNomeFuncionario').val();
        var ocupacao = $('#campoOcupacao').val();
        var entidade = $('#entidadeU').val();

        $.ajax({
            type: "GET",
            url: "public/empresa/adicionar/register",
            data: {name:nomeFuncionario, entidade:entidade, ocupacao:ocupacao},
            success: function( msg ) {
                alert( msg.data );
            }
        });
    }); 

    
    $('#formMedico').on('submit', function(e) {
        e.preventDefault(); 
        var campoNomeMedico = $('#campoNomeMedico').val(); 
        var especialidade = $('#campoEspecialidadeMedico').val();
        var entidade = $('#entidadeM').val();

        $.ajax({
            type: "GET",
            url: "public/empresa/adicionar/register",
            data: {name:campoNomeMedico, entidade:entidade, especialidade:especialidade},
            success: function( msg ) {
                alert( msg.data );
            }
        });
    }); 




    $('#formPesquisa').on('submit', function(e) {
        e.preventDefault(); 
        var codFuncionario = $('#pesquisarFuncionario').val();
        
        $.ajax({
            type: "GET",
            url: "public/empresa/pesquisar/register",
            data: {idFuncionario:codFuncionario},
            success: function( msg ) {
                //alert( msg.data );
              if(msg.status == 'sucesso') {                  
                $('#listarInfo').append('<h5>'+'Nome: '+ msg.nome_funcionario+'</h5>'+
                                        '<h5>' + 'Empresa: ' + msg.empresa_funcionario + '</h5>' 
                                );

                $('#tabPesquisa').show();
                $('#areaPesquisa').show();

                listarExameAdmissional(msg.id_func); 

                if(msg.id_ex_dm == 'vazio') adicionarExameDemissional(msg.id_func);
                else listarDemissional(msg.id_func);

                //id_ex_rt
                if(msg.id_ex_rt == 'vazio') adicionarExameRetorno(msg.id_func);
                else listarRetorno(msg.id_func); 

                if(msg.id_ex_md == 'vazio') adicionarMudancaFuncao(msg.id_func);
                else listarMudanca(msg.id_func); 

                if(msg.id_ex_per == 'vazio') adicionarExamePeriodico(msg.id_func);
                else listarPeriodico(msg.id_func); 

                listarMedico(msg.id_func);

              }                  
            }
        });
    }); 

    function listarExameAdmissional(id) {
        //do stuff    
        $.ajax({
            type: "GET",
            url: "public/empresa/listarAdm/register",
            data: {idFuncionario:id},
            success: function( msg ) {                        
                $("#eu").append('<h5>'+'Historico: '+ msg.historico+'</h5>'+
                                        '<h5>'+'Estado de Saude: '+ msg.estadoSaude + '</h5>' +
                                        '<h5>' + 'Data admissao: ' + msg.dataExame + '</h5>' 
                                );   
            }
        }); 
    }

    function listarDemissional(id) {
        $.ajax({
            type: "GET",
            url: "public/empresa/listardm/register",
            data: {idFuncionario:id},
            success: function( msg ) {                        
                $("#listardemissional").append('<h5>'+'Condição: '+ msg.condicao+'</h5>'+                                   
                                        '<h5>' + 'Data Exame Demissional: ' + msg.dataExame + '</h5>' 
                                );   
            }
        }); 
    }

    function listarRetorno(id) {
        $.ajax({
            type: "GET",
            url: "public/empresa/listarrt/register",
            data: {idFuncionario:id},
            success: function( msg ) {                        
                $("#eud").append('<h5>'+'Condição: '+ msg.condicao+'</h5>'+                                   
                                        '<h5>' + 'Status: ' + msg.status + '</h5>' 
                                );   
            }
        }); 
    }

    function listarMudanca(id) {
        $.ajax({
            type: "GET",
            url: "public/empresa/listarmud/register",
            data: {idFuncionario:id},
            success: function( msg ) {                        
                $("#euj").append('<h5>'+'Status: '+ msg.status+'</h5>'+  '\n' +                                 
                                        '<h5>' + 'Exame Complementar: ' + msg.exame + '</h5>' 
                                );   
            }
        }); 
    }

    function listarPeriodico(id) {
        $.ajax({
            type: "GET",
            url: "public/empresa/listarper/register",
            data: {idFuncionario:id},
            success: function( msg ) {                        
                $("#euk").append('<h5>'+'Período: '+ msg.periodo+'</h5>'+  '\n' +                                 
                                        '<h5>' + 'Status do paciente: ' + msg.status + '</h5>' 
                                );   
            }
        }); 
    }

    function listarMedico(id) {
        //do stuff    
        $.ajax({
            type: "GET",
            url: "public/empresa/listarMd/register",
            data: {idFuncionario:id},
            success: function( msg ) {        

                $("#mdd").append('<h5>' + 'Médico(s):' + '</h5>' + '</br>');
                for(var x=0; x<msg.medicos.length;x++) {
                    $("#mdd").append('<h5>' + msg.medicos[x].nome + '</h5>');
                } 

            }
        }); 
    } 




    function adicionarExameDemissional(id)
    {
        $('#mostrarForm').show();  

        $('#formD').on('submit', function(e) {
            e.preventDefault(); 
            var condicaosaude = $('#campocondDm').val();
            var datasaidaDm = $('#datasaidaDm').val();
            var entidade = $('#entidadeDemi').val();
            var tipo = "atualizarDemi";
    
            $.ajax({
                type: "GET",
                url: "public/empresa/adicionar/register",
                data: {condicao:condicaosaude, dataSaida:datasaidaDm, entidade:entidade},
                success: function( msg ) {
                    atualizarFunc(id,tipo); 
                }
            });
        }); 

    }

    function adicionarExameRetorno(id)
    {
        $('#mostrarFormR').show();  

        $('#formRet').on('submit', function(e) {
            e.preventDefault(); 
            var condicaosaude = $('#campocondRt').val();
            var statusInss = $('#statusInss').val();
            var entidade = $('#entidadeRet').val();
            var tipo = "atualizarRet";
    
            $.ajax({
                type: "GET",
                url: "public/empresa/adicionar/register",
                data: {condicao:condicaosaude, status:statusInss, entidade:entidade},
                success: function( msg ) {
                    atualizarFunc(id,tipo); 
                }
            });
        }); 

     }

     function adicionarMudancaFuncao(id)
     {
         $('#mostrarFormMud').show();  
 
         $('#formMud').on('submit', function(e) {
             e.preventDefault(); 
             var statusPaciente = $('#campostatusMud').val();
             var exameCompl = $('#exameCompl').val();
             var entidade = $('#entidadeMud').val();
             var tipo = "atualizarMud";
     
             $.ajax({
                 type: "GET",
                 url: "public/empresa/adicionar/register",
                 data: {status:statusPaciente, exameCompl:exameCompl, entidade:entidade},
                 success: function( msg ) {
                     atualizarFunc(id,tipo); 
                 }
             });
         }); 
 
     }

     function adicionarExamePeriodico(id)
     {
         $('#mostrarFormPer').show();  
 
         $('#formPer').on('submit', function(e) {
             e.preventDefault(); 
             var periodo = $('#campoperiodo').val();
             var statusPaciente = $('#statusPer').val();
             var entidade = $('#entidadePer').val();
             var tipo = "atualizarPer";
     
             $.ajax({
                 type: "GET",
                 url: "public/empresa/adicionar/register",
                 data: {periodo:periodo, status:statusPaciente, entidade:entidade},
                 success: function( msg ) {
                     atualizarFunc(id,tipo); 
                 }
             });
         }); 
 
     }

     $('#link').on('click', function(e) {
        
        $.ajax({
          type: "GET",
          url: "public/pacientes/relatorio/register",
          success: function( msg ) {
            $("#linha1").append('<td>'+ msg.tendinite+ '</td>');  
            $("#linha2").append('<td>'+ msg.febre+ '</td>');         
            $("#linha3").append('<td>'+ msg.gripe + '</td>'); 
            $("#linha4").append('<td>'+ msg.toc+ '</td>'); 
            $("#linha5").append('<td>'+ msg.cabeca + '</td>');
            $("#linha6").append('<td>'+ msg.pe + '</td>');
            $("#linha7").append('<td>'+ msg.queda + '</td>');
            $("#linha8").append('<td>'+ msg.unha + '</td>');
            $("#linha9").append('<td>'+ msg.desmaio + '</td>');     
            $("#linha10").append('<td>'+ msg.torcao + '</td>');         
        }

        });
    
    
    
    
       });
    


    function atualizarFunc(id,tipo) {
        //do stuff 
        //var tipo = tipo;   
        $.ajax({
            type: "GET",
            url: "public/empresa/atualizardm/register",
            data: {tipo:tipo, idFuncionario:id},
            success: function( msg ) {                        
                alert( msg.data );
            }
        }); 
    } */



});