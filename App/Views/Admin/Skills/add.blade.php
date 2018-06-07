@extends('Admin.index')
@section('content')
    <form action="Admin/EditMe/Skills/Insert" method="post" class="ui form">
        <div class=" fields">
            <div class="sixteen wide field">
                <h4> My Skills : </h4>
                <textarea name="skills" id="skillsTextarea" >
                    {{ old('text') }}
                </textarea>
                <input type="submit" class="ui fluid blue button" value="Add My Skills">
            </div>
        </div>
    </form>
@endsection

@section('right-bar')
    <h4>preview : </h4>
    <div class="skills-preview">
        <pre>
            <code class="language-php" id="skillsPreview">
                    {{ old('text') }}
            </code>
        </pre>
    </div>
@endsection