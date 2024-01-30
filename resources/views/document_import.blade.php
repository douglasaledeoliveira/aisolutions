@extends('layouts.app')

@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('document.import') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="jsonFile">Escolha um arquivo JSON para importar:</label>
        <input type="file" id="jsonFile" name="jsonFile" accept=".json" class="form-control">
        <br />
        <button type="submit" class="btn btn-primary">Importar JSON</button>
    </form>
@endsection
