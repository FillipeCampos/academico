@extends('template.app')

@section('title')
Professor
@endsection

@section('nav-menu')
<li class=""><a href="index.html">Home</a></li>
<li><a id="disciplinas" href="#">Disciplinas Ministradas</a></li>
<li><a id="plano" href="#">Definir Plano de Ensino</a></li>
<li><a id="avaliacao" href="#">Cadastrar Avaliação</a></li>
@endsection


@section('conteudo-principal')
<div id="areaVerDisciplina" class="card card-outline-secondary" style="width: 18rem;margin-left:510px;margin-top:30px;">
    <div class="card-header">
        <h3 class="mb-0">Lista Disciplina</h3>
    </div>
    <div class="card-body">


    </div>
</div>

<div id="areaPlano">
   <h3>Área Plano de Ensino</h3> 
</div>




<div class="container" id="areaAvaliacao">




   <form class="form form-horizontal" role="form" autocomplete="off" id="formLogin" novalidate="" method="GET" action="cadastrar">
    @for($i=1; $i<=$av_regular->qtd_provas_min; $i++)
     <div class="form-row align-items-center">          
         {{ csrf_field()  }}
           
            <div class="col-sm-4 my-1"> 
                <div class="form-group">
           <!--     <a href="" class="float-right">New user?</a>  -->
                   <label for="campo_email">Nota</label>
                    <input type="text" class="form-control form-control-md" name="campo_nota" id="campo_nota" required="">
                </div>
              </div>

              <div class="col-sm-4 my-1">  
                 <div class="form-group"> 
                    <label for="campo_email">Peso</label>
                    <input type="text" class="form-control form-control-md" name="campo_peso" id="campo_peso" required="">   
                 </div>
              </div>   
             
             @if($i == $av_regular->qtd_provas_min)
                <div class="col-sm-2 my-1">  
                   <div class="form-group py-3">
                      <button type="submit" class="btn btn-success float-left" id="btnLogin{{$i}}">
                         <div class="icon-container">                       
                           <span class="ti-plus"></span>                            
                         </div>
                      </button>   
                   </div>
                </div> 
            @endif                                
        </div> 
        @endfor   
        <div class="form-row align-items-right"> 
          <div class="col-sm-8 my-1">   
            <button type="submit" class="btn btn-info float-right">Salvar</button> 
          </div>    
        </div>          
      </form>       
</div>
@endsection


@push('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
   $( document ).ready(function() {
       var qtd_min = '{{$av_regular->qtd_provas_min}}';
       var qtd_max = '{{$av_regular->qtd_provas_max}}' 
       var qtd_atual = qtd_min;

       /*ADICIONAR LINHAS NOVAS 
         EXCLUIR LINHAS
       */
       
       $('#areaPlano').hide();
       $('#areaVerDisciplina').hide();
       $('#areaAvaliacao').hide();       
   });

   $('#disciplinas').on('click', function(e) {
     $('#areaPlano').hide();  
     $('#areaVerDisciplina').show();
     e.preventDefault();
  });

   $('#plano').on('click', function(e) {
     $('#areaPlano').show();  
     $('#areaVerDisciplina').hide();
     e.preventDefault();
   });

    $('#avaliacao').on('click', function(e) {
       $('#areaPlano').hide();  
       $('#areaVerDisciplina').hide();
       $('#areaAvaliacao').show();
       e.preventDefault();
   });    

 
 function adicionar() {
       
 
 }

 function salvar() {
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
  function excluir() {
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
</script>       
@endpush
