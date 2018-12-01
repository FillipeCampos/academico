<div class="tab-pane fade show active" id="nav-aval-reg" role="tabpanel" aria-labelledby="nav-aval-reg-tab">
              <form action="{{route('saveAvalRegularConfFixa')}}" method="POST">
                {{ csrf_field()  }}
                <div class="row">
                  <div class="form-group col-sm-4">
                    <label for="qtdMinAvaliacao">Quantidade de Avaliações</label>
                    <input type="text" class="form-control" name="qtdMinAvaliacao" id="qtdMinAvaliacao" value="{{isset($av_regular) ? $av_regular->qtd_provas_min : 0}}">
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