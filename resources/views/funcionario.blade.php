@extends('template.app')

@section('titulo')
Funcionário
@endsection

@section('nav-menu')
<li class=""><a href="/">Home</a></li>
<li><a href="#">Manter Usuários</a></li>
<li><a href="#">Disciplinas</a></li>
<li><a href="#">Turmas</a></li>
<li><a href="#">Configurações</a></li>
@endsection

@section('conteudo-principal')
<!-- scripts personalizados-->
<div class="container">
  <div class="row">
    <div class="card col-sm-12">
      <div class="card-header">
          Configurações
      </div>
      <div class="card-body">
        <form action="/funcionario/configuracao/salvar" method="POST">
          {{ csrf_field()  }}
          <div class="row">
            <div class="form-group col-sm-4">
                  <label for="qtdMinAvaliacao">Quantidade Mínima de Avaliações</label>
            <input type="text" class="form-control" name="qtdMinAvaliacao" id="qtdMinAvaliacao" value="{{isset($av_regular) ? $av_regular->qtd_provas_min : 0}}">
            </div>
            <div class="form-group col-sm-4">
              <label for="qtdMaxAvaliacao">Quantidade Máxima de Avaliações</label>
              <input type="text" class="form-control" name="qtdMaxAvaliacao" id="qtdMaxAvaliacao" value="{{isset($av_regular) ? $av_regular->qtd_provas_max : 0}}">
            </div>
            <div class="form-group col-sm-4">
              Pode modificar os Pesos?
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="modificaPeso" id="modificaPeso1" value="1" {{isset($av_regular) ? (($av_regular->peso_modificavel==1) ? "checked" : "") : "checked"}}>
                  <label class="form-check-label" for="modificaPeso1">
                    Sim
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="modificaPeso" id="modificaPeso0" value="0" {{isset($av_regular) ? (($av_regular->peso_modificavel==0) ? "checked" : "") : ""}}>
                  <label class="form-check-label" for="modificaPeso0">
                    Não
                  </label>
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="align-self-end">
              <button type="submit" class="btn btn-primary">Alterar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <!-- scripts personalizados-->
@endpush
