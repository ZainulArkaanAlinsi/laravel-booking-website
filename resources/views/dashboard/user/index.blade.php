@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | My Dashboard</title>
@endsection
@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold text-primary">Welcome, {{ auth()->user()->Customer->name ?? auth()->user()->username }}</h2>
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
</div>
@endsection
