@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard</title>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-4">
                <h1 class="h2 mb-0 text-dark-1000">Type</h1>
                <a href="type/create" class="btn btn-sm shadow border ms-2 mt-1 p-2"><i class="fas fa-plus"></i></a>
            </div>
        </div>

        <div class="col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
        </div>

    </div>

    <!-- Content Row -->
    <div class="container">
        <div class="card shadow border-0">
            <div class="card-header">
                <h5>Total data {{ $p }}</h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">
                    <table class="table table-sm table-bordered table-responsive" id="myTable">
                        <thead class="table-secondary">
                            {{-- <thead> --}}
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Id</th>
                                <th>Name</th>
                                {{-- <th>Code</th> --}}
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($type as $r)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->name }}</td>
                                    {{-- <td>{{ $r->code }}</td> --}}
                                    <td>{{ $r->info }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="get" action="/dashboard/data/type/{{ $r->id }}/edit">
                                                <button class="btn btn-success" type="submit"><i
                                                        class="fas fa-pen"></i></button>
                                            </form>

                                            <form action="/dashboard/data/type/delete" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $r->id }}">
                                                <button class="ms-2 btn btn-danger" type="submit"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                        {{-- <a href="#" class="btn btn-warning"><i class="fas fa-eye"></i></i></i> </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Id</th>
                                <th>Name</th>
                                {{-- <th>Code</th> --}}
                                <th width="48%">Desc</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- End of Main Content -->
