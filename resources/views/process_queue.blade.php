@extends('layouts.app')

@section('content')
    <form action="{{ route('process.queue') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Processar Fila</button>
    </form>
@endsection
