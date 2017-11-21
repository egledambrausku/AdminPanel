@extends('layouts.base')

@section('content')

    <h2>Kompanijos redagavimas</h2>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
        <br/>
    @endif

    {!! Form::open(array('url' => 'admin/companies/' . $company->id, 'method' => 'put', 'files' => true)) !!}
    Pavadinimas: <br>
    {!! Form::text('name', $company->name) !!} <br><br>
    Adresas: <br>
    {!! Form::text('address', $company->address) !!} <br><br>
    Logotipas: <br>
    {!! Form::file('logo') !!} <br><br>

    {!! Form::submit('Saugoti') !!}
    {!! Form::close() !!}



@stop