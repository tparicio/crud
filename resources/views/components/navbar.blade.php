<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="https://digitalgreen.es/">Digital Green</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fa fa-home"></i>
          {{ __('Home') }} <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item dropdown navbar-right">
        <a class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdown"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false">
          <i class="fa fa-language"></i>
          {{ $guiLang->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @foreach ($langs as $lang)
              <!-- check lang is not already GUI lang -->
              @if ($guiLang->iso != $lang->iso)
                <a class="dropdown-item" href="{{ url('/lang/'.$lang->iso) }}">{{ $lang->name }}</a>
              @endif
          @endforeach
        </div>
      </li>
    </ul>
  </div>
</nav>
