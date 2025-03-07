<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G-Scores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    body { font-family: Arial, sans-serif; }
    
    /* Sidebar mặc định bị ẩn trên mobile */
    .sidebar {
        width: 250px;
        height: 100vh;
        background: linear-gradient(to bottom, #FFD700, #008080);
        position: fixed;
        left: -250px;
        transition: all 0.3s;
        z-index: 1000;
    }

    .sidebar a { 
        color: black; 
        text-decoration: none; 
        display: block; 
        padding: 10px; 
    }

    .sidebar a:hover { 
        background: rgba(255, 255, 255, 0.2); 
    }

    /* Khi mở sidebar */
    .sidebar.open {
        left: 0; /* Khi mở thì dịch sang trái */
    }

    .sidebar h4 {
    text-align: center;
}
    /* Nội dung chính */
    .content {
        margin-left: 0;
        padding: 20px;
        transition: margin-left 0.3s;
    }

    /* Khi sidebar mở trên desktop */
    @media (min-width: 992px) {
        .sidebar {
            left: 0;
        }
        .content {
            margin-left: 270px;
        }
    }
    #menuButton {
    margin-right: auto; /* Đẩy nút sang trái */
}
    .navbar { 
        background-color: #0B3D91; 
        color: white; 
        padding: 15px; 
        text-align: center; 
        font-size: 24px; 
        font-weight: bold; 
        
    }
</style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid d-flex justify-content-center position-relative">
        <button id="menuButton" class="btn btn-light position-absolute start-0 ms-2 d-lg-none" onclick="toggleSidebar()">☰</button>
        <a class="navbar-brand fw-bold" href="#">G-Scores</a>
    </div>
</nav>

    <div class="d-flex">
        <!-- Sidebar -->
        
        <div class="sidebar pt-3 mt-30" id="sidebar">
            <h4 class="fw-bold px-3 auto">Menu</h4>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'fw-bold' : '' }}">Dashboard</a>
            <a href="{{ route('search-scores') }}" class="{{ request()->routeIs('search-scores') ? 'fw-bold' : '' }}">Search Scores</a>
            <a href="#" class="{{ request()->routeIs('reports') ? 'fw-bold' : '' }}">Reports</a>
            <a href="#" class="{{ request()->routeIs('settings') ? 'fw-bold' : '' }}">Settings</a>
        </div>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleSidebar() {
            let sidebar = document.getElementById("sidebar");
            if (sidebar.style.width === "250px") {
                sidebar.style.width = "0";
                sidebar.style.padding = "0";
            } else {
                sidebar.style.width = "250px";
                sidebar.style.padding = "20px";
            }
        }
        document.addEventListener("DOMContentLoaded", function () {
        let menuButton = document.getElementById("menuButton");
        let sidebar = document.getElementById("sidebar");

        menuButton.addEventListener("click", function () {
            sidebar.classList.toggle("open"); // Thêm hoặc xóa class "open" cho sidebar
        });
    });
    </script>
 @yield('scripts')
</body>
</html>
