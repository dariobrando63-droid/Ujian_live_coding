@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Pegawai</h3>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmpModal">+ Tambah Pegawai</button>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Tgl Bergabung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $key => $e)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $e->name }}</td>
                    <td><span class="badge bg-secondary">{{ $e->department->name ?? '-' }}</span></td>
                    <td>{{ $e->position }}</td>
                    <td>Rp {{ number_format($e->salary, 0, ',', '.') }}</td>
                    <td>{{ $e->joined_at }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editEmpModal{{ $e->id }}">Edit</button>
                        <form action="{{ route('employees.destroy', $e->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus pegawai ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Edit Pegawai di luar tabel -->
@foreach($employees as $e)
<div class="modal fade" id="editEmpModal{{ $e->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('employees.update', $e->id) }}" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label class="form-label">Nama Pegawai</label>
                    <input type="text" name="name" class="form-control" value="{{ $e->name }}" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Departemen</label>
                    <select name="department_id" class="form-select" required>
                        @foreach($departments as $d)
                            <option value="{{ $d->id }}" {{ $e->department_id == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="position" class="form-control" value="{{ $e->position }}" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Gaji</label>
                    <input type="number" name="salary" class="form-control" value="{{ (int)$e->salary }}" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Tgl Bergabung</label>
                    <input type="date" name="joined_at" class="form-control" value="{{ $e->joined_at }}" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endforeach

<!-- Modal Tambah Pegawai -->
<div class="modal fade" id="addEmpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('employees.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label class="form-label">Nama Pegawai</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Departemen</label>
                    <select name="department_id" class="form-select" required>
                        <option value="">-- Pilih Departemen --</option>
                        @foreach($departments as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="position" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Gaji</label>
                    <input type="number" name="salary" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Tgl Bergabung</label>
                    <input type="date" name="joined_at" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection