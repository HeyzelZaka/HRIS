@extends('layouts.hrd')

@section('content')
<div class="card-container-hrd shadow-sm">
    <table class="hris-table-admin">
        <thead>
            <tr>
                <th class="w-24">ID</th>
                <th>Nama</th>
                <th>Shift</th>
                <th>Jam</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Jokowi</td>
                <td>Pagi</td>
                <td>15:00-17:00</td>
                <td>
                    <div class="flex justify-center gap-2">
                        <button class="btn-action btn-reject shadow-sm">
                            <i class="fas fa-times"></i>
                        </button>
                        <button class="btn-action btn-approve shadow-sm">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Prabowo</td>
                <td>Siang</td>
                <td>19:00-20:00</td>
                <td>
                    <div class="flex justify-center gap-2">
                        <button class="btn-action btn-reject shadow-sm">
                            <i class="fas fa-times"></i>
                        </button>
                        <button class="btn-action btn-approve shadow-sm">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection