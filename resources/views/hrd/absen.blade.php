@extends('layouts.hrd')

@section('content')
<div class="card-container-hrd">
    <table class="hris-table-admin">
        <thead>
            <tr>
                <th class="w-24">ID</th>
                <th>Nama</th>
                <th>Masuk</th>
                <th>Keluar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Jokowi</td>
                <td>08:00</td>
                <td>15:05</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Prabowo</td>
                <td>08:05</td>
                <td>15:05</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection