@extends('layouts.hrd')

@section('content')
<div class="card-container-hrd shadow-sm">
    <table class="hris-table-admin">
        <thead>
            <tr>
                <th class="w-24">ID</th>
                <th>Nama</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Jokowi</td>
                <td>
                    <div class="flex justify-center gap-6 items-center">
                        <button class="btn-action btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <div class="flex gap-2">
                            <button class="btn-action btn-reject">
                                <i class="fas fa-times"></i>
                            </button>
                            <button class="btn-action btn-approve">
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Prabowo</td>
                <td>
                    <div class="flex justify-center gap-6 items-center">
                        <button class="btn-action btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <div class="flex gap-2">
                            <button class="btn-action btn-reject">
                                <i class="fas fa-times"></i>
                            </button>
                            <button class="btn-action btn-approve">
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection