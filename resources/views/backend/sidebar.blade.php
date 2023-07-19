<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="57">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('admin.dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="57">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <div class="simplebar-content" style="padding: 0px;">

                    @if(auth()->user()->email=="prajwalbro@hotmail.com")
                    <li class="nav-item">
                        <a class="nav-link menu-link active" href="{{route('form.create')}}">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">CRUD</span>
                        </a>

                    </li> <!-- end Dashboard Menu -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{route('settings.edit',1)}}">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Settings</span>
                        </a>

                    </li> <!-- end Dashboard Menu -->
                    {{MPCMS::createMenuLink("Menu Location",route('menulocations.index'))}}
                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarMenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMenu">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">Menu Items</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMenu">
                            <ul class="nav nav-sm flex-column">
                                {{MPCMS::createMenuLink("All Menu Items",route('menuitems.index'))}}
                                @foreach(DB::select("select * from tbl_menulocations where status=1 order by display_order") as $menulocation)
                                {{MPCMS::createMenuLink($menulocation->title,route('menuitems.index',['menulocation'=>$menulocation->menulocation_id]))}}
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    {{MPCMS::createMenuLink("Custom Forms",route('forms.index'))}}
                    {{MPCMS::createMenuLink("Custom Fields",route('customfields.index'))}}
                    @endif
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{route('admin.dashboard')}}">
                            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                        </a>

                    </li> <!-- end Dashboard Menu -->

                    {{-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link collapsed" href="#sidebarMenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMenu">
                            <i class="ri-pages-line"></i> <span data-key="t-pages">Articles</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMenu">
                            <ul class="nav nav-sm flex-column">
                                {{MPCMS::createMenuLink("Company Articles",route('companyarticles.index'))}}
                                {{MPCMS::createMenuLink("Recruitment Articles",route('recruitmentarticles.index'))}}
                                {{MPCMS::createMenuLink("Other Articles",route('otherarticles.index'))}}

                            </ul>
                        </div>
                    </li>
                    {{MPCMS::createMenuLink("Countries",route('countries.index'))}}
                    {{MPCMS::createMenuLink("Companies",route('companies.index'))}}
                    {{MPCMS::createMenuLink("Job Categories",route('job_categories.index'))}}
                    {{MPCMS::createMenuLink("Job Demands",route('jobdemands.index'))}}
                    {{MPCMS::createMenuLink("Paper Demands",route('paperdemands.index'))}}
                    {{MPCMS::createMenuLink("Sliders",route('sliders.index'))}}
                    {{MPCMS::createMenuLink("Image Galleries",route('galleries.index'))}}
                    {{MPCMS::createMenuLink("Photos",route('photos.index'))}}
                    {{MPCMS::createMenuLink("News/Blogs",route('news.index'))}} --}}



                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Daily Manufacturing Reporting</span></li>
                    {{MPCMS::createMenuLink("Units",route('dmr.units.index'))}}
                    {{MPCMS::createMenuLink("Advances",route('dmr.advances.index'))}}
                    {{MPCMS::createMenuLink("Deductions",route('dmr.deductions.index'))}}
                    {{MPCMS::createMenuLink("Items",route('dmr.items.index'))}}
                    {{MPCMS::createMenuLink("Processes",route('dmr.processes.index'))}}
                </div>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
@push("js")
<script>
var menuDropdowns = document.querySelectorAll('div.menu-dropdown');

menuDropdowns.forEach(function(menuDropdown) {
  var childLinks = menuDropdown.querySelectorAll('ul > li > a');
  var hasActiveLink = Array.from(childLinks).some(function(childLink) {
    return childLink.classList.contains('active');
  });

  if (hasActiveLink) {
    menuDropdown.classList.add('show');
  } else {
    menuDropdown.classList.remove('show');
  }
});

</script>

@endpush
