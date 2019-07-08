<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if( (isset($auth_user)) && ($auth_user->thumbnailphoto) )
                    <img src="data:image/jpeg;base64, {!! base64_encode( $auth_user->thumbnailphoto ) !!}" class="img-circle" alt="User Image"/>
                @else
                    <img src="{!! URL::asset('node_modules/admin-lte/dist/img/avatar5.png') !!}" class="img-circle" alt="User Image"/>
                @endif
            </div>
            <div class="pull-left info">
                @isset($auth_user)
                    <p> {{ $auth_user->mail }} </p>
                @endisset
                <!-- p>user</p -->
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            
            <!-- li class="header">ACTIVITIES</li -->
            <!-- Optionally, you can add icons to the links -->
            <!-- li class="{!! set_active(['home/']) !!}"><a href="{!! route('home.index') !!}"><i class="fa fa-edit"></i> <span>Home</span></a></li -->
            <li class="header">ACTIVITIES</li>
            <li class="treeview {!! set_active(['pdcas', 'pdcas/*']) !!}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>{{ config('app.display_name', 'Title') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! set_active(['pdcas/create', 'pdcas/create/*']) !!}"><a href="{!! route('home') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Create New</a></li>
                    <li class="{!! set_active(['pdcas/show-created-pdcas', 'pdcas/show-created-pdcas/*']) !!}"><a href="{!! route('home') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Created PDCAS</a></li>
                </ul>
            </li>
            <li class="treeview {!! set_active(['team/departments', 'team/departments/*']) !!}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>My Department</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! set_active(['team/departments/show', 'team/departments/*']) !!}"><a href="{!! route('home') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Status</a></li>
                </ul>
            </li>
            <li class="treeview {!! set_active(['team/companies', 'team/companies/*']) !!}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>My SBU</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! set_active(['team/companies/departments', 'team/companies/departments/*']) !!}"><a href="{!! route('home') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Status</a></li>
                </ul>
            </li>
            @superadmin
            <li class="treeview {!! set_active(['backstage', 'backstage/*']) !!}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Backstage</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview {!! set_active(['backstage/companies', 'backstage/companies/*']) !!}">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Company</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{!! set_active(['backstage/companies/create', 'backstage/companies/create/*']) !!}"><a href="{!! route('company.create') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Control</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview {!! set_active(['backstage/departments', 'backstage/departments/*']) !!}">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Department</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{!! set_active(['backstage/departments/create', 'backstage/departments/create/*']) !!}"><a href="{!! route('department.create') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Control</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview {!! set_active(['backstage/factories', 'backstage/factories/*']) !!}">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Factory</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{!! set_active(['backstage/factories/create', 'backstage/factories/create/*']) !!}"><a href="{!! route('factory.create') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Control</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview {!! set_active(['backstage/lines', 'backstage/lines/*']) !!}">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Line</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{!! set_active(['backstage/lines/create', 'backstage/lines/create/*']) !!}"><a href="{!! route('line.create') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Control</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview {!! set_active(['backstage/operations', 'backstage/operations/*']) !!}">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Operation</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{!! set_active(['backstage/operations/create', 'backstage/operations/create/*']) !!}"><a href="{!! route('operation.create') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Control</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview {!! set_active(['backstage/machine-types', 'backstage/machine-types/*']) !!}">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Machine Type</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{!! set_active(['backstage/machine-types/create', 'backstage/machine-types/create/*']) !!}"><a href="{!! route('machineType.create') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Control</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview {!! set_active(['backstage/operation-combine-types', 'backstage/operation-combine-types/*']) !!}">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Operation Combine Type</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{!! set_active(['backstage/operation-combine-types/create', 'backstage/operation-combine-types/create/*']) !!}"><a href="{!! route('operationCombineType.create') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Control</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview {!! set_active(['backstage/user-roles', 'backstage/user-roles/*']) !!}">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Admin User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{!! set_active(['backstage/user-roles/create', 'backstage/user-roles/create/*']) !!}"><a href="{!! route('userRole.create') !!}"> <i class="fa fa-arrow-circle-o-right"></i> Control</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endsuperadmin
            
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
    
</aside>