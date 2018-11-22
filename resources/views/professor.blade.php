@extends('template.app')

@section('title')
Professor
@endsection

@section('nav-menu')
<li class=""><a href="index.html">Home</a></li>
<li><a id="disciplinas" href="{{url('/listarDisiciplinas')}}">Disciplinas Ministradas</a></li>
<li><a id="plano" href="{{url('/planoEnsino')}}">Definir Plano de Ensino</a></li>
<li><a  href="{{url('/professor')}}">Gerenciar Turma</a></li>
@endsection


@section('conteudo-principal')

<!-- <div class="container" id="areagerenciarTurma">  
   <h4>Selecione a turma:</h4> 
   <div class="list-group">
     @foreach($turma as $item)
       <a onclick="mostrarAvaliacao();"  href="#" class="list-group-item list-group-item-action">
           Turma {{ $item->id  }}
       </a>
     @endforeach      
   </div>   
</div> -->


<div class="container" id="areaAvaliacao">
   @if (Session::has('sucesso'))
    <div class="alert alert-info">{{Session::get('sucesso')}}</div>
   @endif
  
   <form class="form form-horizontal" role="form" autocomplete="off" id="formLogin" novalidate="" method="GET" action="cadastroNota">
     <div class="form-row align-items-center">
    
        <div class="col-sm-4 my-1">
           <div class="form-group">
            <label for="exampleFormControlSelect1">Selecione a Turma:</label>
             <select class="form-control" id="exampleFormControlSelect1" name="turmaselecionada">
              @foreach($turma as $item)
               <option value="{{$item->id}}">Turma {{ $item->id  }}</option>
              @endforeach 
             </select>
           </div>
         </div>
      </div>
     @for($i=1; $i<=$av_regular->qtd_provas_min; $i++)
     <div id="elements_form" class="form-row align-items-center">          
         {{ csrf_field()  }}
 
            <div class="col-sm-4 my-1"> 
                <div class="form-group">
           <!--     <a href="" class="float-right">New user?</a>  -->
                   <label for="campo_email">Nota</label>
                    <input type="text" class="form-control form-control-md" name="campo_nota{{$i}}" id="campo_nota{{$i}}" required="">
                </div>
              </div>

              <div class="col-sm-4 my-1">  
                 <div class="form-group"> 
                    <label for="campo_peso">Peso</label>
                    <input type="text" class="form-control form-control-md" name="campo_peso{{$i}}" id="campo_peso{{$i}}" required="">   
                 </div>
              </div>   

          <!--    @if($i == $av_regular->qtd_provas_min)
               <div class="col-sm-2 my-1">  
                   <div class="form-group py-3">
                      <button  class="btn btn-success float-left" id="btnLogin{{$i}}">
                         <div class="icon-container">                       
                           <span class="ti-plus"></span>                            
                         </div>
                      </button>   
                   </div>
                </div> 
            @endif                  
            -->                         
        </div> 
         <input type="hidden" value="{{ $av_regular->qtd_provas_min }}" name="qtd_provas_min">
        
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
  var qtd_min = '{{$av_regular->qtd_provas_min}}';
  var qtd_max = '{{$av_regular->qtd_provas_max}}'; 
  var qtd_atual = qtd_min;

   $( document ).ready(function() {
      // var qtd_min = '{{$av_regular->qtd_provas_min}}';
      // var qtd_max = '{{$av_regular->qtd_provas_max}}'; 
      // var qtd_restante = qtd_max - qtd_min;
      // var qtd_atual = qtd_min;

       /*ADICIONAR LINHAS NOVAS 
         EXCLUIR LINHAS gerenciarTurma
       */
       
   /*    $('#areaPlano').hide();
       $('#areaVerDisciplina').hide();
       $('#areaAvaliacao').hide();       
       $('#areagerenciarTurma').hide();
   });

  /*   $('#disciplinas').on('click', function(e) {
     $('#areaPlano').hide();  
     $('#areagerenciarTurma').hide();
     $('#areaVerDisciplina').show();
     e.preventDefault();
  }); 

   $('#plano').on('click', function(e) {
     $('#areaPlano').show();  
     $('#areagerenciarTurma').hide();
     $('#areaVerDisciplina').hide();
     e.preventDefault();
   });

    $('#avaliacao').on('click', function(e) {
       $('#areaPlano').hide();  
       $('#areaVerDisciplina').hide();
       $('#areagerenciarTurma').hide();
       $('#areaAvaliacao').show();
       e.preventDefault();
   });   

   $('#gerenciarTurma').on('click', function(e) {
      
     $('#areagerenciarTurma').show();
     $('#areaPlano').hide(); 
     $('#areaVerDisciplina').hide();
     $('#areaAvaliacao').hide();
     e.preventDefault();
   });   */

 
 /* function mostrarAvaliacao() {       
     // turmaAtual++;
     // document.getElementById('#elements_form').appendChild('<input type="hidden" value="turmaAtual" name="campo_turma">'); 
      $('#areaAvaliacao').show();
      $('#areagerenciarTurma').hide();
      $('#areaPlano').hide(); 
      $('#areaVerDisciplina').hide();
   }*/


 
  function adicionar(divName) {

    if(qtd_atual <= qtd_max) {  
       //Estilo Bootstrap Form label
       var newdiv1 = document.createElement("div");
       newdiv1.setAttribute('class', 'col-sm-4 my-1');
       var newdiv2 = document.createElement("div");
       newdiv2.setAttribute('class', 'form-group');
    
       var divlabel = document.createElement("label");
       divlabel.setAttribute('for', 'campo_email').innerHTML = "Nota";
    
       newdiv1.innerHTML = newdiv2;
       newdiv2.innerHTML = divlabel; 
       divlabel.innerHTML = "<input type='text' class='form-control form-control-md' name='campo_nota{{$i}}' id='campo_nota{{$i}}' required=''>";
    
       document.getElementById(divName).appendChild(newdiv1);

       var newdiv3 = document.createElement("div");
       newdiv3.setAttribute('class', 'col-sm-4 my-1');    
       var newdiv4 = document.createElement("div");
       newdiv4.setAttribute('class', 'form-group');

       var divlabelP = document.createElement("label");
       divlabelP.setAttribute('for', 'campo_peso').innerHTML = "Peso";
 
       newdiv3.innerHTML = newdiv4;
       newdiv4.innerHTML = divlabelP;
       divlabelP.innerHTML = "<input type='text' class='form-control form-control-md' name='campo_peso{{$i}}' id='campo_peso{{$i}}' required=''>";

       document.getElementById(divName).appendChild(newdiv3);  

       qtd_atual++;
   }

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

$("#add").on("click", function() {
  
 
 
  form.append('<input type="text" name="AdditionalCitizenship[' + x + '][CountryOfResidency]">');
  form.append('<input type="text" name="AdditionalCitizenship[' + x + '][TaxIdentificationNumber]">');
});
</script>       
@endpush
