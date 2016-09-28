@extends('layoutBack')

@section('content')
@parent
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">


      <div class="panel panel-default">
        <div class="panel-heading">Auteurs</div>
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
                  <th>Genre</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Age</th>
                  <th>Image</th>
                  <th>Ville</th>
                  <th>courant literaire</th>
                  <th>Date de naissance</th>
                  <th>Date de mort</th>
                  <th>Biographie</th>
                  <th>supprimer</th>
                  <th>editer</th>
                </tr>
              </thead>
              <tbody>
                @foreach  ($auteurs as $auteur)
                <tr>
                  <td>{{$auteur->id}}</td>
                  <td>{{$auteur->sexe}}</td>
                  <td>{{$auteur->nom}}</td>
                  <td>{{$auteur->prenom}}</td>
                  <td>{{$auteur->age}}</td>
                  <td><img src="{{$auteur->image}}" alt="" width="200" height="200"/></td>
                  <td>{{$auteur->ville}}</td>
                  <td>{{$auteur->courant_literaire}}</td>
                  <td>{{$auteur->date_naissance}}</td>
                  <td>{{$auteur->date_mort}}</td>
                  <td>{{$auteur->biographie}}</td>
                  <td><a href="{{ route('DelAuteur', ['id' => $auteur->id]) }}" class="btn btn-danger">supprimer</a></td>
                  <td><a href="{{ route('EditAuteurForm', ['id' => $auteur->id]) }}" class="btn btn-warning" >editer</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a href="{{ route('pdfAuteur') }}" class="btn btn-success">En Pdf</a>
        </div>
      </div>
    </div>
  </div>

@endsection
