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
    <div class="card col-sm-12 my-1">
      <div class="card-header">
          Disciplinas
      </div>
      <div class="card-body">
      
      @if (count($disciplinas) > 0)
       <div class="row">
        @foreach ($disciplinas as $disciplina)
          <div class="col-sm-4 my-2">
            <div class="card border-primary">
              <div class="card-body">
                <h4 class="card-title">{{$disciplina->nome}}</h4>
                <div class="row">
                  <div class="col-sm-5">
                      <button type="button" class="btn btn-sm btn-primary">Adicionar Turma</button>
                  </div>
                  <div class="col-sm-5 ml-2">
                    <a href="{{ route('delDisciplina',$disciplina->id) }}"><button type="button" class="btn btn-sm btn-danger">Remover Disciplina</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      @else
        <div class="alert alert-primary" role="alert" style="text-align: center;">
          Nenhuma Disciplina Cadastrada!
        </div>
      @endif
        <div class="row justify-content-end">
            <button type="button" class="btn-sm btn-success mt-3" data-toggle="modal" data-target="#modalAddDisciplina">Adicionar Disciplina</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Configurações-->
  <div class="row">
    <div class="card col-sm-12 my-1">
      <div class="card-header">
          Configurações
      </div>
      <div class="card-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-aval-reg-tab" data-toggle="tab" href="#nav-aval-reg" role="tab" aria-controls="nav-aval-reg" aria-selected="true">Avaliação Regular</a>
            <a class="nav-item nav-link" id="nav-aval-fin-tab" data-toggle="tab" href="#nav-aval-fin" role="tab" aria-controls="nav-aval-fin" aria-selected="false">Avaliação Final</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-aval-reg" role="tabpanel" aria-labelledby="nav-aval-reg-tab">
              <form action="{{route('saveAvalRegularConf')}}" method="POST">
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
          <div class="tab-pane fade" id="nav-aval-fin" role="tabpanel" aria-labelledby="nav-aval-fin-tab">
              <form action="{{route('saveAvalFinalConf')}}" method="POST">
                  {{ csrf_field()  }}
                  <div class="row">
                      <div class="form-group col-sm-3">
                            <label for="pesoRegular">Peso Avaliação Regular</label>
                      <input type="text" class="form-control" name="pesoRegular" id="pesoRegular" value="{{isset($av_final) ? $av_final->peso_nota_regular : 0}}">
                      </div>
                      <div class="form-group col-sm-3">
                        <label for="pesoFinal">Peso Nota Final</label>
                        <input type="text" class="form-control" name="pesoFinal" id="pesoFinal" value="{{isset($av_final) ? $av_final->peso_nota_final : 0}}">
                      </div>
                      <div class="col align-self-end mb-3">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                      </div>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--Modal Add Disciplina-->
  <!-- Modal -->
  <div class="modal fade" id="modalAddDisciplina" tabindex="-1" role="dialog" aria-labelledby="modalAddDisciplinaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAddDisciplinaTitle">Adicionar Disciplina</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-group" action="{{route('addDisciplina')}}" method="POST">
          <div class="modal-body">
              {{ csrf_field()  }}
              <label for="nomeDisciplina">Nome</label>
              <input name="nomeDisciplina" id="nomeDisciplina" type="text" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
      </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
    <!-- scripts personalizados-->
@endpush
