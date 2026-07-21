<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS — CV. Proats Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --sidebar-w: 270px;
            --sidebar-collapsed-w: 72px;
            --primary: #d4af37;
            --primary-hv: #b89628;
            --primary-glow: rgba(212,175,55,0.25);
            --bg-page: #f8fafc;
            --bg-sidebar: #ffffff;
            --bg-sidebar-2: #f8fafc;
            --sidebar-border: #e9eef5;
            --text-sidebar: #475569;
            --text-sidebar-active: #0f172a;
            --card-shadow: 0 4px 24px rgba(0,0,0,0.06);
            --radius: 14px;
            --header-h: 68px;
            --sidebar-transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-page);
            color: #1e293b;
            margin: 0;
        }

        /* ═══════════════════════════
           SIDEBAR (CLEAN WHITE THEME)
        ═══════════════════════════ */
        #sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e9eef5;
            box-shadow: 2px 0 20px rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: width var(--sidebar-transition), transform 0.3s ease;
            overflow: hidden;
            min-height: 0;
        }

        /* ── Collapsed State ── */
        #sidebar.collapsed {
            width: var(--sidebar-collapsed-w);
        }

        #sidebar.collapsed .sidebar-brand-text,
        #sidebar.collapsed .nav-label,
        #sidebar.collapsed .nav-item a span:not(.nav-icon),
        #sidebar.collapsed .sidebar-footer a span:not(.nav-icon),
        #sidebar.collapsed .sidebar-footer a .sidebar-link-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
            white-space: nowrap;
            pointer-events: none;
        }

        #sidebar.collapsed .nav-item a,
        #sidebar.collapsed .sidebar-footer a {
            justify-content: center;
            padding: 11px 0;
        }

        #sidebar.collapsed .nav-item a::before {
            display: none;
        }

        #sidebar.collapsed .nav-icon {
            margin: 0 auto;
        }

        /* Tooltip on collapsed items */
        #sidebar.collapsed .nav-item a {
            position: relative;
        }

        #sidebar.collapsed .nav-item {
            position: relative;
        }

        #sidebar.collapsed .nav-item a[data-tooltip]:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            left: calc(var(--sidebar-collapsed-w) - 4px);
            top: 50%;
            transform: translateY(-50%);
            background: #0f172a;
            color: #ffffff;
            font-size: 0.78rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            white-space: nowrap;
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
            border: 1px solid #334155;
            pointer-events: none;
            z-index: 9999;
        }

        #sidebar.collapsed .nav-item a[data-tooltip]:hover::before {
            content: '';
            position: absolute;
            left: calc(var(--sidebar-collapsed-w) - 8px);
            top: 50%;
            transform: translateY(-50%);
            border: 5px solid transparent;
            border-right-color: #0f172a;
            z-index: 9999;
            pointer-events: none;
        }

        /* Override active::before for tooltip state */
        #sidebar.collapsed .nav-item.active > a::before {
            display: none;
        }

        /* subtle light overlay */
        #sidebar::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(212,175,55,0.04) 0%, transparent 60%);
            pointer-events: none;
        }

        /* ── Sidebar Brand & Toggle Button ── */
        .sidebar-toggle-btn {
            position: absolute;
            top: 50%;
            right: 16px;
            transform: translateY(-50%);
            width: 32px; height: 32px;
            border-radius: 8px;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            display: flex; align-items: center; justify-content: center;
            color: #475569;
            cursor: pointer;
            z-index: 1001;
            transition: all var(--sidebar-transition);
            font-size: 0.75rem;
        }

        .sidebar-toggle-btn:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: #000000;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.35);
        }

        #sidebar.collapsed .sidebar-brand {
            justify-content: center;
            padding: 22px 10px;
        }

        #sidebar.collapsed .sidebar-toggle-btn {
            position: relative;
            top: auto; right: auto;
            transform: rotate(180deg);
            margin: 0 auto;
            width: 34px; height: 34px;
        }

        #sidebar.collapsed .sidebar-brand-icon {
            display: none;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 24px 24px 20px;
            border-bottom: 1px solid #f1f5f9;
            position: relative;
            transition: padding var(--sidebar-transition);
        }

        .sidebar-brand-icon {
            width: 42px; height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #d4af37, #b89628);
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 8px 20px rgba(212,175,55,0.35);
            flex-shrink: 0;
        }

        .sidebar-brand-icon i { color: #000; font-size: 1.1rem; }

        .sidebar-brand-text {
            transition: opacity var(--sidebar-transition), width var(--sidebar-transition);
            white-space: nowrap;
            overflow: hidden;
        }

        .sidebar-brand-text h5 {
            color: #0f172a;
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: 0.3px;
            margin: 0;
        }

        .sidebar-brand-text small {
            color: #94a3b8;
            font-size: 0.7rem;
            letter-spacing: 0.4px;
        }

        /* ── Nav Section Labels ── */
        .nav-label {
            padding: 14px 24px 6px;
            font-size: 0.65rem;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #94a3b8;
            white-space: nowrap;
            overflow: hidden;
            flex-shrink: 0;
            transition: opacity var(--sidebar-transition), padding var(--sidebar-transition);
        }

        /* ── Nav Items ── */
        .sidebar-nav {
            flex: 1 1 0;
            min-height: 0;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 6px 14px 10px;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
        }

        .sidebar-nav::-webkit-scrollbar { width: 3px; }
        .sidebar-nav::-webkit-scrollbar-track { background: transparent; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 99px; }

        .nav-item { list-style: none; margin-bottom: 3px; }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 10px;
            color: #475569;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.2s ease, padding var(--sidebar-transition), justify-content var(--sidebar-transition);
            position: relative;
            white-space: nowrap;
            overflow: hidden;
        }

        .nav-item a .nav-link-text {
            overflow: hidden;
            transition: opacity var(--sidebar-transition), max-width var(--sidebar-transition);
            max-width: 200px;
        }

        #sidebar.collapsed .nav-item a .nav-link-text {
            opacity: 0;
            max-width: 0;
        }

        .nav-item a .nav-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.82rem;
            background: #f1f5f9;
            color: #64748b;
            transition: all 0.2s;
            flex-shrink: 0;
        }

        .nav-item a:hover {
            color: #0f172a;
            background: rgba(212, 175, 55, 0.08);
        }

        .nav-item a:hover .nav-icon {
            background: rgba(212,175,55,0.2);
            color: #b89628;
        }

        .nav-item.active > a {
            color: #0f172a;
            background: linear-gradient(90deg, rgba(212,175,55,0.18), rgba(212,175,55,0.04));
            border: 1px solid rgba(212,175,55,0.3);
            font-weight: 700;
        }

        .nav-item.active > a .nav-icon {
            background: linear-gradient(135deg, #d4af37, #b89628);
            color: #000000;
            box-shadow: 0 4px 12px rgba(212,175,55,0.35);
        }

        /* Active left indicator */
        .nav-item.active > a::before {
            content: '';
            position: absolute;
            left: 0; top: 8px; bottom: 8px;
            width: 3px;
            border-radius: 0 3px 3px 0;
            background: linear-gradient(to bottom, #d4af37, #b89628);
        }

        /* ── Sidebar Footer ── */
        .sidebar-footer {
            padding: 16px 14px;
            border-top: 1px solid #f1f5f9;
        }

        .sidebar-footer a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 10px;
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.2s;
        }

        .sidebar-footer a:hover {
            color: #dc2626;
            background: rgba(239, 68, 68, 0.06);
        }

        .sidebar-footer a .nav-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.82rem;
            background: #f1f5f9;
            color: #64748b;
            transition: all 0.2s;
        }

        .sidebar-footer a:hover .nav-icon {
            background: rgba(239, 68, 68, 0.12);
            color: #dc2626;
        }

        /* ═══════════════════════════
           MAIN AREA
        ═══════════════════════════ */
        #main-wrapper {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: margin-left var(--sidebar-transition);
        }

        #main-wrapper.collapsed {
            margin-left: var(--sidebar-collapsed-w);
        }

        /* ── Top Header ── */
        .top-header {
            height: var(--header-h);
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 900;
            gap: 16px;
        }

        /* Breadcrumb area */
        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .page-badge {
            background: var(--primary-glow);
            border: 1px solid rgba(99,102,241,0.2);
            color: var(--primary);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 6px;
        }

        /* Header right */
        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 7px 14px 7px 8px;
        }

        .user-avatar {
            width: 30px; height: 30px;
            border-radius: 8px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .user-info { line-height: 1.2; }
        .user-info span { display: block; }
        .user-name { font-size: 0.8rem; font-weight: 700; color: #1e293b; }
        .user-role { font-size: 0.68rem; color: #94a3b8; }

        .btn-preview {
            display: flex; align-items: center; gap: 6px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            color: #64748b;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 8px 14px;
            text-decoration: none;
            transition: all 0.2s;
            font-family: inherit;
            cursor: pointer;
        }

        .btn-preview:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-glow);
        }

        .btn-logout {
            display: flex; align-items: center; gap: 6px;
            background: rgba(239,68,68,0.06);
            border: 1px solid rgba(239,68,68,0.15);
            border-radius: 10px;
            color: #ef4444;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 8px 14px;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-logout:hover {
            background: rgba(239,68,68,0.12);
            border-color: rgba(239,68,68,0.3);
            color: #dc2626;
        }

        /* ── Page Content ── */
        .page-content {
            padding: 32px;
            flex: 1;
        }

        /* ── Alerts ── */
        .alert-floating {
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 24px;
            font-size: 0.875rem;
            font-weight: 500;
            animation: alertIn 0.35s ease;
        }

        @keyframes alertIn {
            from { opacity: 0; transform: translateY(-12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .alert-floating.success {
            background: rgba(16,185,129,0.08);
            border: 1px solid rgba(16,185,129,0.2);
            color: #059669;
        }

        .alert-floating.error {
            background: rgba(239,68,68,0.08);
            border: 1px solid rgba(239,68,68,0.2);
            color: #dc2626;
        }

        .alert-floating .alert-icon {
            width: 34px; height: 34px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .alert-floating.success .alert-icon { background: rgba(16,185,129,0.12); }
        .alert-floating.error   .alert-icon { background: rgba(239,68,68,0.12); }

        .alert-close {
            margin-left: auto;
            background: none; border: none;
            opacity: 0.4; cursor: pointer;
            font-size: 0.9rem; color: inherit;
            transition: opacity 0.2s;
        }
        .alert-close:hover { opacity: 1; }

        /* ── Global Card / Table Overrides ── */
        .cms-card {
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--card-shadow);
            border: 1px solid #e9eef5;
            overflow: hidden;
        }

        .cms-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
            border-bottom: 1px solid #f1f5f9;
        }

        .cms-card-header h5 {
            font-size: 0.95rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cms-card-header h5 .card-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            background: var(--primary-glow);
            display: flex; align-items: center; justify-content: center;
            color: var(--primary);
            font-size: 0.8rem;
        }

        .cms-card-body { padding: 24px; }

        /* Forms */
        .cms-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 7px;
        }

        .cms-input {
            width: 100%;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.9rem;
            font-family: inherit;
            color: #1e293b;
            background: #fafbff;
            transition: all 0.2s;
            outline: none;
        }

        .cms-input:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
        }

        .cms-input::placeholder { color: #cbd5e1; }

        .cms-form-hint {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 5px;
        }

        /* Buttons */
        .btn-cms-primary {
            display: inline-flex; align-items: center; gap: 7px;
            background: linear-gradient(135deg, #d4af37, #b89628);
            border: none;
            border-radius: 10px;
            color: #000000;
            font-size: 0.875rem;
            font-weight: 700;
            padding: 10px 20px;
            cursor: pointer;
            font-family: inherit;
            text-decoration: none;
            transition: all 0.25s;
            box-shadow: 0 4px 14px rgba(212,175,55,0.3);
        }

        .btn-cms-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(212,175,55,0.45);
            color: #000000;
        }

        .btn-cms-secondary {
            display: inline-flex; align-items: center; gap: 7px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 10px 20px;
            cursor: pointer;
            font-family: inherit;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-cms-secondary:hover {
            border-color: #94a3b8;
            color: #1e293b;
            background: #f1f5f9;
        }

        .btn-cms-danger {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(239,68,68,0.06);
            border: 1.5px solid rgba(239,68,68,0.15);
            border-radius: 8px;
            color: #ef4444;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 7px 14px;
            cursor: pointer;
            font-family: inherit;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-cms-danger:hover {
            background: rgba(239,68,68,0.12);
            border-color: rgba(239,68,68,0.3);
            color: #dc2626;
        }

        .btn-cms-outline {
            display: inline-flex; align-items: center; gap: 6px;
            background: var(--primary-glow);
            border: 1.5px solid rgba(99,102,241,0.2);
            border-radius: 8px;
            color: var(--primary);
            font-size: 0.8rem;
            font-weight: 600;
            padding: 7px 14px;
            cursor: pointer;
            font-family: inherit;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-cms-outline:hover {
            background: rgba(99,102,241,0.15);
            border-color: rgba(99,102,241,0.4);
            color: var(--primary-hv);
        }

        /* Tables */
        .cms-table { width: 100%; border-collapse: collapse; }
        .cms-table thead tr {
            background: #f8fafc;
            border-bottom: 2px solid #e9eef5;
        }
        .cms-table th {
            padding: 12px 18px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #64748b;
            text-align: left;
        }
        .cms-table td {
            padding: 14px 18px;
            font-size: 0.875rem;
            color: #374151;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .cms-table tbody tr:hover { background: #fafbff; }
        .cms-table tbody tr:last-child td { border-bottom: none; }

        /* Bootstrap overrides to match cms-* classes */
        .card {
            border: 1px solid #e9eef5 !important;
            border-radius: var(--radius) !important;
            box-shadow: var(--card-shadow) !important;
        }
        .card-header {
            background: #fff !important;
            border-bottom: 1px solid #f1f5f9 !important;
            padding: 18px 24px !important;
        }
        .form-control, .form-select {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.9rem;
            font-family: inherit;
            background: #fafbff;
            transition: all 0.2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.1);
        }
        .form-label {
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 7px;
        }
        .form-text { font-size: 0.75rem; color: #94a3b8; }
        .table > :not(caption) > * > * { padding: 14px 18px; }
        .table th {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #64748b;
            background: #f8fafc;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #8b5cf6) !important;
            border: none !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
            padding: 9px 18px !important;
            font-size: 0.875rem !important;
            box-shadow: 0 4px 14px rgba(99,102,241,0.3) !important;
            transition: all 0.25s !important;
        }
        .btn-primary:hover {
            transform: translateY(-1px) !important;
            box-shadow: 0 8px 20px rgba(99,102,241,0.4) !important;
        }
        .btn-outline-primary {
            border-color: rgba(99,102,241,0.3) !important;
            color: var(--primary) !important;
            background: var(--primary-glow) !important;
            border-radius: 8px !important;
            font-size: 0.8rem !important;
            font-weight: 600 !important;
        }
        .btn-outline-primary:hover {
            background: rgba(99,102,241,0.15) !important;
            color: var(--primary-hv) !important;
        }
        .btn-outline-secondary {
            border-color: #e2e8f0 !important;
            color: #64748b !important;
            background: #f8fafc !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
        }
        .btn-outline-danger {
            background: rgba(239,68,68,0.06) !important;
            border-color: rgba(239,68,68,0.15) !important;
            color: #ef4444 !important;
            border-radius: 8px !important;
            font-size: 0.8rem !important;
            font-weight: 600 !important;
        }
        .btn-outline-danger:hover {
            background: rgba(239,68,68,0.12) !important;
            border-color: rgba(239,68,68,0.3) !important;
            color: #dc2626 !important;
        }
        .badge { font-weight: 600; letter-spacing: 0.3px; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.12); border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(0,0,0,0.2); }

        /* Responsive */
        @media (max-width: 992px) {
            #sidebar { transform: translateX(-100%); width: var(--sidebar-w) !important; }
            #sidebar.open { transform: translateX(0); }
            #main-wrapper { margin-left: 0 !important; }
            .sidebar-toggle-btn { display: none; }
        }
    </style>
</head>
<body>

<!-- ══════════════ SIDEBAR ══════════════ -->
<aside id="sidebar">
    <!-- Brand -->
    <div class="sidebar-brand">
        <div class="sidebar-brand-icon" style="background: transparent; box-shadow: none; width: auto; height: 46px;">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Proats Logo" style="height: 46px; object-fit: contain;">
        </div>
        <div class="sidebar-brand-text">
            <h5>PROATS CMS</h5>
            <small>Admin Panel v2.0</small>
        </div>
        <!-- Toggle collapse button -->
        <button class="sidebar-toggle-btn" id="desktopToggle" title="Tutup/Buka Sidebar">
            <i class="fas fa-chevron-left"></i>
        </button>
    </div>

    <!-- Nav -->
    <nav class="sidebar-nav">
        <div class="nav-label">Menu Utama</div>
        <ul class="list-unstyled mb-0">
            <li class="nav-item {{ Request::is('cms-admin/dashboard') ? 'active' : '' }}">
                <a href="/cms-admin/dashboard" data-tooltip="Dashboard Overview">
                    <span class="nav-icon"><i class="fas fa-th-large" style="color:#6366f1;"></i></span>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="nav-label" style="margin-top:14px;">Konten Halaman Depan</div>
        <ul class="list-unstyled mb-0">
            <li class="nav-item {{ Request::is('cms-admin/hero') ? 'active' : '' }}">
                <a href="/cms-admin/hero" data-tooltip="Teks & Tombol Hero">
                    <span class="nav-icon"><i class="fas fa-laptop-code" style="color:#38bdf8;"></i></span>
                    <span class="nav-link-text">Teks & Tombol Hero</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('cms-admin/hero-sliders*') ? 'active' : '' }}">
                <a href="/cms-admin/hero-sliders" data-tooltip="Slider Foto Utama">
                    <span class="nav-icon"><i class="fas fa-sliders-h" style="color:#eab308;"></i></span>
                    <span class="nav-link-text">Slider Foto Utama</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('cms-admin/profile') ? 'active' : '' }}">
                <a href="/cms-admin/profile" data-tooltip="Profil Perusahaan">
                    <span class="nav-icon"><i class="fas fa-building" style="color:#a855f7;"></i></span>
                    <span class="nav-link-text">Profil Perusahaan</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('cms-admin/timeline*') ? 'active' : '' }}">
                <a href="/cms-admin/timeline" data-tooltip="Sejarah & Perjalanan">
                    <span class="nav-icon"><i class="fas fa-history" style="color:#ec4899;"></i></span>
                    <span class="nav-link-text">Sejarah & Perjalanan</span>
                </a>
            </li>
        </ul>

        <div class="nav-label" style="margin-top:14px;">Katalog & Layanan</div>
        <ul class="list-unstyled mb-0">
            <li class="nav-item {{ Request::is('cms-admin/products*') ? 'active' : '' }}">
                <a href="/cms-admin/products" data-tooltip="Katalog Produk">
                    <span class="nav-icon"><i class="fas fa-drum" style="color:#0ea5e9;"></i></span>
                    <span class="nav-link-text">Katalog Produk</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('cms-admin/services*') ? 'active' : '' }}">
                <a href="/cms-admin/services" data-tooltip="Layanan Kami">
                    <span class="nav-icon"><i class="fas fa-concierge-bell" style="color:#10b981;"></i></span>
                    <span class="nav-link-text">Layanan Kami</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('cms-admin/programs*') ? 'active' : '' }}">
                <a href="/cms-admin/programs" data-tooltip="Program & Edukasi">
                    <span class="nav-icon"><i class="fas fa-graduation-cap" style="color:#f59e0b;"></i></span>
                    <span class="nav-link-text">Program & Edukasi</span>
                </a>
            </li>
        </ul>

        <div class="nav-label" style="margin-top:14px;">Galeri & Kontak</div>
        <ul class="list-unstyled mb-0">
            <li class="nav-item {{ Request::is('cms-admin/documentations*') ? 'active' : '' }}">
                <a href="/cms-admin/documentations" data-tooltip="Galeri Dokumentasi">
                    <span class="nav-icon"><i class="fas fa-camera-retro" style="color:#14b8a6;"></i></span>
                    <span class="nav-link-text">Galeri Dokumentasi</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('cms-admin/contacts') ? 'active' : '' }}">
                <a href="/cms-admin/contacts" data-tooltip="Kontak & Peta">
                    <span class="nav-icon"><i class="fas fa-address-book" style="color:#f97316;"></i></span>
                    <span class="nav-link-text">Kontak & Peta</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Footer / Logout -->
    <div class="sidebar-footer">
        <a href="/" target="_blank" data-tooltip="Lihat Website">
            <span class="nav-icon"><i class="fas fa-globe"></i></span>
            <span class="sidebar-link-text">Lihat Website</span>
        </a>
        <a href="https://catalog.proatsmusiccenter.com/" target="_blank" data-tooltip="Lihat E-Catalog">
            <span class="nav-icon"><i class="fas fa-book-open"></i></span>
            <span class="sidebar-link-text">Lihat E-Catalog</span>
        </a>
        <a href="/cms-admin/logout" style="margin-top:2px;" data-tooltip="Keluar">
            <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span>
            <span class="sidebar-link-text">Keluar</span>
        </a>
    </div>
