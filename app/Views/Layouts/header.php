<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lola Nena's Sisigan - <?= isset($title) ? $title : 'Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #dc3545 0%, #c82333 100%);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
        }
        .sidebar .nav-link {
            color: #ffffff;
            padding: 15px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2);
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.2em;
        }
        .brand-section {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        .brand-section h4 {
            color: #ffffff;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .brand-section p {
            color: #f8d7da;
            font-size: 0.9em;
            margin: 0;
        }
        .main-content {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #dc3545;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
        }
        .stat-card {
            border-left: 4px solid #dc3545;
        }
        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .table thead {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand-section">
            <h4>Lola Nena's Sisigan</h4>
            <p>SISIGuraduhin kong masasarapan ka!</p>
        </div>
        <div class="position-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                
                <?php if(session()->get('role') == 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos(uri_string(), 'users') !== false) ? 'active' : '' ?>" href="<?= base_url('users') ?>">
                        <i class="bi bi-people"></i> User Management
                    </a>
                </li>
                <?php endif; ?>
                
                <li class="nav-item">
                    <a class="nav-link <?= (strpos(uri_string(), 'products') !== false) ? 'active' : '' ?>" href="<?= base_url('products') ?>">
                        <i class="bi bi-box-seam"></i> Product Management
                    </a>
                </li>
            </ul>
            <hr style="border-color: rgba(255,255,255,0.2);">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('logout') ?>">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            </ul>
            <div class="mt-4 text-center">
                <small class="text-white-50">Logged in as:</small>
                <p class="text-white mb-0"><strong><?= session()->get('full_name') ?></strong></p>
                <small class="text-white-50">(<?= ucfirst(session()->get('role')) ?>)</small>
            </div>
        </div>
    </div>

    <main class="main-content">