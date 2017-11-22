@extends('layouts.base')
@section('content')

    <div class="list">
        <h1>Kompanijos:</h1>

        @foreach ($companies as $company)
            <div class="mt-30">
                <a href="{{ url('admin/companies/' . $company->id) }}">
                    <h4>{{ $company->name }}</h4>
                </a>
                {{ $company->address }} <br>

                <a href="{{url('admin/companies/' . $company->id . '/edit')}}">Redaguoti</a>

                <form action="{{ url('admin/companies/' . $company->id) }}"
                      method="post" onsubmit="return confirm('Ar tikrai norite ištrinti?')">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <input type="submit" value="Trinti"/>
                </form>
            </div>
        @endforeach

        <a href="{{ url('admin/companies/create') }}">
            <h3 class="mt-30">Pridėti naują kompaniją</h3>
        </a>

    </div>
@stop