</aside>

<!-- ══════════════ MAIN ══════════════ -->
<div id="main-wrapper">

    <!-- Top Header -->
    <header class="top-header">
        <div class="header-left">
            <!-- Mobile menu toggle -->
            <button class="btn-preview d-lg-none me-2" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <span class="page-badge"><i class="fas fa-shield-alt me-1"></i> Admin Panel</span>
        </div>

        <div class="header-right">
            <a href="/" target="_blank" class="btn-preview">
                <i class="fas fa-eye"></i>
                <span class="d-none d-sm-inline">Pratinjau</span>
            </a>

            <div class="header-user">
                <div class="user-avatar">
                    {{ strtoupper(substr(session('admin_username', 'A'), 0, 1)) }}
                </div>
                <div class="user-info">
                    <span class="user-name">{{ session('admin_username') }}</span>
                    <span class="user-role">Administrator</span>
                </div>
            </div>

            <a href="/cms-admin/logout" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="d-none d-sm-inline">Keluar</span>
            </a>
        </div>
    </header>

    <!-- Page Body -->
    <main class="page-content">

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="alert-floating success" id="alertSuccess">
                <div class="alert-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>{{ session('success') }}</div>
                <button class="alert-close" onclick="this.closest('.alert-floating').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        {{-- Error Alert --}}
        @if(session('error'))
            <div class="alert-floating error" id="alertError">
                <div class="alert-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div>{{ session('error') }}</div>
                <button class="alert-close" onclick="this.closest('.alert-floating').remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @yield('content')
    </main>
