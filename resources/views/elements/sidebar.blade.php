<style>
  [data-sidebar-style="full"][data-layout="vertical"] .deznav .metismenu > li.mm-active > a i{
        font-weight: 800;
    }
</style>
<div class="deznav">
    <div class="deznav-scroll">
        {{-- <a class="add-project-sidebar btn btn-primary" href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#addProjectSidebar" >+ New Project</a> --}}
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="{{ route('dashboard') }}" aria-expanded="false">
                <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>


            </li>
            <li><a class="has-arrow ai-icon" href="{{ route('organisations.index') }}" aria-expanded="false">
                <i class="far fa-building"></i>
                    <span class="nav-text">Organizations</span>
                </a>


            </li>
            <li><a class="has-arrow ai-icon" href="{{ route('clients.index') }}" aria-expanded="false">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">Contacts</span>
                </a>
           

            </li>
            <li><a class="has-arrow ai-icon" href="{{ route('leads.index') }}" aria-expanded="false">
                    <i class="flaticon-381-controls-7"></i>
                    <span class="nav-text">Leads</span>
                </a>
        

            </li>
            <li><a class="has-arrow ai-icon" href="{{route('kanvan')}}" aria-expanded="false">
                <i class="far fa-handshake"></i>
                    <span class="nav-text">Deals</span>
                </a>
           

            </li>
            <li><a class="has-arrow ai-icon" href="{{route('charges')}}" aria-expanded="false">
                <i class="fas fa-file-invoice-dollar"></i>
                    <span class="nav-text">Charges</span>
                </a>
           

            </li>
            <li><a class="has-arrow ai-icon" href="{{route('settings')}}" aria-expanded="false">
                <i class="fas fa-cogs"></i>
                    <span class="nav-text">Settings</span>
                </a>
           

            </li>

            {{-- <li><a class="has-arrow ai-icon" href="{{ route('products.index') }}" aria-expanded="false">
                <i class="fab fa-product-hunt"></i>
                    <span class="nav-text">Products</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('products.index')}}">Index</a></li>
 
                </ul>

            </li> --}}
{{-- 
            <li><a class="has-arrow ai-icon" href="{{ route('categories.index') }}" aria-expanded="false">
                    <i class="fas fa-bars "></i>
                    <span class="nav-text">Stages</span>
                </a>


            </li> --}}
            <li class="mt-2">
                <form action="{{ route('logout') }}" method="post" class="has-arrow ai-icon">
                    @csrf
                    <button type="submit" aria-expanded="false" class="ms-4"
                        style="border: none;background:transparent">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-muted" width="18"
                            height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span class="nav-text ms-3 text-muted">Logout</span>
                    </button>
                </form>
                {{-- <ul aria-expanded="false">
                    <li><a href="{{ route('products.index')}}">Index</a></li>
 
                </ul> --}}

            </li>
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('index')}}">Dashboard Light</a></li>
                    <li><a href="{{ url('index-2')}}">Dashboard Dark</a></li>
                    <li><a href="{{ url('projects')}}">Project</a></li>
                    <li><a href="{{ url('contacts')}}">Contact</a></li>
                    <li><a href="{{ url('kanban')}}">Kanban</a></li>
                    <li><a href="{{ url('calendar')}}">Calendar</a></li>
                    <li><a href="{{ url('messages')}}">Messages</a></li>
                </ul>

            </li> --}}
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-monitor"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('app-profile')}}">Profile</a></li>
                    <li><a href="{{ url('post-details')}}">Post Details</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('email-compose')}}">Compose</a></li>
                            <li><a href="{{ url('email-inbox')}}">Inbox</a></li>
                            <li><a href="{{ url('email-read')}}">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('app-calender')}}">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('ecom-product-grid')}}">Product Grid</a></li>
                            <li><a href="{{ url('ecom-product-list')}}">Product List</a></li>
                            <li><a href="{{ url('ecom-product-detail')}}">Product Details</a></li>
                            <li><a href="{{ url('ecom-product-order')}}">Order</a></li>
                            <li><a href="{{ url('ecom-checkout')}}">Checkout</a></li>
                            <li><a href="{{ url('ecom-invoice')}}">Invoice</a></li>
                            <li><a href="{{ url('ecom-customers')}}">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-bar-chart-1"></i>
                    <span class="nav-text">Charts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('chart-flot')}}">Flot</a></li>
                    <li><a href="{{ url('chart-morris')}}">Morris</a></li>
                    <li><a href="{{ url('chart-chartjs')}}">Chartjs</a></li>
                    <li><a href="{{ url('chart-chartist')}}">Chartist</a></li>
                    <li><a href="{{ url('chart-sparkline')}}">Sparkline</a></li>
                    <li><a href="{{ url('chart-peity')}}">Peity</a></li>
                </ul>
            </li> --}}
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-web"></i>
                    <span class="nav-text">Bootstrap</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('ui-accordion')}}">Accordion</a></li>
                    <li><a href="{{ url('ui-alert')}}">Alert</a></li>
                    <li><a href="{{ url('ui-badge')}}">Badge</a></li>
                    <li><a href="{{ url('ui-button')}}">Button</a></li>
                    <li><a href="{{ url('ui-modal')}}">Modal</a></li>
                    <li><a href="{{ url('ui-button-group')}}">Button Group</a></li>
                    <li><a href="{{ url('ui-list-group')}}">List Group</a></li>
                    <li><a href="{{ url('ui-media-object')}}">Media Object</a></li>
                    <li><a href="{{ url('ui-card')}}">Cards</a></li>
                    <li><a href="{{ url('ui-carousel')}}">Carousel</a></li>
                    <li><a href="{{ url('ui-dropdown')}}">Dropdown</a></li>
                    <li><a href="{{ url('ui-popover')}}">Popover</a></li>
                    <li><a href="{{ url('ui-progressbar')}}">Progressbar</a></li>
                    <li><a href="{{ url('ui-tab')}}">Tab</a></li>
                    <li><a href="{{ url('ui-typography')}}">Typography</a></li>
                    <li><a href="{{ url('ui-pagination')}}">Pagination</a></li>
                    <li><a href="{{ url('ui-grid')}}">Grid</a></li>

                </ul>
            </li> --}}
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-plugin"></i>
                    <span class="nav-text">Plugins</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('uc-select2')}}">Select 2</a></li>
                    <li><a href="{{ url('uc-nestable')}}">Nestedable</a></li>
                    <li><a href="{{ url('uc-noui-slider')}}">Noui Slider</a></li>
                    <li><a href="{{ url('uc-sweetalert')}}">Sweet Alert</a></li>
                    <li><a href="{{ url('uc-toastr')}}">Toastr</a></li>
                    <li><a href="{{ url('map-jqvmap')}}">Jqv Map</a></li>
                    <li><a href="{{ url('uc-lightgallery')}}">Light Gallery</a></li>
                </ul>
            </li> --}}
            {{-- <li><a href="{{ url('widget-basic')}}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-admin"></i>
                    <span class="nav-text">Widget</span>
                </a>
            </li> --}}
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-contract"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('form-element')}}">Form Elements</a></li>
                    <li><a href="{{ url('form-wizard')}}">Wizard</a></li>
                    <li><a href="{{ url('ckeditor')}}">CkEditor</a></li>
                    <li><a href="{{ url('form-pickers')}}">Pickers</a></li>
                    <li><a href="{{ url('form-validation-jquery')}}">Jquery Validate</a></li>
                </ul>
            </li> --}}
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-table"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('table-bootstrap-basic')}}">Bootstrap</a></li>
                    <li><a href="{{ url('table-datatable-basic')}}">Datatable</a></li>
                </ul>
            </li> --}}
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-newsletter"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('page-register')}}">Register</a></li>
                    <li><a href="{{ url('page-login')}}">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('page-error-400')}}">Error 400</a></li>
                            <li><a href="{{ url('page-error-403')}}">Error 403</a></li>
                            <li><a href="{{ url('page-error-404')}}">Error 404</a></li>
                            <li><a href="{{ url('page-error-500')}}">Error 500</a></li>
                            <li><a href="{{ url('page-error-503')}}">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('page-lock-screen')}}">Lock Screen</a></li>
                </ul>
            </li> --}}
        </ul>
        {{-- <div class="copyright">
            <p><strong>Fasto Saas Admin Dashboard</strong> © 2023 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignZone</p>
        </div> --}}
    </div>
</div>
