        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo constant('URL'); ?>main">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">                  
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                    <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>Usuarios</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="<?php echo constant('URL'); ?>users">Consulta</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="<?php echo constant('URL'); ?>users/crear">Crear</a>
                        </li>                        
                    </ul>
                    </li>
                    <li class="nav-item dropdown">                  
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                    <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>Roles</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="<?php echo constant('URL'); ?>rols">Consulta</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="<?php echo constant('URL'); ?>rols/crear">Crear</a>
                        </li>                        
                    </ul>
                    </li>
                    <li class="nav-item">  
                        <a class="nav-link" href="<?php echo constant('URL'); ?>login/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        Logout</a>
                    </li>                    
                </ul>
                    
            </div>
            </div>
        </nav>
