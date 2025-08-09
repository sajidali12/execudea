<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'ExecuDea') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .sidebar-active {
            background-color: #4db8b3;
            color: white;
        }
        
        /* Ensure sidebar maintains background on long content */
        #sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 40;
        }
        
        @media (min-width: 768px) {
            #sidebar {
                position: sticky;
                top: 0;
                height: 100vh;
                overflow-y: auto;
            }
        }
        
        /* Add padding to main content to account for fixed sidebar on mobile */
        @media (max-width: 767px) {
            .main-content-mobile {
                transition: margin-left 200ms ease-in-out;
            }
            
            body.sidebar-open .main-content-mobile {
                margin-left: 16rem;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 transform -translate-x-full md:translate-x-0 transition duration-200 ease-in-out" id="sidebar">
            <!-- Logo -->
            <div class="flex items-center space-x-2 px-4">
                <img src="{{ asset('favicon.png') }}" alt="Execudea" class="w-8 h-8">
                <h2 class="text-2xl font-semibold">Admin Panel</h2>
            </div>

            <!-- Navigation -->
            <nav class="mt-8">
                <a href="{{ route('admin-dashboard') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin-dashboard') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                
                <!-- Daily Tasks (Available to all users) -->
                <a href="{{ route('user.daily-tasks.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('user.daily-tasks.*') ? 'sidebar-active' : '' }}">
                    <i class="fas fa-tasks"></i>
                    <span>My Daily Tasks</span>
                    @php
                        $pendingTasksCount = \App\Models\TaskAssignment::where('user_id', auth()->id())
                                                                     ->whereIn('status', ['assigned', 'in_progress'])
                                                                     ->count();
                    @endphp
                    @if($pendingTasksCount > 0)
                        <span class="bg-red-500 text-white rounded-full text-xs px-2 py-1 ml-auto">{{ $pendingTasksCount }}</span>
                    @endif
                </a>
                
                <!-- Content Management -->
                <div class="mt-4">
                    <p class="text-gray-400 text-xs uppercase tracking-wider px-4 mb-2">Content</p>
                    <a href="{{ route('posts.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('posts.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-blog"></i>
                        <span>Blog Posts</span>
                    </a>
                    <a href="{{ route('admin.courses.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.courses.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Courses</span>
                    </a>
                    <a href="{{ route('admin.course-registrations.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.course-registrations.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-user-graduate"></i>
                        <span>Course Registrations</span>
                    </a>
                </div>

                <!-- Office Management (Admin Only) -->
                @if(auth()->user()->isAdmin())
                <div class="mt-4">
                    <p class="text-gray-400 text-xs uppercase tracking-wider px-4 mb-2">Office Management</p>
                    <a href="{{ route('admin.clients.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.clients.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Clients</span>
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.projects.*') && !request()->routeIs('admin.projects.tasks.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-project-diagram"></i>
                        <span>Projects</span>
                    </a>
                    
                    <!-- Quick access to project tasks for admins -->
                    @php
                        $activeProjects = \App\Models\Project::where('status', 'active')->with('tasks')->get();
                        $totalTasks = $activeProjects->sum(function($project) { return $project->tasks->count(); });
                        $pendingTasks = $activeProjects->sum(function($project) { 
                            return $project->tasks->where('status', 'pending')->count(); 
                        });
                    @endphp
                    @if($activeProjects->count() > 0)
                    <div class="ml-6 space-y-1">
                        @foreach($activeProjects->take(3) as $project)
                            @if($project->tasks->count() > 0)
                            <a href="{{ route('admin.projects.tasks.index', $project) }}" class="flex items-center space-x-2 py-1.5 px-4 rounded text-sm transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.projects.tasks.*') && request()->route('project')?->id == $project->id ? 'sidebar-active' : '' }}">
                                <i class="fas fa-list-check text-sm"></i>
                                <span class="truncate">{{ Str::limit($project->name, 15) }} Tasks</span>
                                @if($project->tasks->where('status', 'pending')->count() > 0)
                                    <span class="bg-yellow-500 text-white rounded-full text-xs px-1.5 py-0.5">{{ $project->tasks->where('status', 'pending')->count() }}</span>
                                @endif
                            </a>
                            @endif
                        @endforeach
                        @if($activeProjects->count() > 3)
                            <div class="text-xs text-gray-400 px-4">+ {{ $activeProjects->count() - 3 }} more projects</div>
                        @endif
                    </div>
                    @endif
                    <a href="{{ route('admin.invoices.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.invoices.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Invoices</span>
                    </a>
                    <a href="{{ route('admin.expenses.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.expenses.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-money-bill-wave"></i>
                        <span>Expenses</span>
                    </a>
                    <a href="{{ route('admin.reports') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.reports') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-chart-bar"></i>
                        <span>Financial Reports</span>
                    </a>
                </div>
                @endif

                <!-- Messages -->
                <div class="mt-4">
                    <p class="text-gray-400 text-xs uppercase tracking-wider px-4 mb-2">Communication</p>
                    <a href="{{ route('admin.messages.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.messages.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-envelope"></i>
                        <span>Messages</span>
                    </a>
                </div>

                <!-- User Management (Admin Only) -->
                @if(auth()->user()->isAdmin())
                <div class="mt-4">
                    <p class="text-gray-400 text-xs uppercase tracking-wider px-4 mb-2">User Management</p>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-users-cog"></i>
                        <span>Manage Users</span>
                    </a>
                    <a href="{{ route('admin.teams.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.teams.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Team Members</span>
                    </a>
                </div>
                @endif

                <!-- Settings -->
                <div class="mt-4">
                    <p class="text-gray-400 text-xs uppercase tracking-wider px-4 mb-2">Settings</p>
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.settings.*') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-globe"></i>
                        <span>Site Settings</span>
                    </a>
                    <a href="{{ route('admin-settings') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin-settings') ? 'sidebar-active' : '' }}">
                        <i class="fas fa-cog"></i>
                        <span>Admin Settings</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden main-content-mobile">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <!-- Mobile menu button -->
                            <button class="md:hidden text-gray-500 hover:text-gray-600" onclick="toggleSidebar()">
                                <i class="fas fa-bars"></i>
                            </button>
                            <h1 class="ml-4 text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="text-right">
                                <div class="text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</div>
                                <div class="text-xs text-gray-500">{{ ucfirst(Auth::user()->role ?? 'admin') }}</div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition duration-200">
                                    <i class="fas fa-sign-out-alt mr-1"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const body = document.body;
            
            sidebar.classList.toggle('-translate-x-full');
            body.classList.toggle('sidebar-open');
        }
    </script>
</body>
</html>