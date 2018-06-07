
@extends('Admin.index')
@section('content')


<table class="ui olive table skills-form">
    <form action="{{url('Admin/EditMe/Skills/IsShow')}}" method="post" class="ui form ">
        <thead>
            <tr>
                <th>id</th>
                <th>Created at</th>
                <th data-help="if it status is on it will be 1 ">Status</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @if(!empty($skills) && is_array($skills))
        @foreach($skills as $skill)
            <tr>
                <td>
                    @if($skill['id'] == $last)
                        <div class="ui ribbon label">Last Item</div>
                    @endif
                    {{ $skill['id'] }}
                </td>
                <td>{{ $skill['created_at'] }}</td>
                <td>
                    @if($skill['is_show'] === 1)
                        <div class="ui checkbox toggle">
                            <input type="checkbox"  checked name="{{ $skill['id'] }}" value="{{ $skill['id'] }}"/>
                        </div>
                        @else
                            <div class="ui checkbox toggle">
                                <input type="checkbox"  name="{{ $skill['id'] }}" value="{{ $skill['id'] }}" />
                            </div>
                        @endif
                </td>
                <td><a href="#" class="showSkill" data-id="{{ $skill['id'] }}"><i class="fa fa-eye fa-2x"></i></a></td>
                <td><a href="{{ url('Admin/EditMe/Skills/Edit/'.$skill['id']) }}"><i class="fa fa-pen-square fa-2x"></i></a></td>
                <td><a href="{{ url('Admin/EditMe/Skills/Delete/'.$skill['id']) }}"><i class="fa fa-trash fa-2x"></i></a></td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6"><input type="submit" class="ui fluid blue button" value="change Selected Block"></td>
        </tr>
        @else
            <tr class="error"><td colspan="6">There is No Block To Show you can add new block by
                    <a href="{{ url('Admin/EditMe/Skills/Add') }}">clicking here</a>
                </td></tr>
        @endif
        </tbody>
    </form>
</table>

@endsection

@section('right-bar')
    @isset($moreThenOneSelected)
    <div class="ui message warning">
        <div class="header">oops There is a probleme it maybe : </div>
        <p>
            - All blocks Are Disabled<br>
            - There is More Then One Block Selected <br>
            - There is no Block Check Your Table<br>
        </p>
    </div>
    @endisset

    @if($selected['status'] === true)
        <h4>preview for selected block : </h4>
    @endif

    <div class="skills-preview">
        <pre>
            <code class="language-php" id="skill-preview">
                 @if($selected['status'] === true)
                {{ $selected['text'] }}
                @endif
            </code>
        </pre>
    </div>

@endsection