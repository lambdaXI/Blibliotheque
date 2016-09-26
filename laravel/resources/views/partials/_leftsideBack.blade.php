<ul class="nav menu">
  <li class="active"><a href="{{route('main')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
  <li>
    <a class="" href="{{route('gallery')}}">
      <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Catalogue Livre
    </a>
  </li>
  <li class="parent ">
    <a href="#sub-item-1">
      <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Gerer Auteur</span>
    </a>
    <ul class="children collapse" id="sub-item-1">
      <li>
        <a class="" href="{{route('auteur')}}">
          <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> voir Auteur
        </a>
      </li>
      <li>
        <a class="" href="{{route('formulaireAuteur')}}">
          <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Ajouter des auteurs
        </a>
      </li>
    </ul>
  </li>
  <li class="parent ">
    <a href="#sub-item-2">
      <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> Gerer Livre</span>
    </a>
    <ul class="children collapse" id="sub-item-2">
      <li>
        <a class="" href="{{route('Livre')}}">
          <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> voir Livres
        </a>
      </li>
      <li>
        <a class="" href="{{route('formulaireLivre')}}">
          <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Ajouter des Livres
        </a>
      </li>
    </ul>
  </li>
</ul>
