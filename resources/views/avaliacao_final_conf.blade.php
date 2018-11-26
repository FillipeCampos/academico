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