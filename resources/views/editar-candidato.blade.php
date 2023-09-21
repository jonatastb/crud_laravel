<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <form action="/atualizar-candidato{{ $candidato->id }}" method="POST">
        @csrf  
        $method("PUT")
        <label for="">Nome:</label>
        <input type="text" placeholder="Digite seu nome..." name="nome_candidato" value="{{ $candidato->nome }}">
        <br>
        <label for="">Email:</label>
        <input type="email" placeholder="Digite seu email..." name="email_candidato" value="{{ $candidato->email }}">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>