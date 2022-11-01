@extends('app.layout')
@section('content')
<div class="modal fade" id="modal1_id" aria-hidden="true" aria-labelledby="aria_labely1" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="aria_labely1">Identifier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('add-risque')}}" method="POST">
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="titre">Risque</label>
                <input type="text" name="titre" id="" class="form-control" placeholder=""  required>
              </div>
              <div class="form-group mb-3">
                <label for="Présence">Présence</label>
              <select name="presence" id="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option value="oui">Oui</option>
                  <option value="non">Non</option>
              </select>
            </div>
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="" rows="5" class="form-control" aria-describedby="helpId" required></textarea>
                <small id="helpId" class="text-muted">Decrit le Risque</small>
              </div>
              <div class="form-group mb-3">
                <label for="Priorité">Priorité</label>
              <select name="priorite" id="" class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option value="normal">Normal</option>
                  <option value="danger">Danger</option>
              </select>
            </div>
            <div class="form-group mb-3">
                <label for="milieu">Milieu</label>
                <input type="text" name="milieu" id="" class="form-control" placeholder=""  required>
              </div>
              <div class="form-group mb-3">
                <label for="activite">Activite</label>
                <input type="text" name="activite" id="" class="form-control" placeholder=""  required>
              </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#modal2_id" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal2_id" aria-hidden="true" aria-labelledby="aria_labely" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="aria_labely">Mesurer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group mb-3">
                <label for="customRange3" class="form-label">Durée d'exploitation de l'operateur au risque (default 1)</label>
                <input type="range" name="duree" class="form-range" min="1" max="4" step="1" id="customRange3">
            </div>
            <div class="form-group mb-3">
                <label for="customRange3" class="form-label">Fréquence (default 1)</label>
                <input type="range" name="frequence" class="form-range" min="1" max="4" step="1" id="customRange3" aria-describedby="helpId">
                {{-- <small id="helpId" class="text-muted">

                </small> --}}
            </div>
            <div class="form-group mb-3">
                <label for="customRange3" class="form-label">Gravité (default 1)</label>
                <input type="range" name="gravite" class="form-range" min="1" max="5" step="1" id="customRange3">
            </div>
            <div class="form-group mb-3">
                <label for="customRange3" class="form-label">Coefficient de Maitrise (default 1)</label>
                <input type="range" name="coeffecient" class="form-range" min="1" max="4" step="1" id="customRange3">
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#modal1_id" data-bs-toggle="modal" data-bs-dismiss="modal">reteur</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <a class="btn btn-primary" data-bs-toggle="modal" href="#modal1_id" role="button">Identifier risque</a>
@endsection
