<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    body {
        background-color:#9d9dff;
        text-shadow:0 1px 1px  #aeaeff;
        font-family: Helvetica, Ubuntu, Verdana, serif;
    }
    table {
        margin-left:auto;
        margin-right:auto;
        background-color:#9999ff;
        border:2px solid #8080ff;
        color: #6d4eed;
        padding:15px;
    }
    .actions a:link {
        font-size:32px;
        text-decoration:none;
        display:block; 
        line-height: 1.4;
        padding: .33em;
        height: 64px;
        width: 64px;
        box-sizing: border-box;
        border-radius:50%;
        border:2px solid transparent;
        color: #6d4eed;
    }
    .actions a:hover {
        text-shadow:0 1px 60px  #cacaff;
    }
    .actions td{
        padding-top:1em;
        padding-bottom:3em;
        padding-left:15px;
        padding-right:15px;
    }
    .footer {
        padding-top:2em;
    }
    a:link {
        color: #6d4eed;
        text-shadow:0 1px 1px  #aeaeff;
        text-decoration:none;
    }
    h1 {
        text-shadow:0 1px 1px  #c8c8ff;
    }
    </style>
</head>
<body>
    <table class="nes-container ">
        <tr>
            <td colspan="5"><a href="#">I'd rather see this in a browser pal !</a></td>
        </tr>
        <tr>
            <td colspan="5" class="header">
                <p>Hey !</p>
                <h1>How was your week ?</h1>
            </td>
        </tr>
        <tr class="actions">
            <td><a href="{{$feeling->makeLink(5)}}">🤗</a></td>
            <td><a href="{{$feeling->makeLink(4)}}">🙂</a></td>
            <td><a href="{{$feeling->makeLink(3)}}">😶</a></td>
            <td><a href="{{$feeling->makeLink(2)}}">☹️</a></td>
            <td><a href="{{$feeling->makeLink(1)}}">😖</a></td>
        </tr>
        <tr>
            <td colspan="5" class="footer">
                Week {{$feeling->week}} {{$feeling->year}} | <a href="#">Please don't bug me with this shit anymore</a>
            </td>
        </tr>
    </table>
</body>
</html>