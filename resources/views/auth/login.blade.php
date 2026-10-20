@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center fw-bold">LOGIN SYSTEM</div>
            <div class="card-body">
                <form action="{{ url('/login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Email Admin</label>
                        <input type="email" name="email" class="form-control" value="admin@hrd.com" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Masuk Langsung</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection