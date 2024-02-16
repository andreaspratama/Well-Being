<!-- Sidebar -->
      <!--
          Sidebar Mini Mode - Display Helper classes

          Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
          Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
              If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

          Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
          Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
          Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
      -->
      <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="content-header">
          <!-- Logo -->
          <a class="fw-semibold text-dual" href="https://wb.yski.info/admin">
            <span class="smini-visible">
              <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">WB</span>
          </a>
          <!-- END Logo -->

          <!-- Extra -->
          <div>
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <!--<button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle">-->
            <!--  <i class="far fa-moon"></i>-->
            <!--</button>-->
            <!-- END Dark Mode -->

            <!-- Options -->
            <!-- END Options -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
              <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
          </div>
          <!-- END Extra -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side Navigation -->
          <div class="content-side">
            <ul class="nav-main">
              <li class="nav-main-item">
                <a class="nav-main-link active" href="https://wb.yski.info/admin">
                  <i class="nav-main-link-icon si si-speedometer"></i>
                  <span class="nav-main-link-name">Dashboard</span>
                </a>
              </li>
              <li class="nav-main-heading">User Interface</li>
              @if (auth()->user()->role === 'admin')
                <li class="nav-main-item">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-folder"></i>
                    <span class="nav-main-link-name">Data Master</span>
                  </a>
                  <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('siswa.index')}}">
                        <span class="nav-main-link-name">Siswa</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('guru.index')}}">
                        <span class="nav-main-link-name">Guru</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('pimpinan.index')}}">
                        <span class="nav-main-link-name">Pimpinan</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('feed.index')}}">
                        <span class="nav-main-link-name">Feed</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{route('user.index')}}">
                        <span class="nav-main-link-name">User</span>
                      </a>
                    </li>
                    <!--<li class="nav-main-item">-->
                    <!--  <a class="nav-main-link" href="be_blocks_api.html">-->
                    <!--    <span class="nav-main-link-name">API</span>-->
                    <!--  </a>-->
                    <!--</li>-->
                  </ul>
                </li>
              @endif
              <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                  <i class="nav-main-link-icon si si-folder"></i>
                  <span class="nav-main-link-name">Report</span>
                </a>
                <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                      <span class="nav-main-link-name">Kelas Besar</span>
                    </a>
                    <ul class="nav-main-submenu">
                      @if (auth()->user()->role === 'admin' || 'manajerial')
                        <li class="nav-main-item">
                          <a class="nav-main-link" href="{{route('reportSMA')}}">
                            <span class="nav-main-link-name">SMA</span>
                          </a>
                        </li>
                        <li class="nav-main-item">
                          <a class="nav-main-link" href="{{route('reportSMP')}}">
                            <span class="nav-main-link-name">SMP</span>
                          </a>
                        </li>
                        <li class="nav-main-item">
                          <a class="nav-main-link" href="{{route('reportK3')}}">
                            <span class="nav-main-link-name">K3</span>
                          </a>
                        </li>
                        <li class="nav-main-item">
                          <a class="nav-main-link" href="{{route('reportK2')}}">
                            <span class="nav-main-link-name">K2</span>
                          </a>
                        </li>
                        <li class="nav-main-item">
                          <a class="nav-main-link" href="{{route('reportK1')}}">
                            <span class="nav-main-link-name">K1</span>
                          </a>
                        </li>
                      @endif
                      @if (auth()->user()->role === 'pimpinan')
                        @if (auth()->user()->pimpinan[0]->unit === 'SMA')
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('reportSMA')}}">
                              <span class="nav-main-link-name">SMA</span>
                            </a>
                          </li>
                        @elseif(auth()->user()->pimpinan[0]->unit === 'SMP')
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('reportSMP')}}">
                              <span class="nav-main-link-name">SMP</span>
                            </a>
                          </li>
                        @elseif(auth()->user()->pimpinan[0]->unit === 'K3')
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('reportK3')}}">
                              <span class="nav-main-link-name">K3</span>
                            </a>
                          </li>
                        @elseif(auth()->user()->pimpinan[0]->unit === 'K2')
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('reportK2')}}">
                              <span class="nav-main-link-name">K2</span>
                            </a>
                          </li>
                        @elseif(auth()->user()->pimpinan[0]->unit === 'K1')
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('reportK1')}}">
                              <span class="nav-main-link-name">K1</span>
                            </a>
                          </li>
                        @endif
                      @endif
                    </ul>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                      <span class="nav-main-link-name">Kelas Kecil</span>
                    </a>
                    <ul class="nav-main-submenu">
                      @if (auth()->user()->role === 'admin' || 'manajerial')
                        <li class="nav-main-item">
                          <a class="nav-main-link" href="{{route('reportKecilK3')}}">
                            <span class="nav-main-link-name">K3</span>
                          </a>
                        </li>
                        <li class="nav-main-item">
                          <a class="nav-main-link" href="{{route('reportKecilK2')}}">
                            <span class="nav-main-link-name">K2</span>
                          </a>
                        </li>
                        <li class="nav-main-item">
                          <a class="nav-main-link" href="{{route('reportKecilK1')}}">
                            <span class="nav-main-link-name">K1</span>
                          </a>
                        </li>
                      @endif
                      @if (auth()->user()->role === 'pimpinan')
                        @if(auth()->user()->pimpinan[0]->unit === 'K3')
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('reportKecilK3')}}">
                              <span class="nav-main-link-name">K3</span>
                            </a>
                          </li>
                        @elseif(auth()->user()->pimpinan[0]->unit === 'K2')
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('reportKecilK2')}}">
                              <span class="nav-main-link-name">K2</span>
                            </a>
                          </li>
                        @elseif(auth()->user()->pimpinan[0]->unit === 'K1')
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="{{route('reportKecilK1')}}">
                              <span class="nav-main-link-name">K1</span>
                            </a>
                          </li>
                        @endif
                      @endif
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->