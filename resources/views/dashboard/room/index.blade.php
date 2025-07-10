@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | Kamar</title>
@endsection

@section('content')
<style>
    :root {
        --primary-color: #3b82f6;
        --primary-dark: #2563eb;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --gray-900: #111827;
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        --border-radius: 0.75rem;
        --border-radius-sm: 0.5rem;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background-color: var(--gray-50);
        color: var(--gray-800);
        line-height: 1.6;
    }

    /* Page Header Styles */
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: var(--border-radius);
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.1;
    }

    .page-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .page-header .subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-top: 0.5rem;
        position: relative;
        z-index: 1;
    }

    /* Button Styles */
    .btn-modern {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius-sm);
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;
    }

    .btn-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-modern:hover::before {
        left: 100%;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .btn-success {
        background: var(--success-color);
        color: white;
    }

    .btn-success:hover {
        background: #059669;
        transform: scale(1.05);
        color: white;
    }

    .btn-warning {
        background: var(--warning-color);
        color: white;
    }

    .btn-warning:hover {
        background: #d97706;
        transform: scale(1.05);
        color: white;
    }

    .btn-danger {
        background: var(--danger-color);
        color: white;
    }

    .btn-danger:hover {
        background: #dc2626;
        transform: scale(1.05);
        color: white;
    }

    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
    }

    /* Card Styles */
    .modern-card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-md);
        border: 1px solid var(--gray-200);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .modern-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-2px);
    }

    .card-header-modern {
        background: linear-gradient(135deg, var(--gray-50), white);
        padding: 1.5rem;
        border-bottom: 1px solid var(--gray-200);
    }

    .card-header-modern h5 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--gray-800);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .stats-badge {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 600;
        box-shadow: var(--shadow-sm);
    }

    /* Table Styles */
    .modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .modern-table thead th {
        background: var(--gray-50);
        color: var(--gray-700);
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 1rem;
        border-bottom: 2px solid var(--gray-200);
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .modern-table tbody tr {
        background: white;
        transition: all 0.2s ease;
    }

    .modern-table tbody tr:hover {
        background: var(--gray-50);
        transform: scale(1.01);
        box-shadow: var(--shadow-md);
    }

    .modern-table td {
        padding: 1rem;
        border-bottom: 1px solid var(--gray-200);
        vertical-align: middle;
    }

    .modern-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Status Badge Styles */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .status-badge::before {
        content: '';
        width: 0.5rem;
        height: 0.5rem;
        border-radius: 50%;
        background: currentColor;
    }

    .status-available {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .status-booked {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .status-maintenance {
        background: rgba(107, 114, 128, 0.1);
        color: var(--gray-600);
    }

    /* Animation Styles */
    .fade-in-row {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInRow 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    @keyframes fadeInRow {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .slide-in-alert {
        animation: slideInAlert 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes slideInAlert {
        from {
            opacity: 0;
            transform: translateX(-100%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Alert Styles */
    .modern-alert {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.25rem;
        border-radius: var(--border-radius-sm);
        border-left: 4px solid;
        margin-bottom: 1.5rem;
        box-shadow: var(--shadow-sm);
    }

    .alert-success {
        background: rgba(16, 185, 129, 0.05);
        border-left-color: var(--success-color);
        color: #065f46;
    }

    .alert-icon {
        font-size: 1.25rem;
    }

    /* Action Button Group */
    .action-group {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .action-btn {
        width: 2.5rem;
        height: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: var(--border-radius-sm);
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        font-size: 0.875rem;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Modal Styles */
    .modern-modal .modal-content {
        border: none;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-xl);
        overflow: hidden;
    }

    .modern-modal .modal-header {
        background: linear-gradient(135deg, var(--danger-color), #dc2626);
        color: white;
        padding: 1.5rem;
        border-bottom: none;
    }

    .modern-modal .modal-title {
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .modern-modal .modal-body {
        padding: 2rem;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .modern-modal .modal-footer {
        padding: 1.5rem;
        background: var(--gray-50);
        border-top: 1px solid var(--gray-200);
    }

    /* Price Formatting */
    .price-display {
        font-weight: 600;
        color: var(--success-color);
        font-family: 'JetBrains Mono', monospace;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .modern-table {
            font-size: 0.875rem;
        }

        .modern-table td,
        .modern-table th {
            padding: 0.75rem 0.5rem;
        }

        .action-group {
            flex-direction: column;
            gap: 0.25rem;
        }
    }

    /* Loading State */
    .loading-skeleton {
        background: linear-gradient(90deg, var(--gray-200) 25%, var(--gray-100) 50%, var(--gray-200) 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% {
            background-position: 200% 0;
        }

        100% {
            background-position: -200% 0;
        }
    }
</style>

<div class="container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1><i class="fas fa-bed me-3"></i>Manajemen Kamar</h1>
                <p class="subtitle mb-0">Kelola data kamar hotel dengan mudah dan efisien</p>
            </div>
            <a href="room/create" class="btn-modern btn-primary">
                <i class="fas fa-plus"></i>
                <span>Tambah Kamar</span>
            </a>
        </div>
    </div>

    <!-- Success Alert -->
    @if (session()->has('success'))
    <div class="modern-alert alert-success slide-in-alert">
        <i class="fas fa-check-circle alert-icon"></i>
        <div>
            <strong>Berhasil!</strong> {{ session('success') }}
        </div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Main Content Card -->
    <div class="modern-card">
        <div class="card-header-modern">
            <h5>
                <i class="fas fa-table"></i>
                Data Kamar
                <span class="stats-badge">{{ $room->count() }} Total</span>
            </h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="modern-table" id="myTable">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="8%">ID</th>
                            <th width="12%">No. Kamar</th>
                            <th width="15%">Tipe</th>
                            <th width="12%">Status</th>
                            <th width="10%">Kapasitas</th>
                            <th width="15%">Harga/Hari</th>
                            <th width="23%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($room as $r)
                        <tr class="fade-in-row" style="animation-delay: {{ $loop->index * 0.05 }}s;">
                            <td>
                                <div class="fw-bold text-muted">{{ $no++ }}</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $r->id }}</span>
                            </td>
                            <td>
                                <div class="fw-bold">{{ $r->no }}</div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-door-open text-primary"></i>
                                    <span class="fw-medium">{{ $r->type->name }}</span>
                                </div>
                            </td>
                            <td>
                                <span
                                    class="status-badge status-{{ strtolower($r->status->name) == 'available' ? 'available' : (strtolower($r->status->name) == 'booked' ? 'booked' : 'maintenance') }}">
                                    {{ $r->status->name }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fas fa-users text-muted"></i>
                                    <span class="fw-medium">{{ $r->capacity }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="price-display">Rp {{ number_format($r->price, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <div class="action-group">
                                    <a href="room/{{ $r->id }}/edit" class="action-btn btn-success" title="Edit Kamar"
                                        data-bs-toggle="tooltip">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/dashboard/data/room/{{ $r->no }}" class="action-btn btn-warning"
                                        title="Lihat Detail" data-bs-toggle="tooltip">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="action-btn btn-danger" title="Hapus Kamar" data-bs-toggle="modal"
                                        data-bs-target="#deletemodal-{{ $r->id }}" data-bs-toggle="tooltip">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Enhanced Delete Modal -->
                        <div class="modal fade modern-modal" id="deletemodal-{{ $r->id }}" tabindex="-1"
                            aria-labelledby="deletemodalLabel-{{ $r->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deletemodalLabel-{{ $r->id }}">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            Konfirmasi Penghapusan
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center mb-3">
                                            <i class="fas fa-bed text-danger" style="font-size: 3rem;"></i>
                                        </div>
                                        <p class="text-center mb-3">
                                            Apakah Anda yakin ingin menghapus kamar berikut?
                                        </p>
                                        <div class="bg-light p-3 rounded">
                                            <div class="row">
                                                <div class="col-6"><strong>No. Kamar:</strong></div>
                                                <div class="col-6">{{ $r->no }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><strong>ID:</strong></div>
                                                <div class="col-6">{{ $r->id }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6"><strong>Tipe:</strong></div>
                                                <div class="col-6">{{ $r->type->name }}</div>
                                            </div>
                                        </div>
                                        <div class="alert alert-warning mt-3 mb-0">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            <small>Tindakan ini tidak dapat dibatalkan!</small>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                                            <i class="fas fa-times me-2"></i>Batal
                                        </button>
                                        <form action="/dashboard/data/room/{{ $r->id }}/delete" method="post"
                                            class="d-inline">
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fas fa-trash-alt me-2"></i>Ya, Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Enhanced fade-in animation for table rows
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in-row').forEach(row => {
            row.style.animationPlayState = 'paused';
            observer.observe(row);
        });

        // Add loading state simulation (optional)
        const table = document.getElementById('myTable');
        if (table) {
            table.addEventListener('click', function(e) {
                if (e.target.closest('.action-btn')) {
                    const btn = e.target.closest('.action-btn');
                    const originalContent = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    btn.disabled = true;

                    // Restore after 1 second (remove this in production)
                    setTimeout(() => {
                        btn.innerHTML = originalContent;
                        btn.disabled = false;
                    }, 1000);
                }
            });
        }
    });

    // Enhanced modal animations
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('show.bs.modal', function() {
            this.querySelector('.modal-dialog').style.transform = 'scale(0.8)';
            this.querySelector('.modal-dialog').style.opacity = '0';

            setTimeout(() => {
                this.querySelector('.modal-dialog').style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                this.querySelector('.modal-dialog').style.transform = 'scale(1)';
                this.querySelector('.modal-dialog').style.opacity = '1';
            }, 10);
        });
    });
</script>
@endsection
