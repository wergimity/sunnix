<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>{{ file_get_contents(base_path('resources/assets/css/bootstrap.css')) }}</style>
</head>
<body>
    <div class="container">

        <h1>Event reminder for {{ $reminder->starts_on }}</h1>

        This is a reminder for your event.

        <div class="well">{{ $reminder->description }}</div>

        Which will take place on <strong>{{ $reminder->starts_on }}</strong>

    </div>

</body>
</html>