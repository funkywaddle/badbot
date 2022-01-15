@foreach($css as $section)
    .{{$section->category->code}} .header {
        font-weight: bold;
        font-size: 2em;
        margin-top:10px;
        margin-bottom: 5px;
        background-color: black;
        color: white;
        display: block;
        padding-left: 15px;
    }
    .{{$section->category->code}} select{
        background: {{$section->backgroundColor}};
        color: {{$section->textColor}};
    }

    .{{$section->category->code}} button{
        background: {{$section->backgroundColor}};
        color: {{$section->textColor}};
        border: {{$section->borderSize}}px solid {{$section->borderColor}};
    }

    .{{$section->category->code}} button:hover {
        background: {{$section->hoverBackgroundColor}};
        color: {{$section->hoverTextColor}};
        border: {{$section->hoverBorderSize}}px solid {{$section->hoverBorderColor}};
    }
@endforeach
