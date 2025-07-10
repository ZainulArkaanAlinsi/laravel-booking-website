@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | Buat Status</title>
@endsection

@section('content')
<style>
    :root {
        --primary-color: #3b82f6;
        --primary-dark: #2563eb;
        --primary-light: #dbeafe;
        --success-color: #10b981;
        --success-light: #d1fae5;
        --warning-color: #f59e0b;
        --warning-light: #fef3c7;
        --danger-color: #ef4444;
        --danger-light: #fee2e2;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-400: #9ca3af;
        --gray-500: #6b7280;
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
        --border-radius-lg: 1rem;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, var(--gray-50) 0%, #e0e7ff 100%);
        color: var(--gray-800);
        line-height: 1.6;
        min-height: 100vh;
    }

    /* Page Header Styles */
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: var(--border-radius-lg);
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-xl);
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
        font-size: 2.25rem;
        font-weight: 700;
        margin: 0;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .page-header .subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-top: 0.5rem;
        position: relative;
        z-index: 1;
    }

    /* Modern Card Styles */
    .modern-card {
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-xl);
        border: 1px solid var(--gray-200);
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .modern-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--success-color), var(--warning-color));
    }

    .modern-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    }

    .card-header-modern {
        background: linear-gradient(135deg, var(--gray-50), white);
        padding: 2rem;
        border-bottom: 1px solid var(--gray-200);
        position: relative;
    }

    .card-header-modern h4 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--gray-800);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .header-icon {
        width: 3rem;
        height: 3rem;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        box-shadow: var(--shadow-md);
    }

    /* Form Styles */
    .form-container {
        padding: 2.5rem;
    }

    .form-group {
        margin-bottom: 2rem;
        position: relative;
    }

    .form-label-modern {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 0.75rem;
        font-size: 0.95rem;
    }

    .label-icon {
        width: 1.25rem;
        height: 1.25rem;
        background: var(--primary-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 0.75rem;
    }

    .required-indicator {
        color: var(--danger-color);
        font-weight: 700;
        margin-left: 0.25rem;
    }

    .form-control-modern {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid var(--gray-200);
        border-radius: var(--border-radius-sm);
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: white;
        position: relative;
    }

    .form-control-modern:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px var(--primary-light);
        transform: translateY(-1px);
    }

    .form-control-modern:hover {
        border-color: var(--gray-300);
    }

    .form-control-modern::placeholder {
        color: var(--gray-400);
        font-style: italic;
    }

    /* Input with Icon */
    .input-with-icon {
        position: relative;
    }

    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
        font-size: 1.1rem;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .form-control-modern:focus+.input-icon {
        color: var(--primary-color);
    }

    /* Textarea Styles */
    .textarea-modern {
        resize: vertical;
        min-height: 120px;
        font-family: inherit;
    }

    /* Helper Text */
    .helper-text {
        font-size: 0.875rem;
        color: var(--gray-500);
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    /* Button Styles */
    .btn-modern {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 2rem;
        border-radius: var(--border-radius-sm);
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        min-width: 140px;
        justify-content: center;
    }

    .btn-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s;
    }

    .btn-modern:hover::before {
        left: 100%;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        box-shadow: var(--shadow-md);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .btn-primary-modern:active {
        transform: translateY(0);
    }

    /* Loading State */
    .btn-loading {
        pointer-events: none;
        opacity: 0.8;
    }

    .btn-loading .btn-text {
        opacity: 0;
    }

    .btn-loading .loading-spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .loading-spinner {
        width: 1.25rem;
        height: 1.25rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 1s ease-in-out infinite;
        display: none;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 1rem;
        align-items: center;
        margin-top: 2.5rem;
        padding-top: 2rem;
        border-top: 1px solid var(--gray-200);
    }

    /* Success/Error States */
    .form-feedback {
        padding: 1rem 1.25rem;
        border-radius: var(--border-radius-sm);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 500;
        animation: slideInAlert 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .feedback-success {
        background: var(--success-light);
        color: #065f46;
        border-left: 4px solid var(--success-color);
    }

    .feedback-error {
        background: var(--danger-light);
        color: #991b1b;
        border-left: 4px solid var(--danger-color);
    }

    @keyframes slideInAlert {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }

        .page-header h1 {
            font-size: 1.875rem;
        }

        .form-container {
            padding: 1.5rem;
        }

        .card-header-modern {
            padding: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }
    }

    /* Animation for form elements */
    .form-group {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .form-group:nth-child(1) {
        animation-delay: 0.1s;
    }

    .form-group:nth-child(2) {
        animation-delay: 0.2s;
    }

    .form-group:nth-child(3) {
        animation-delay: 0.3s;
    }

    .form-group:nth-child(4) {
        animation-delay: 0.4s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Focus management */
    .form-control-modern:invalid {
        border-color: var(--danger-color);
    }

    .form-control-modern:valid {
        border-color: var(--success-color);
    }

    /* Character counter */
    .char-counter {
        font-size: 0.8rem;
        color: var(--gray-400);
        text-align: right;
        margin-top: 0.25rem;
    }
</style>

<div class="container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header">
        <h1>
            <i class="fas fa-plus-circle"></i>
            Buat Status Kamar
        </h1>
        <p class="subtitle mb-0">Tambahkan status baru untuk sistem manajemen kamar hotel</p>
    </div>

    <!-- Success/Error Feedback -->
    @if (session()->has('success'))
    <div class="form-feedback feedback-success">
        <i class="fas fa-check-circle"></i>
        <div>
            <strong>Berhasil!</strong> {{ session('success') }}
        </div>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="form-feedback feedback-error">
        <i class="fas fa-exclamation-circle"></i>
        <div>
            <strong>Error!</strong> {{ session('error') }}
        </div>
    </div>
    @endif

    <!-- Main Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <div class="modern-card">
                <div class="card-header-modern">
                    <h4>
                        <div class="header-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        Informasi Status Kamar
                    </h4>
                </div>

                <div class="form-container">
                    <form action="/dashboard/data/status/post" method="POST" enctype="multipart/form-data"
                        id="statusForm">
                        @csrf

                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name" class="form-label-modern">
                                <div class="label-icon">
                                    <i class="fas fa-tag"></i>
                                </div>
                                Nama Status
                                <span class="required-indicator">*</span>
                            </label>
                            <div class="input-with-icon">
                                <input type="text" class="form-control-modern" id="name" name="name"
                                    placeholder="Contoh: Available, Booked, Maintenance" required maxlength="50">
                                <i class="fas fa-tag input-icon"></i>
                            </div>
                            <div class="helper-text">
                                <i class="fas fa-info-circle"></i>
                                Masukkan nama status yang akan digunakan untuk mengidentifikasi kondisi kamar
                            </div>
                            <div class="char-counter">
                                <span id="nameCounter">0</span>/50 karakter
                            </div>
                        </div>

                        <!-- Code Field -->
                        <div class="form-group">
                            <label for="code" class="form-label-modern">
                                <div class="label-icon">
                                    <i class="fas fa-code"></i>
                                </div>
                                Kode Status
                                <span class="required-indicator">*</span>
                            </label>
                            <div class="input-with-icon">
                                <input type="text" class="form-control-modern" id="code" name="code"
                                    placeholder="Contoh: A, B, M" required maxlength="5"
                                    style="text-transform: uppercase;">
                                <i class="fas fa-code input-icon"></i>
                            </div>
                            <div class="helper-text">
                                <i class="fas fa-info-circle"></i>
                                Kode singkat untuk status (maksimal 5 karakter, akan otomatis menjadi huruf besar)
                            </div>
                            <div class="char-counter">
                                <span id="codeCounter">0</span>/5 karakter
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="form-group">
                            <label for="info" class="form-label-modern">
                                <div class="label-icon">
                                    <i class="fas fa-align-left"></i>
                                </div>
                                Deskripsi
                                <span class="required-indicator">*</span>
                            </label>
                            <textarea
                                placeholder="Jelaskan secara detail tentang status ini, kapan digunakan, dan kondisi kamar yang sesuai..."
                                name="info" id="info" rows="4" class="form-control-modern textarea-modern" required
                                maxlength="500"></textarea>
                            <div class="helper-text">
                                <i class="fas fa-info-circle"></i>
                                Berikan penjelasan yang jelas tentang kapan status ini digunakan
                            </div>
                            <div class="char-counter">
                                <span id="infoCounter">0</span>/500 karakter
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button class="btn-modern btn-primary-modern" type="submit" id="submitBtn">
                                <span class="btn-text">
                                    <i class="fas fa-save"></i>
                                    Simpan Status
                                </span>
                                <div class="loading-spinner"></div>
                            </button>
                            <a href="/dashboard/data/status" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('statusForm');
        const submitBtn = document.getElementById('submitBtn');
        const nameInput = document.getElementById('name');
        const codeInput = document.getElementById('code');
        const infoInput = document.getElementById('info');

        // Character counters
        const nameCounter = document.getElementById('nameCounter');
        const codeCounter = document.getElementById('codeCounter');
        const infoCounter = document.getElementById('infoCounter');

        // Update character counters
        function updateCounter(input, counter) {
            counter.textContent = input.value.length;

            // Change color based on length
            const maxLength = input.getAttribute('maxlength');
            const percentage = (input.value.length / maxLength) * 100;

            if (percentage > 90) {
                counter.style.color = 'var(--danger-color)';
            } else if (percentage > 70) {
                counter.style.color = 'var(--warning-color)';
            } else {
                counter.style.color = 'var(--gray-400)';
            }
        }

        // Add event listeners for character counting
        nameInput.addEventListener('input', () => updateCounter(nameInput, nameCounter));
        codeInput.addEventListener('input', () => updateCounter(codeInput, codeCounter));
        infoInput.addEventListener('input', () => updateCounter(infoInput, infoCounter));

        // Auto-uppercase for code field
        codeInput.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Form submission with loading state
        form.addEventListener('submit', function(e) {
            // Add loading state
            submitBtn.classList.add('btn-loading');
            submitBtn.querySelector('.loading-spinner').style.display = 'block';

            // Disable form elements
            const formElements = form.querySelectorAll('input, textarea, button');
            formElements.forEach(element => {
                element.disabled = true;
            });
        });

        // Real-time validation
        function validateField(field) {
            const value = field.value.trim();

            if (field.hasAttribute('required') && !value) {
                field.style.borderColor = 'var(--danger-color)';
                return false;
            } else if (value) {
                field.style.borderColor = 'var(--success-color)';
                return true;
            } else {
                field.style.borderColor = 'var(--gray-200)';
                return true;
            }
        }

        // Add validation listeners
        [nameInput, codeInput, infoInput].forEach(field => {
            field.addEventListener('blur', () => validateField(field));
            field.addEventListener('input', () => {
                if (field.value.trim()) {
                    validateField(field);
                }
            });
        });

        // Enhanced focus management
        const inputs = form.querySelectorAll('input, textarea');
        inputs.forEach((input, index) => {
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && input.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    const nextInput = inputs[index + 1];
                    if (nextInput) {
                        nextInput.focus();
                    } else {
                        submitBtn.focus();
                    }
                }
            });
        });

        // Auto-save to localStorage (optional)
        function saveToLocalStorage() {
            const formData = {
                name: nameInput.value,
                code: codeInput.value,
                info: infoInput.value
            };
            localStorage.setItem('statusFormData', JSON.stringify(formData));
        }

        function loadFromLocalStorage() {
            const savedData = localStorage.getItem('statusFormData');
            if (savedData) {
                const formData = JSON.parse(savedData);
                nameInput.value = formData.name || '';
                codeInput.value = formData.code || '';
                infoInput.value = formData.info || '';

                // Update counters
                updateCounter(nameInput, nameCounter);
                updateCounter(codeInput, codeCounter);
                updateCounter(infoInput, infoCounter);
            }
        }

        // Load saved data on page load
        loadFromLocalStorage();

        // Save data on input
        [nameInput, codeInput, infoInput].forEach(input => {
            input.addEventListener('input', saveToLocalStorage);
        });

        // Clear saved data on successful submission
        form.addEventListener('submit', function() {
            setTimeout(() => {
                localStorage.removeItem('statusFormData');
            }, 1000);
        });
    });
</script>
@endsection
