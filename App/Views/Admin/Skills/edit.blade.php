
@extends('Admin.index')
@section('content')

    <form action="Admin/EditMe/Skills/update" method="post" class="ui form">
        <input type="hidden" name="id" value="{{ $skills['id'] }}">
        <div class=" fields">
            <div class="sixteen wide field">
                <h4> My Skills : </h4>
                <textarea name="skills" id="skillsTextarea" >
                     {{ $skills['text'] }}
                </textarea>
                <input type="submit" class="ui fluid blue button" value="Update This Block">
            </div>
        </div>
    </form>

@endsection

@section('right-bar')
    <h4>preview : </h4>
    <div class="skills-preview">
        <pre>
            <code class="language-php" id="skillsPreview">
                {{ $skills['text'] }}
            </code>
        </pre>
    </div>
@endsection