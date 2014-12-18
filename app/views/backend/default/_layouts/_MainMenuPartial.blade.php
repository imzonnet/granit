@if (Sentry::check())
    <div id="sidebar" class="nav-collapse collapse">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"></div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
                <input type="text" class="search-query" placeholder="Search" />
            </form>
        </div>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul>
            <li class="start {{ Request::is('backend') ? 'active' : null }} ">
                <a href="{{ URL::to('backend') }}">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('cms.dashboard') }}</span>
                </a>
            </li>

            @if (can_access_menu($current_user, array('users', 'user-groups')))
                <li class="has-sub {{ Request::is('backend/users*') ? 'active' : null }} {{ Request::is('backend/user-groups*') ? 'active' : null }} ">
                    <a href="javascript:;">
                        <i class="icon-user"></i>
                        <span class="title">{{ trans('cms.user_manager') }}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        @if (can_access_menu($current_user, array('user-groups')))
                            <li><a href="{{ URL::to('backend/user-groups') }}">{{ trans('cms.all_user_groups') }}</a></li>
                        @endif
                        @if (can_access_menu($current_user, array('users')))
                            <li><a href="{{ URL::to('backend/users') }}">{{ trans('cms.all_users') }}</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (can_access_menu($current_user, array('menu-manager', 'menu-categories', 'menu-positions')))
                <li class="has-sub {{ Request::is('backend/menu-manager*') || Request::is('backend/menu-categories*') || Request::is('backend/menu-positions*') ? 'active' : null }} ">
                    <a href="javascript:;">
                        <i class="icon-th-list"></i>
                        <span class="title">{{ trans('cms.menu_manager') }}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub">
                        @if (can_access_menu($current_user, array('menu-positions')))
                            <li><a href="{{ URL::to('backend/menu-positions') }}">{{ trans('cms.all_menu_positions') }}</a></li>
                        @endif
                        @if (can_access_menu($current_user, array('menu-categories')))
                            <li><a href="{{ URL::to('backend/menu-categories') }}">{{ trans('cms.all_menu_categories') }}</a></li>
                        @endif
                        @if (can_access_menu($current_user, array('menu-manager')))
                            <li><a href="{{ URL::to('backend/menu-manager') }}">All Menu Entries</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            @if (can_access_menu($current_user, array('slideshow')))
                <li class="{{ Request::is('backend/slideshow') ? 'active' : null }}">
                   <a href="{{ URL::to('backend/slideshow') }}">
                       <i class="icon-picture"></i>
                       <span class="title">{{ trans('cms.slideshow') }}</span>
                   </a>
                </li>
            @endif
            @if (can_access_menu($current_user, array('pages', 'page-categories')))
            <li class="has-sub {{ Request::is('backend/pages*') || Request::is('backend/page-categories*') ? 'active' : null }} ">
                <a href="javascript:;">
                    <i class="icon-book"></i>
                    <span class="title">{{ trans('cms.pages') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                    @if (can_access_menu($current_user, array('pages')))
                        <li class="{{ Request::is('backend/pages') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/pages') }}">
                               {{ trans('cms.pages') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('page-categories')))
                        <li class="{{ Request::is('backend/page-categories') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/page-categories') }}">
                               {{ trans('cms.page_categories') }}
                           </a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif
            @if (can_access_menu($current_user, array('posts')))
            <li class="has-sub {{ Request::is('backend/posts*') || Request::is('backend/post-categories*') ? 'active' : null }} ">
                <a href="javascript:;">
                    <i class="icon-book"></i>
                    <span class="title">{{ trans('cms.posts') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                    @if (can_access_menu($current_user, array('posts')))
                        <li class="{{ Request::is('backend/posts') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/posts') }}">
                               {{ trans('cms.posts') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('post-categories')))
                        <li class="{{ Request::is('backend/post-categories') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/post-categories') }}">
                               {{ trans('cms.post_categories') }}
                           </a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif
            <!-- Exp Component: Products -->
            @if (can_access_menu($current_user, array('products')))
            <li class="has-sub {{ Request::is('backend/products*') || Request::is('backend/product-colors*') || Request::is('backend/product-categories*') ? 'active' : null }} ">
                <a href="javascript:;">
                    <i class="icon-suitcase"></i>
                    <span class="title">{{ trans('Products::cms.products') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                    @if (can_access_menu($current_user, array('products')))
                        <li class="{{ Request::is('backend/products') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/products') }}">
                               {{ trans('Products::cms.products') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('product-colors')))
                        <li class="{{ Request::is('backend/product-colors') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/product-colors') }}">
                               {{ trans('Products::cms.product_colors') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('product-categories')))
                        <li class="{{ Request::is('backend/product-categories') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/product-categories') }}">
                               {{ trans('Products::cms.product_categories') }}
                           </a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif
            @if (can_access_menu($current_user, array('stones')))
            <li class="has-sub {{ Request::is('backend/stones*') || Request::is('backend/stones/icon-categories*') || Request::is('backend/stones/icons*') || Request::is('backend/stones/fonts*') || Request::is('backend/stones/colors*') ? 'active' : null }} ">
                <a href="javascript:;">
                    <i class="icon-cut"></i>
                    <span class="title">{{ trans('Stones::cms.stones') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                    @if (can_access_menu($current_user, array('stones-icons')))
                        <li class="{{ Request::is('backend/stones/icons') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/stones/icons') }}">
                               {{ trans('Stones::cms.stones.icons') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('stones-icon-categories')))
                        <li class="{{ Request::is('backend/stones/icon-categories') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/stones/icon-categories') }}">
                               {{ trans('Stones::cms.stones.icon-categories') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('stones-colors')))
                        <li class="{{ Request::is('backend/stones/colors') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/stones/colors') }}">
                               {{ trans('Stones::cms.stones.colors') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('stones-fonts')))
                        <li class="{{ Request::is('backend/stones/fonts') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/stones/fonts') }}">
                               {{ trans('Stones::cms.stones.fonts') }}
                           </a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif
            
            @if (can_access_menu($current_user, array('memorials', 'memorial-guestbook', 'memorial-media')))
            <li class="has-sub {{ Request::is('backend/memorials*') || Request::is('backend/memorial*') || Request::is('backend/stones/icons*') || Request::is('backend/stones/fonts*') || Request::is('backend/stones/colors*') ? 'active' : null }} ">
                <a href="javascript:;">
                    <i class="icon-group"></i>
                    <span class="title">{{ trans('Memorials::cms.memorials') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                    @if (can_access_menu($current_user, array('memorials')))
                        <li class="{{ Request::is('backend/memorials') || Request::is('backend/memorial*') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/memorials') }}">
                               {{ trans('Memorials::cms.memorials') }}
                           </a>
                        </li>
                    @endif
                    <!--
                    @if (can_access_menu($current_user, array('memorial-guestbook')))
                        <li class="{{ Request::is('backend/memorial-guestbooks') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/memorial-guestbooks') }}">
                               {{ trans('Memorials::cms.memorial-guestbooks') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('memorial-media')))
                        <li class="{{ Request::is('backend/memorial-media') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/memorial-media') }}">
                               {{ trans('Memorials::cms.memorial-media') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('memorial-users')))
                        <li class="{{ Request::is('backend/memorial-users') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/memorial-users') }}">
                               {{ trans('Memorials::cms.memorial-users') }}
                           </a>
                        </li>
                    @endif
                    -->
                </ul>
            </li>
            @endif
            
            <!-- Exp Component -->
            @if (can_access_menu($current_user, array('media-manager')))
            <li class="{{ Request::is('backend/media-manager*') ? 'active' : null }}">
               <a href="{{ URL::to('backend/media-manager') }}">
                   <i class="icon-camera"></i>
                   <span class="title">{{ trans('cms.media_manager') }}</span>
               </a>
            </li>
            @endif
            <!-- Hieu 18.11.14 (Demo Com) -->
            @if (can_access_menu($current_user, array('mygalleries')))
            <li class="has-sub {{ Request::is('backend/mygalleries*') || Request::is('backend/mygallery-categories*') ? 'active' : null }}">
                <a href="javascript:;">
                    <i class="icon-play"></i>
                    <span class="title">My Galleries</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                  @if (can_access_menu($current_user, array('mygalleries')))
                        <li class="{{ Request::is('backend/mygalleries') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/mygalleries') }}">
                               My Galleries
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('mygallery-categories')))
                        <li class="{{ Request::is('backend/mygallery-categories') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/mygallery-categories') }}">
                               Categories
                           </a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif
            <!-- End Hieu 18.11.14 (Demo Com) -->
            @if (can_access_menu($current_user, array('contact-manager')))
            <li class="has-sub {{ Request::is('backend/contact-manager*') || Request::is('backend/contact-categories*') ? 'active' : null }} ">
                <a href="javascript:;">
                    <i class="icon-book"></i>
                    <span class="title">{{ trans('cms.contact_manager') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                    @if (can_access_menu($current_user, array('contact-manager')))
                        <li class="{{ Request::is('backend/contact-manager') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/contact-manager') }}">
                               {{ trans('cms.contact_manager') }}
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('contact-categories')))
                        <li class="{{ Request::is('backend/contact-categories') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/contact-categories') }}">
                               {{ trans('cms.contact_categories') }}
                           </a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif
            @if (can_access_menu($current_user, array('theme-manager')))
            <li class="hide {{ Request::is('backend/theme-manager*') ? 'active' : null }}">
               <a href="{{ URL::to('backend/theme-manager') }}">
                   <i class="icon-eye-open"></i>
                   <span class="title">{{ trans('cms.theme_manager') }}</span>
               </a>
            </li>
            @endif
            @if (can_access_menu($current_user, array('form-categories', 'form-builder', 'module-builder', 'report-builder')))
            <li class="has-sub {{ Request::is('backend/form-builder*') || Request::is('backend/form-categories*') || Request::is('backend/module-builder*') || Request::is('backend/report-builder*') ? 'active' : null }} ">
                <a href="javascript:;">
                    <i class="icon-table"></i>
                    <span class="title">{{ trans('cms.builders') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                    @if (can_access_menu($current_user, array('form-categories')))
                        <li><a href="{{ URL::to('backend/form-categories') }}">{{ trans('cms.form_categories') }}</a></li>
                    @endif
                    @if (can_access_menu($current_user, array('form-builder')))
                        <li><a href="{{ URL::to('backend/form-builder') }}">{{ trans('cms.form_builder') }}</a></li>
                    @endif
                    @if (can_access_menu($current_user, array('module-builder')))
                        <li><a href="{{ URL::to('backend/module-builder') }}">{{ trans('cms.module_builder') }}</a></li>
                    @endif
                    @if (can_access_menu($current_user, array('report-builder')))
                        <li><a href="{{ URL::to('backend/report-builder') }}">{{ trans('cms.report_builder') }}</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if (can_access_menu($current_user, array('modules', 'report-generators')))
            <li class="has-sub {{ Request::is('backend/modules*') || Request::is('backend/report-generators*') ? 'active' : null }} ">
                <a href="javascript:;">
                    <i class="icon-cog"></i>
                    <span class="title">{{ trans('cms.extensions') }}</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub">
                    @if (can_access_menu($current_user, array('modules')))
                        <li class="{{ Request::is('backend/modules/*') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/modules') }}">
                               <span class="title">{{ trans('cms.modules') }}</span>
                           </a>
                        </li>
                    @endif
                    @if (can_access_menu($current_user, array('report-generators')))
                        <li class="{{ Request::is('backend/report-generators/*') ? 'active' : null }}">
                           <a href="{{ URL::to('backend/report-generators') }}">
                               <span class="title">{{ trans('cms.report_generators') }}</span>
                           </a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif
            @if (can_access_menu($current_user, array('synchronize')))
            <li class="{{ Request::is('backend/synchronize') ? 'active' : null }}">
               <a href="{{ URL::to('backend/synchronize') }}">
                   <i class="icon-refresh"></i>
                   <span class="title">{{ trans('cms.synchronize') }}</span>
               </a>
            </li>
            @endif
            @if (can_access_menu($current_user, array('config')))
            <li class="{{ Request::is('backend/config') ? 'active' : null }}">
               <a href="{{ URL::to('backend/config') }}">
                   <i class="icon-cogs"></i>
                   <span class="title">{{ trans('cms.settings') }}</span>
               </a>
            </li>
            @endif
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
@endif
