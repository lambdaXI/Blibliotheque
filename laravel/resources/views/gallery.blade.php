@extends('layoutBack')

@section('content')

  <div class="row">

    @forelse ($livres as $key => $livre)
      <div class="col-md-4" >
  				<div class="panel panel-info">
  					<div class="panel-heading ng-binding">
  						Titre: {{$livre->titre}}
  					</div>
  					<div class="panel-body">

              <img alt="" width="250" height="250" src="{{$livre->image}}">
  						<p class="ng-binding">
  						  Prix: {{number_format($livre->prix,2)}}€ <br>
  						  Editeur: {{$livre->maison_edition}} <br>
                Vendu par: {{$livre->magasin}}<br>
                <a href="#" class="button">
                  @if (array_key_exists($livre->id, session('likes', [])))
                  <a href="{{ route('like', ['id' => $livre->id]) }}" class="btn btn-success">
                    like
                  </a>
                @else
                  <a href="{{ route('like', ['id' => $livre->id]) }}" class="btn btn-success">
                    dislike
                  </a>
                @endif
                </a>
  						</p>
  					</div>
  				</div>
  			</div>
    @empty
      <p>
        Il n'y a pas de livre dans la DataBase
      </p>
    @endforelse


  </div>

@endsection
