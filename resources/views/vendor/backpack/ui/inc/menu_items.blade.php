{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Notizie" icon="la la-newspaper" :link="backpack_url('notizie')" />
<x-backpack::menu-item title="Libri" icon="la la-book" :link="backpack_url('libri')" />
<x-backpack::menu-item title="Categorie" icon="la la-shapes" :link="backpack_url('categorie')" />
<x-backpack::menu-item title="Utenti" icon="la la-users" :link="backpack_url('users')" />