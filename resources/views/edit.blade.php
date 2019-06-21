<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/markdown/css/editormd.min.css')}}" />
    <style>
        .prettyprinted{
            width: 800px;
        }
    </style>
</head>
<body>
<div style="margin:0 auto;">


        <form method="post" action="{{route('admin.gethtml')}}"  >
            <div id="doc-content">
                {!!$content!!}
            </div>
            @include('markdown::decode',['editors'=>['doc-content']])
        </form>
    </div>

</body>
</html>
