<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="profile-info">
            {{-- <figure class="user-cover-image"></figure> --}}
            <div class="user-info mt-n3">
                {{-- <img src="assets/img/" alt="avatar"> --}}
                {{-- <h6 class="">{{Auth::user()->nombre}}</h6> --}}
                <h6 class="">Hola</h6>

                <p class="">Project Leader</p>
            </div>
        </div>
        {{-- <div class="shadow-bottom"></div> --}}
        <ul class="list-unstyled menu-categories mt-n1" id="accordionExample">
            <li class="menu d-none">
                <a href="javascript:void(0);" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span> Menu 1</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-airplay">
                            <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-airplay">
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>

                        <span> Panel </span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu" data-parent="#accordionExample">
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Panel </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Calendario </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Ordenes de trabajo asignadas </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-anchor">
                            <circle cx="12" cy="5" r="3"></circle>
                            <line x1="12" y1="22" x2="12" y2="8"></line>
                            <path d="M5 12H2a10 10 0 0 0 20 0h-3"></path>
                        </svg>

                        <span> Mantenimiento </span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu1" data-parent="#accordionExample">
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Ordenes de Trabajo </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Mantenimineto Programado </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Grupo de tareas </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Areas de procesos </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Evaluacion de Indicadores </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Movimientos de equipos </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Esquipos fuera de servicio </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Desincorporar equipo </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Reportar fallas en equipo </a>
                    </li>
                    <li>
                        <a class="ml-n4" href="javascript:void(0);"> Ubicacion en plantas </a>
                    </li>
                    {{-- <li>
                        <a href="#sm2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Submenu 2
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="collapse list-unstyled sub-submenu" id="sm2" data-parent="#submenu2">
                            <li>
                                <a href="javascript:void(0);"> Sub-Submenu 1 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Sub-Submenu 2 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Sub-Submenu 3 </a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </li>
            <li class="menu">
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-package">
                            <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>

                        <span> Activos </span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
                    <li>
                        <a href="javascript:void(0);"> Acueductos </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Sistemas </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Subsistemas </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Herramientas </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Equipos </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Indicadores </a>
                    </li>

                </ul>
            </li>
            <li class="menu">
                <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-truck">
                            <rect x="1" y="3" width="15" height="13"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>

                        <span> Suministros </span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu3" data-parent="#accordionExample">
                    <li>
                        <a class="ml-n5" href="javascript:void(0);"> Piezas de equipos </a>
                    </li>
                    <li>
                        <a class="ml-n5" href="javascript:void(0);"> Suministros </a>
                    </li>
                    <li>
                        <a class="ml-n5" href="javascript:void(0);"> Stock actual </a>
                    </li>

                </ul>
            </li>
            <li class="menu">
                <a href="#submenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-settings">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg>

                        <span> Ajustes</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu4" data-parent="#accordionExample">
                    <li>
                        <a href="javascript:void(0);"> Usuarios </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Tipos de Sistemas </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Marcas de equipos</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Modelos de equipos </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Tipos de Equipos </a>
                    </li>
                </ul>
            </li>
            <li class="menu active d-none">
                <a href="#starter-kit" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-terminal">
                            <polyline points="4 17 10 11 4 5"></polyline>
                            <line x1="12" y1="19" x2="20" y2="19"></line>
                        </svg>
                        <span>Starter Kit</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="starter-kit"
                    data-parent="#accordionExample">
                    <li class="active">
                        <a href="starter_kit_blank_page.html"> Blank Page </a>
                    </li>
                    <li>
                        <a href="starter_kit_boxed.html"> Boxed </a>
                    </li>
                    <li>
                        <a href="starter_kit_collapsible_menu.html"> Collapsible </a>
                    </li>
                </ul>
            </li>

        </ul>

    </nav>

</div>
