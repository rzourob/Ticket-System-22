<html lang="en">
<head>
    {{header("Content-Disposition: inline;")}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{-- <embed src="{{asset("/storage/patientattachments/$patientattachments->file_name")}}" width="100%" height="600px" /> --}}
    <iframe src="{{asset("/storage/deviceattachments/$deviceattachments->file_name")}}" width="100%" height="100%"></iframe>
</body>
</html>