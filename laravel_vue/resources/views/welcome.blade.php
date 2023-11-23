<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel_vue</title>
    {{-- defer를 넣으면 html을 먼저 로드하고 마지막에 script를 불러옴 --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <div id="app"></div>
</body>
</html>