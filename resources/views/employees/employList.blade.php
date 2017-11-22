@extends('layouts.base')
@section('content')

    <div class="list">
        <h1>Darbuotojų sąrašas:</h1>

        <a href="{{ url('admin/employees/create') }}">Pridėti naujus darbuotojus</a>

        @foreach ($employees as $employee)
            <div class="mt-30">
                <a href="{{url('admin/employees/' . $employee->id)}}">
                    <h4>{{ $employee->name }}</h4>
                </a>
                ( {{$employee->company->name}} )
                <br>

                <form action="{{url('admin/employees/' . $employee->id . '/edit')}}">
                    <input type="submit" value="Redaguoti"/>
                </form>

                <form action="{{ url('admin/employees/' . $employee->id) }}"
                      method="post" onsubmit="return confirm('Ar tikrai norite ištrinti?')">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <input type="submit" value="Trinti"/>
                </form>
            </div>
        @endforeach

    </div>
@stop