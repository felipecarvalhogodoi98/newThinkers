<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="http://localhost:8000/">

    <title>Cozinhas</title>
</head>
<body>
<a href="/">Inicio</a>
<form name="form1" method="POST" action="cozinha/">
    <table border="0" align="center" width="60%">
        @if(count($cozinhas) == 0)
            <tr><td align="center">Nao ha nenhuma cozinha cadastrada.</td></tr>
            <tr><td align="center"><input type="submit" value="incluir Cozinha"></td></tr>
        @else
            <tr bgcolor="grey">
                <td width="5%">ID</td>
                <td width="20%">Nome</td>
                <td width="20%">Abertura</td>
                <td width="20%">Fechamento</td>
                <td width="30%"></td>
            </tr>
            @foreach($cozinhas as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->nome}}</td>
                    <td>{{$c->abertura }}</td>
                    <td>{{$c->fechamento}}</td>
                    <td align="center">
                        <input type="button" value="Vizualizar" onclick="location.href='cozinha/{{$c->id}}'">
                        <input type="button" value="Excluir" onclick="location.href='cozinha/destroy/{{$c->id}}'">
                        <input type="button" value="Editar" onclick="location.href='cozinha/update/{{$c->id}}'">
                    </td>
                </tr>
            @endforeach
            <tr><td colspan="3" align="center"><input type="submit" value="Incluir Cozinha"></td></tr>
        @endif

    </table>
</form>
</body>
</html>
