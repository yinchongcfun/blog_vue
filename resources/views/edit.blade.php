<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>

<form method="post" action="{{route('admin.gethtml')}}">

    <div id="doc-content" style="text-align: center">
        {!!$content!!}
    </div>
    {{--@include('markdown::decode',['editors'=>['doc-content']])--}}
</form>

</body>

<script>
    var testEditor = editormd("test-editormd", {
        width: "90%",
        height: 640,
        path: "../vendor/markdown/lib/",
        saveHTMLToTextarea: true
    });
    testEditor.getHTML();// 获取 Textarea 保存的 HTML 源码
</script>
</html>
