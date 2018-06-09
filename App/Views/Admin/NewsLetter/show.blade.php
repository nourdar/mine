
@extends('Admin.index')
@section('content')


    <table class="ui olive table skills-form">
            <thead>
            <tr>
                <th>id</th>
                <th>E-mail</th>
                <th>Country</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($results) && is_array($results))
                @foreach($results as $result)
                    <tr>
                        <td>
                            {{ $result['id'] }}
                        </td>
                        <td>
                            {{ $result['email'] }}
                        </td>
                        <td>
                            <img class="flag flag-{{getCountry($result['ip'])['CODE']}}" />
                            {{ getCountry($result['ip'])['NAME'] }}
                        </td>
                        <td>{{ date("Y-m-D h:i",$result['created_at']) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="center aligned">{{ paginate(url('Admin/NewsLetter'),$pages,$currentPage,$limit) }}</td>
                </tr>
            @else
                <tr class="error">
                    <td colspan="6">There is No News Letter Yet</td></tr>
            @endif
            </tbody>
    </table>

@endsection

@section('right-bar')



@endsection