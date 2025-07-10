@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | My Dashboard</title>
@endsection

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold text-primary">
        Welcome, {{ auth()->user()->Customer->name ?? auth()->user()->username }}
    </h2>

    {{-- DASHBOARD USER BIASA --}}
    @if(isset($totalPaid) && isset($myBookings))
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow border-0 p-3">
                <h5 class="mb-2 text-success">Total Paid</h5>
                <div class="fs-3 fw-bold">IDR {{ number_format($totalPaid) }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow border-0 p-3">
                <h5 class="mb-2 text-info">Recent Bookings</h5>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($myBookings as $b)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $b->room->no ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($b->check_in)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($b->check_out)->format('d M Y') }}</td>
                                <td>
                                    <span
                                        class="badge @if($b->status=='Reservation') bg-primary @elseif($b->status=='Paid') bg-success @else bg-secondary @endif">
                                        {{ $b->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No bookings yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- DASHBOARD ADMIN --}}
    @elseif(isset($transactionCount) && isset($totalAmount))
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow border-0 p-3">
                <h5 class="mb-2 text-info">Admin Dashboard</h5>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Down Payment
                        <span class="fw-bold">IDR {{ number_format($totalAmount) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Reservation
                        <span class="fw-bold">{{ $transactionCount }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Bulan Ini ({{ $months[count($months)-1] ?? '-' }})
                        <span class="fw-bold">IDR {{ number_format($monthCount ?? 0) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Persentase Kenaikan/Bulan Lalu
                        <span class="fw-bold">{{ number_format($percentage, 2) }}%</span>
                    </li>
                </ul>
                {{-- Tambahkan grafik/statistik lain sesuai kebutuhan --}}
                <div class="mt-4">
                    <h6 class="fw-bold">Ringkasan Bulanan:</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Total DP</th>
                                    <th>Jumlah Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($months as $i => $bln)
                                <tr>
                                    <td>{{ $bln }}</td>
                                    <td>IDR {{ number_format($count[$bln] ?? 0) }}</td>
                                    <td>{{ $qty[$i] ?? 0 }}</td>
                                </tr>
                                @endforeach
                                @if(empty($months))
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No data</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-warning">
        Data dashboard tidak tersedia.
    </div>
    @endif
</div>
@endsection
