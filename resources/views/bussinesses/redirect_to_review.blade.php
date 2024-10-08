<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form id="redirectForm" action="{{ route('review', $businessId) }}" method="POST">
    @csrf
</form>

<script>
    // Envia o formulário automaticamente
    document.getElementById('redirectForm').submit();
</script>

</body>
</html>