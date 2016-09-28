@extends('layoutBack')

@section('content')
@parent
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">


      <div class="panel panel-default">
        <div class="panel-heading">Livres</div>
        <div class="panel-body">
          @if(Session::has('success'))
                <div class="alert alert-success">
                  <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Titre</th>
                  <th>Prix</th>
                  <th>ISBN</th>
                  <th>EAN</th>
                  <th>Image</th>
                  <th>Id Auteur</th>
                  <th>Editeur</th>
                  <th>Date parution</th>
                  <th>Magasin</th>
                  <th>Version Numerique</th>
                  <th>vue</th>
                  <th>Supprimer</th>
                  <th>Editer</th>
                </tr>
              </thead>
              <tbody>
                @foreach  ($livres as $livre)
                <tr>
                  <td>{{$livre->id}}</td>
                  <td>{{$livre->titre}}</td>
                  <td>{{number_format($livre->prix,2)}}</td>
                  <td>{{$livre->numero_isbn}}</td>
                  <td>{{$livre->numero_ean}}</td>
                  <td><img src="{{$livre->image}}" alt="" width="200" height="200"/></td>
                  <td>{{App\Auteur::find($livre->id_auteur)->nom}} {{App\Auteur::find($livre->id_auteur)->prenom}}</td>
                  <td>{{$livre->maison_edition}}</td>
                  <td>{{$livre->date_parution}}</td>
                  <td>{{$livre->magasin}}</td>
                  <td>{{$livre->version_numerique}}</td>
                  <td>{{$livre->nombre_vue}}</td>
                  <td><a href="{{ route('DelLivre', ['id' => $livre->id]) }}" class="btn btn-danger">supprimer</a></td>
                  <td><a href="{{ route('EditLivreForm', ['id' => $livre->id]) }}" class="btn btn-warning">editer</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a href="{{ route('pdfLivre') }}" class="btn btn-success">En Pdf</a>
        </div>
      </div>
    </div>
  </div>

@endsection
