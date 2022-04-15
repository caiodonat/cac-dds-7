@extends('telai')

@section('content')
    <table>
        <thead>
            <tr>ID</tr><tr>Dia inicio</tr><tr>Dia Fim</tr><tr>Turma</tr><tr>instrutor</tr><tr>Bloco</tr>
        </thead>
        
        <tbody>
            @foreach($sala as)

                <tr>
                    <td>{{ $sala->id }}</td>
                    <td>{{ $sala->dia_inicio }}</td>
                    <td>{{ $sala->dia_fim }}</td>
                    <td>{{ $sala->turma_id }}</td>
                    <td>{{ $sala->instrutor }}</td>
                    <td>{{ $sala->bloco }}</td>

                </tr>

            @endforeach
        </tbody>

    </table>
@endsection