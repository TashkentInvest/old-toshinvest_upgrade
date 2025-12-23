<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', __('panel.site_title')) | Tashkent Invest CRM</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/dark_logo.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/dark_logo.png') }}">

<!-- Preconnect -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- FontAwesome 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- Government Unified CSS - Main Styling -->
<link rel="stylesheet" href="{{ asset('assets/frontend/css/government-unified.css') }}">

<!-- Admin CRM Specific Styles -->
<style>
/* ============================================
   ADMIN CRM LAYOUT - Using Gov Unified Styles
   ============================================ */

/* Layout Structure */
.admin-layout {
    display: flex;
    min-height: 100vh;
    background: var(--gov-bg-light);
}

/* Sidebar */
.admin-sidebar {
    width: 280px;
    background: linear-gradient(180deg, var(--gov-primary-darkest) 0%, var(--gov-primary-darker) 100%);
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    z-index: 100;
    display: flex;
    flex-direction: column;
    transition: var(--gov-transition);
    box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
}

.admin-sidebar.collapsed {
    width: 80px;
}

.sidebar-header {
    padding: 24px 20px;
    border-bottom: 1px solid var(--gov-border-light);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.sidebar-logo {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
}

.sidebar-logo img {
    height: 40px;
    width: auto;
}

.sidebar-logo-text {
    color: var(--gov-text-white);
    font-weight: 700;
    font-size: 1.1rem;
}

.sidebar-toggle {
    background: rgba(255, 255, 255, 0.1);
    border: none;
    color: var(--gov-text-light);
    width: 32px;
    height: 32px;
    border-radius: var(--gov-radius-sm);
    cursor: pointer;
    transition: var(--gov-transition);
}

.sidebar-toggle:hover {
    background: rgba(255, 255, 255, 0.2);
    color: var(--gov-text-white);
}

/* Sidebar Navigation */
.sidebar-nav {
    flex: 1;
    overflow-y: auto;
    padding: 20px 0;
}

.nav-section {
    margin-bottom: 24px;
}

.nav-section-title {
    padding: 0 20px;
    margin-bottom: 10px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    color: var(--gov-text-subtle);
}

.nav-item {
    display: block;
    padding: 12px 20px;
    color: var(--gov-text-light);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: var(--gov-transition);
    border-left: 3px solid transparent;
    display: flex;
    align-items: center;
    gap: 12px;
}

.nav-item:hover {
    background: rgba(255, 255, 255, 0.05);
    color: var(--gov-text-white);
}

.nav-item.active {
    background: rgba(201, 169, 98, 0.1);
    border-left-color: var(--gov-gold);
    color: var(--gov-gold);
}

.nav-item i {
    width: 20px;
    font-size: 16px;
}

.nav-badge {
    margin-left: auto;
    background: var(--gov-gold);
    color: var(--gov-primary-darkest);
    font-size: 11px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 10px;
}

.nav-badge.danger {
    background: var(--gov-error);
    color: white;
}

/* Sidebar Footer */
.sidebar-footer {
    padding: 16px 20px;
    border-top: 1px solid var(--gov-border-light);
    display: flex;
    align-items: center;
    gap: 12px;
}

.sidebar-user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--gov-gold);
}

.sidebar-user-info {
    flex: 1;
    min-width: 0;
}

.sidebar-user-name {
    color: var(--gov-text-white);
    font-weight: 600;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.sidebar-user-role {
    color: var(--gov-text-muted);
    font-size: 12px;
}

.sidebar-logout {
    color: var(--gov-text-muted);
    font-size: 18px;
    cursor: pointer;
    transition: var(--gov-transition);
}

.sidebar-logout:hover {
    color: var(--gov-error);
}

/* Main Content Area */
.admin-main {
    flex: 1;
    margin-left: 280px;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    transition: var(--gov-transition);
}

.admin-sidebar.collapsed + .admin-main {
    margin-left: 80px;
}

/* Admin Header */
.admin-header {
    background: white;
    padding: 16px 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: var(--gov-shadow-sm);
    position: sticky;
    top: 0;
    z-index: 50;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 20px;
}

.header-search {
    position: relative;
}

.header-search input {
    width: 300px;
    padding: 10px 16px 10px 44px;
    border: 2px solid var(--gov-border);
    border-radius: var(--gov-radius);
    font-size: 14px;
    transition: var(--gov-transition);
}

.header-search input:focus {
    outline: none;
    border-color: var(--gov-primary);
    box-shadow: 0 0 0 3px rgba(45, 74, 111, 0.1);
}

.header-search i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gov-text-muted);
}

.header-right {
    display: flex;
    align-items: center;
    gap: 16px;
}

.header-action {
    position: relative;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--gov-bg-light);
    border-radius: var(--gov-radius);
    color: var(--gov-text-body);
    cursor: pointer;
    transition: var(--gov-transition);
}

.header-action:hover {
    background: var(--gov-primary);
    color: white;
}

.header-action .badge {
    position: absolute;
    top: -4px;
    right: -4px;
    width: 18px;
    height: 18px;
    background: var(--gov-error);
    color: white;
    font-size: 10px;
    font-weight: 700;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.header-lang {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 14px;
    background: var(--gov-bg-light);
    border-radius: var(--gov-radius);
    cursor: pointer;
    transition: var(--gov-transition);
}

.header-lang:hover {
    background: var(--gov-bg-gray);
}

.header-lang img {
    width: 22px;
    height: 16px;
    object-fit: cover;
    border-radius: 2px;
}

.header-user {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 6px 12px 6px 6px;
    background: var(--gov-bg-light);
    border-radius: 50px;
    cursor: pointer;
    transition: var(--gov-transition);
}

.header-user:hover {
    background: var(--gov-bg-gray);
}

.header-user img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
}

.header-user-name {
    font-weight: 600;
    font-size: 14px;
    color: var(--gov-text-dark);
}

/* Admin Content */
.admin-content {
    flex: 1;
    padding: 30px;
}

/* Admin Footer */
.admin-footer {
    padding: 20px 30px;
    background: white;
    border-top: 1px solid var(--gov-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.admin-footer p {
    margin: 0;
    font-size: 14px;
    color: var(--gov-text-body);
}

.admin-footer a {
    color: var(--gov-primary);
    text-decoration: none;
    font-weight: 600;
}

/* Admin Cards - Extending Gov Cards */
.admin-card {
    background: white;
    border-radius: var(--gov-radius);
    border: 1px solid var(--gov-border);
    box-shadow: var(--gov-shadow-sm);
    margin-bottom: 24px;
}

.admin-card-header {
    padding: 20px 24px;
    border-bottom: 1px solid var(--gov-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
}

.admin-card-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--gov-text-dark);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.admin-card-title i {
    color: var(--gov-primary);
}

.admin-card-body {
    padding: 24px;
}

/* Admin Stats Row */
.admin-stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-bottom: 30px;
}

.admin-stat-card {
    background: white;
    border-radius: var(--gov-radius);
    padding: 24px;
    border-left: 4px solid var(--gov-primary);
    box-shadow: var(--gov-shadow-sm);
    transition: var(--gov-transition);
}

.admin-stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--gov-shadow-md);
}

.admin-stat-card.success { border-left-color: var(--gov-success); }
.admin-stat-card.warning { border-left-color: var(--gov-warning); }
.admin-stat-card.danger { border-left-color: var(--gov-error); }

.admin-stat-icon {
    width: 50px;
    height: 50px;
    background: rgba(45, 74, 111, 0.1);
    border-radius: var(--gov-radius);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    color: var(--gov-primary);
    margin-bottom: 16px;
}

.admin-stat-card.success .admin-stat-icon { background: rgba(40, 167, 69, 0.1); color: var(--gov-success); }
.admin-stat-card.warning .admin-stat-icon { background: rgba(255, 193, 7, 0.1); color: var(--gov-warning); }
.admin-stat-card.danger .admin-stat-icon { background: rgba(220, 53, 69, 0.1); color: var(--gov-error); }

.admin-stat-value {
    font-size: 32px;
    font-weight: 800;
    color: var(--gov-text-dark);
    margin-bottom: 6px;
}

.admin-stat-label {
    font-size: 14px;
    color: var(--gov-text-body);
    font-weight: 500;
}

/* Admin Alerts */
.admin-alert {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 16px 20px;
    border-radius: var(--gov-radius);
    margin-bottom: 20px;
    border-left: 4px solid;
}

.admin-alert.success {
    background: #d1fae5;
    border-left-color: var(--gov-success);
    color: #065f46;
}

.admin-alert.danger {
    background: #fee2e2;
    border-left-color: var(--gov-error);
    color: #991b1b;
}

.admin-alert.warning {
    background: #fffbeb;
    border-left-color: var(--gov-warning);
    color: #92400e;
}

.admin-alert.info {
    background: #eff6ff;
    border-left-color: var(--gov-primary);
    color: var(--gov-primary);
}

/* Page Header */
.admin-page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 30px;
    gap: 20px;
    flex-wrap: wrap;
}

.admin-page-header .page-header-content {
    flex: 1;
}

.admin-page-header h1 {
    font-size: 28px;
    font-weight: 800;
    color: var(--gov-text-dark);
    margin: 0 0 8px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.admin-page-header h1 i {
    color: var(--gov-primary);
}

.admin-page-header p {
    font-size: 15px;
    color: var(--gov-text-body);
    margin: 0;
}

.admin-page-title {
    font-size: 28px;
    font-weight: 800;
    color: var(--gov-text-dark);
    margin: 0 0 8px;
}

.admin-page-subtitle {
    font-size: 15px;
    color: var(--gov-text-body);
    margin: 0;
}

/* Gov Form Controls */
.gov-form-group {
    margin-bottom: 20px;
}

.gov-form-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: var(--gov-text-dark);
    font-size: 0.9rem;
}

.gov-form-label .required {
    color: var(--gov-error);
}

.gov-form-control {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid var(--gov-border);
    border-radius: var(--gov-radius);
    font-size: 14px;
    color: var(--gov-text-dark);
    background: white;
    transition: var(--gov-transition);
}

.gov-form-control:focus {
    outline: none;
    border-color: var(--gov-primary);
    box-shadow: 0 0 0 3px rgba(45, 74, 111, 0.1);
}

.gov-form-control::placeholder {
    color: var(--gov-text-muted);
}

textarea.gov-form-control {
    min-height: 100px;
    resize: vertical;
}

select.gov-form-control {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23666' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    padding-right: 44px;
}

.gov-form-error {
    color: var(--gov-error);
    font-size: 0.85rem;
    margin-top: 6px;
}

/* Gov Input/Label Aliases */
.gov-input {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid var(--gov-border);
    border-radius: var(--gov-radius);
    font-size: 14px;
    color: var(--gov-text-dark);
    background: white;
    transition: var(--gov-transition);
}

.gov-input:focus {
    outline: none;
    border-color: var(--gov-primary);
    box-shadow: 0 0 0 3px rgba(45, 74, 111, 0.1);
}

.gov-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: var(--gov-text-dark);
    font-size: 0.9rem;
}

.gov-label.required::after {
    content: ' *';
    color: var(--gov-error);
}

.gov-info-box {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 18px;
    background: #eff6ff;
    border-radius: var(--gov-radius);
    color: var(--gov-primary);
    font-size: 0.9rem;
}

.gov-info-box i {
    font-size: 1.1rem;
}

.gov-form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.gov-error-message {
    color: var(--gov-error);
    font-size: 0.85rem;
    margin-top: 6px;
    display: block;
}

.gov-table-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: var(--gov-radius);
    border: 1px solid var(--gov-border);
    background: white;
    cursor: pointer;
    transition: var(--gov-transition);
}

.gov-table-btn:hover {
    background: var(--gov-bg-light);
}

.gov-table-btn-secondary {
    background: white;
}

.gov-table-btn-primary {
    background: var(--gov-primary);
    color: white;
    border-color: var(--gov-primary);
}

/* Gov Select */
.gov-select {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid var(--gov-border);
    border-radius: var(--gov-radius);
    font-size: 14px;
    color: var(--gov-text-dark);
    background: white;
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23666' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    padding-right: 44px;
    transition: var(--gov-transition);
}

