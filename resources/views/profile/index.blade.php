@extends('kerangka.master')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Admin</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-primary mx-1"
                                                            href="{{ route('profile.edit', $user->id) }}">Update</a>
                                                        <button type="button" class="btn btn-danger mx-1"
                                                            onclick="deleteUser('{{ $user->id }}')">Delete</button>
                                                        <form id="delete-form-{{ $user->id }}"
                                                            action="{{ route('profile.destroy', $user->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                id="delete-btn-{{ $user->id }}"></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
    @include('include.scripct')
@endsection