</div>

<!-- Overlay for mobile -->
<div id="sidebarOverlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:999; backdrop-filter:blur(2px);"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const sidebar    = document.getElementById('sidebar');
    const mainWrap   = document.getElementById('main-wrapper');
    const desktopBtn = document.getElementById('desktopToggle');
    const overlay    = document.getElementById('sidebarOverlay');
    const mobileBtn  = document.getElementById('sidebarToggle');

    // ── Desktop collapse / expand ──
    const STORAGE_KEY = 'cms_sidebar_collapsed';

    function setSidebarCollapsed(collapsed) {
        if (collapsed) {
            sidebar.classList.add('collapsed');
            mainWrap.classList.add('collapsed');
        } else {
            sidebar.classList.remove('collapsed');
            mainWrap.classList.remove('collapsed');
        }
        localStorage.setItem(STORAGE_KEY, collapsed ? '1' : '0');
    }

    // Restore saved state
    if (localStorage.getItem(STORAGE_KEY) === '1') {
        setSidebarCollapsed(true);
    }

    if (desktopBtn) {
        desktopBtn.addEventListener('click', () => {
            const isCollapsed = sidebar.classList.contains('collapsed');
            setSidebarCollapsed(!isCollapsed);
        });
    }

    // ── Mobile toggle ──
    if (mobileBtn) {
        mobileBtn.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none';
        });
    }

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.style.display = 'none';
    });

    // ── Auto-dismiss alerts after 4s ──
    document.querySelectorAll('.alert-floating').forEach(el => {
        setTimeout(() => {
            el.style.transition = 'opacity 0.5s, transform 0.5s';
            el.style.opacity = '0';
            el.style.transform = 'translateY(-10px)';
            setTimeout(() => el.remove(), 500);
        }, 4000);
    });
</script>
</body>
</html>
