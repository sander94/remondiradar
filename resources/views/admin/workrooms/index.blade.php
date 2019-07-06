@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Töökodade list</h2>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p> {{ $message }} </p>
                            </div>
                        @endif
                        <table style="width: 100%;">
                            <tr style="font-weight: bold;">
                                <td style="width: 40%;">
                                    Töökoja nimi
                                </td>
                                <td>
                                    Vaatamisi
                                </td>
                                <td>Avaldatud</td>
                                <td>Kinnitatud</td>
                                <td>
                                    Halda
                                </td>
                            </tr>
                            @foreach ($workrooms as $workroom)
                                <tr>
                                    <td>
                                        <a href="{{ route('workrooms.edit', $workroom->id) }}">
                                            {{ $workroom->brand_name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $workroom->view_count }}
                                    </td>


                                    <td>@if( $workroom->is_active > 0) <i class="fas fa-check"
                                                                          style="color: green;"> </i>@endif</td>
                                    <td>@if( $workroom->is_verified > 0) <i class="fas fa-check"
                                                                            style="color: green;"> </i>@endif</td>
                                    <td>
                                        <a href="{{ route('workrooms.edit', $workroom->id) }}" class="btn btn-primary">
                                            Muuda </a>

                                    </td>
                                </tr>
                            @endforeach

                        </table>


                        <div style="margin-top: 30px"><p><a href="{{ route('workrooms.create') }}"
                                                            class="btn btn-xs btn-success">Lisa uus töökoda</a></p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! $workrooms->links() !!}



@endsection
