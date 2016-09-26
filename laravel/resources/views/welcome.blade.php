@extends('layoutBack')
@section('css')
  @parent
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Dashboard</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
      <div class="panel panel-teal panel-widget">
        <div class="row no-padding">
          <div class="col-sm-3 col-lg-5 widget-left">
            <svg class="glyph stroked male-user"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-male-user"></use></svg>
          </div>
          <div class="col-sm-9 col-lg-7 widget-right">
            <div class="large">{{$auteurTotal}}</div>
            <div class="text-muted">Auteur</div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-3">
      <div class="panel panel-blue panel-widget ">
        <div class="row no-padding">
          <div class="col-sm-3 col-lg-5 widget-left">
            <svg class="glyph stroked bag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-bag"></use></svg>
          </div>
          <div class="col-sm-9 col-lg-7 widget-right">
            <div class="large">{{$livreTotal}}</div>
            <div class="text-muted">Livres</div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xs-12 col-md-6 col-lg-3">
      <div class="panel panel-red panel-widget">
        <div class="row no-padding">
          <div class="col-sm-3 col-lg-5 widget-left">
            <svg class="glyph stroked app-window-with-content"><svg class="glyph stroked eye"><use xlink:href="#stroked-eye"/></svg></svg>
          </div>
          <div class="col-sm-9 col-lg-7 widget-right">
            <div class="large">{{$vueTotal->total}}</div>
            <div class="text-muted">Vues total de tous les livres</div>
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- Donnut --}}
<div ng-controller="DashboardController">


<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">Stats Auteur/Manga</div>
      <div class="panel-body">
        <div class="canvas-wrapper" >
          <canvas class="chart" id="doughnut-chart" height="366" width="733" style="width: 733px; height: 366px;"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Stat courant literaire</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="chart" id="pie-chart" height="366" width="733" style="width: 733px; height: 366px;"></canvas>
						</div>
					</div>
				</div>
			</div>
  </div>
<div class="row">
  <div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						Titre: #{randomLivre.titre}#
					</div>
					<div class="panel-body">
            <img src="#{randomLivre.image}#" alt="" width="250" height="250"/>
						<p>
						  Prix: #{randomLivre.prix.toFixed(2)}#€ <br>
						  Editeur: #{randomLivre.maison_edition}# <br>
              Vendu par: #{randomLivre.magasin}#
						</p>
					</div>
				</div>
			</div>
  <div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						Auteur: #{randomAuteur.nom}# #{randomAuteur.prenom}#
					</div>
					<div class="panel-body">
            <img src="#{randomAuteur.image}#" alt="" width="250" height="250"/>
						<p>Biographie:<br>#{randomAuteur.biographie}#</p>
					</div>
				</div>
			</div>
  <div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						Livre Grouper par Année
					</div>
					<div class="panel-body">
            <table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
              <thead>
                <tr>
                  <th style>Titre</th>
                  <th style>Année</th>
                </tr>
              </thead>

              <tr ng-repeat="livre in LivreByYear">
                <td>#{livre.titre}#</td>
                <td>#{livre.year}#</td>
              </tr>
            </table>
					</div>
				</div>
			</div>
</div>

</div>

@endsection