.gov-select:focus {
    outline: none;
    border-color: var(--gov-primary);
    box-shadow: 0 0 0 3px rgba(45, 74, 111, 0.1);
}

/* Gov Pagination */
.gov-pagination {
    padding: 16px 24px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
}

.gov-pagination nav {
    width: 100%;
}

.gov-pagination .pagination {
    display: flex;
    justify-content: center;
    gap: 4px;
    list-style: none;
    padding: 0;
    margin: 0;
}

.gov-pagination .page-link {
    padding: 8px 14px;
    border: 1px solid var(--gov-border);
    border-radius: var(--gov-radius-sm);
    color: var(--gov-text-dark);
    text-decoration: none;
    font-size: 14px;
    transition: var(--gov-transition);
}

.gov-pagination .page-link:hover {
    background: var(--gov-bg-light);
    border-color: var(--gov-primary);
}

.gov-pagination .page-item.active .page-link {
    background: var(--gov-primary);
    border-color: var(--gov-primary);
    color: white;
}

.gov-pagination .page-item.disabled .page-link {
    color: var(--gov-text-muted);
    pointer-events: none;
}

/* Gov Buttons */
.gov-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 24px;
    border: none;
    border-radius: var(--gov-radius);
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: var(--gov-transition);
}

.gov-btn-primary {
    background: var(--gov-primary);
    color: white;
}

.gov-btn-primary:hover {
    background: var(--gov-primary-dark);
    color: white;
}

.gov-btn-secondary {
    background: var(--gov-bg-gray);
    color: var(--gov-text-dark);
}

.gov-btn-secondary:hover {
    background: #d1d5db;
    color: var(--gov-text-dark);
}

.gov-btn-success {
    background: var(--gov-success);
    color: white;
}

.gov-btn-success:hover {
    background: #219a52;
    color: white;
}

.gov-btn-warning {
    background: #f39c12;
    color: white;
}

.gov-btn-warning:hover {
    background: #e67e22;
    color: white;
}

.gov-btn-danger {
    background: var(--gov-error);
    color: white;
}

.gov-btn-danger:hover {
    background: #c0392b;
    color: white;
}

.gov-btn-sm {
    padding: 8px 16px;
    font-size: 13px;
}

/* Gov Table */
.gov-table-container {
    overflow-x: auto;
}

.gov-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.gov-table thead {
    background: var(--gov-bg-light);
}

.gov-table th {
    padding: 14px 16px;
    text-align: left;
    font-weight: 700;
    color: var(--gov-text-dark);
    border-bottom: 2px solid var(--gov-border);
    white-space: nowrap;
}

.gov-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--gov-border);
    color: var(--gov-text-body);
}

.gov-table tbody tr:hover {
    background: var(--gov-bg-light);
}

.gov-table tbody tr:last-child td {
    border-bottom: none;
}

/* Dropdown Menu */
.dropdown {
    position: relative;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    border-radius: var(--gov-radius);
    box-shadow: var(--gov-shadow-lg);
    border: 1px solid var(--gov-border);
    min-width: 200px;
    padding: 8px 0;
    display: none;
    z-index: 1000;
}

.dropdown.active .dropdown-menu {
    display: block;
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    color: var(--gov-text-dark);
    text-decoration: none;
    font-size: 14px;
    transition: var(--gov-transition);
}

.dropdown-item:hover {
    background: var(--gov-bg-light);
    color: var(--gov-primary);
}

.dropdown-divider {
    height: 1px;
    background: var(--gov-border);
    margin: 8px 0;
}

/* Responsive */
@media (max-width: 1200px) {
    .admin-stats-row {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .admin-sidebar {
        transform: translateX(-100%);
    }

    .admin-sidebar.open {
        transform: translateX(0);
    }

    .admin-main {
        margin-left: 0;
    }

    .header-search input {
        width: 200px;
    }
}

@media (max-width: 768px) {
    .admin-stats-row {
        grid-template-columns: 1fr;
    }

    .admin-content {
        padding: 20px;
    }

    .header-search {
        display: none;
    }

    .header-user-name {
        display: none;
    }
}

/* Animation */
.fade-in {
    animation: fadeIn 0.3s ease-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

@yield('styles')
