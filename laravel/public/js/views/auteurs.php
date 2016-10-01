<div class="panel panel-default">
  <!-- modal -->
  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="myModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">#{auteurDetail.nom}# #{auteurDetail.prenom}#</h4>
        </div>
        <div class="modal-body">
          <img src="#{auteurDetail.image}#" alt="" width="250" /><br>
          <p>Age: #{auteurDetail.age}#<br>
            Ville: #{auteurDetail.ville}#<br>
            Date de naissance:#{auteurDetail.date_naissance}#<br>
            Biographie: <br>
            #{auteurDetail.biographie}#
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- fin modal  -->
  <div class="panel-heading">Auteurs</div>
  <div class="panel-body">
    <div class="col-sm-6 col-md-4 col-lg-4" ng-repeat="auteur in auteurs">
      <div class="thumbnail">
        <img src="#{auteur.image}#" alt="cover livre" width="150" height="150">
        <div class="caption">
          <h3>#{auteur.nom}# #{auteur.prenom}#</h3>
          <p>Age: #{auteur.age}#<br>
            Ville: #{auteur.ville}#<br>
            Date de naissance:#{auteur.date_naissance}#<br>
          </p>
          <button type="button" name="button" ng-click="voirAuteur(auteur)">Voir</button>
        </div>
      </div>
    </div>
  </div>
</div>
