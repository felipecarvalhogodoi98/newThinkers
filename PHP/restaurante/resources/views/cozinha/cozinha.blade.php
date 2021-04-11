<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <base href="http://localhost:8000">

        <title>Cozinhas</title>
    </head>
    <body>
        <a href="/">Inicio</a>
        <a href="cozinhas/">Cozinhas</a>
        <form name="form1" method="POST" action="">
        <table border="0" align="center" width="60%">
        @if(empty($cozinha->id))
            <tr><td align="center">Id invalido</td></tr>
            <tr><td align="center"><a href="cozinhas/">Cozinhas</a></td></tr>
        @else
            <tr bgcolor="grey">
                <td width="5%">ID</td>
                <td width="20%">Nome</td>
                <td width="20%">Abertura</td>
                <td width="20%">Fechamento</td>
                <td width="30%"></td>
            </tr>
            
            <tr>
                <td>{{ $cozinha->id }}</td>
                <td>{{ $cozinha->nome }}</td>
                <td>{{$cozinha->abertura }}</td>
                <td>{{$cozinha->fechamento}}</td>
	             <td align="center">
                    <input type="button" value="Excluir" onclick="location.href='cozinha/destroy/{{$cozinha->id}}'">
	                <input type="button" value="Editar" onclick="location.href='cozinha/update/{{$cozinha->id}}'">
	            </td>
            </tr>
            
            
        @endif
        </table>
        </form>
    </body>
</html>