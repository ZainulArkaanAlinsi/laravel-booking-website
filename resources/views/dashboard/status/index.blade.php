@extends('dashboard.layout.main')
@section('title')
    <title>Dashboard | Status</title>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="container">
        <div class="col-md-6">
            <div class="d-flex align-items-center mb-4">
                <h1 class="h2 mb-0 text-dark-1000">Status</h1>
                <a href="status/create" class="btn btn-sm shadow border ms-2 mt-1 p-2"><i class="fas fa-plus"></i></a>
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
        <div class="card border-0 shadow">
            <div class="card-header">
                <h5>Total data {{ $p }}</h5>
            </div>
            <div class="card-body">
                <div class="col-md-auto">
                    <table class="table table-sm table-bordered table-responsive" id="myTable">
                        <thead class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Id</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($status as $r)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->code }}</td>
                                    <td>{{ $r->info }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="status/{{ $r->id }}/edit" class="me-2 btn btn-success"><i
                                                    class="fas fa-pen"></i></a>
                                            <a class="me-2 btn btn-danger" href="#" data-toggle="modal"
                                                data-target="#deletemodal"><i class="fas fa-trash"></i></a>
                                        </div>

                                    </td>
                                </tr>
                                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this
                                                    data?</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select "Delete" below if you are ready to delete.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <form action="/dashboard/data/status/{{ $r->id }}/delete"
                                                    method="post">
                                                    @csrf
                                                    <button class="btn btn-danger me-1" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        <tfoot class="table-secondary">
                            <tr>
                                <th width="5%">#</th>
                                <th width="5%">Id</th>
                                <th>Name</th>
                                <th>Code</th>
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
