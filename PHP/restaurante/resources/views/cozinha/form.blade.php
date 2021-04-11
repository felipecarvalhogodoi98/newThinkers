
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <base href="http://localhost:8000/">

        <title>Incluir/Editar</title>
    </head>
    <body>
        @if(isset($cozinha))
        <?php 
            $dados = array($cozinha->id,$cozinha->nome,$cozinha->abertura,$cozinha->fechamento); 
        ?>
        <!-- EDITAR ............................. -->
            <form name="form1" method="POST" action="api/cozinha/update/{{$dados[0]}}">
            <table>
            <center>
                <h3>Editar Cozinha</h3>
            </center>
            
            <table border="0" align="center" width="35%">
            <tr>
                <td width="20%">Nome:</td>
                <td colspan="2" width="90%">
                <input type="text" name="nome" value="{{$dados[1]}}" maxlength="45" required>
                </td>
            </tr>
            <tr>
                <td>Abertura:</td>
                <td><input type="time" name="abertura" value="{{$dados[2]}}">
                </td>
            </tr>
            <tr>
                <td>Fechamento:</td>
                <td><input type="time" name="fechamento" value="{{$dados[3]}}">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                <input type="button" value="Cancelar" onclick="location.href='cozinhas'">
                <input type="submit" value="Gravar">
                </td>
            </tr>
            </table>
            </form>
        @else


        <!-- INCLUIR ............................. -->
            <form name="form1" method="POST" action="api/cozinha/">
            <table>
            <center>
                <h3>Cadastrar Cozinha</h3>
            </center>
            
            <table border="0" align="center" width="35%">
            <tr>
                <td width="20%">Nome:</td>
                <td colspan="2" width="90%">
                <input type="text" name="nome" value="" maxlength="45" required>
                </td>
            </tr>
            <tr>
                <td>Abertura:</td>
                <td><input type="time" name="abertura" value="10:00:50">
                </td>
            </tr>
            <tr>
                <td>Fechamento:</td>
                <td><input type="time" name="fechamento" value="14:00:50">
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                <input type="button" value="Cancelar" onclick="location.href='cozinhas'">
                <input type="submit" value="Gravar">
                </td>
            </tr>
            </table>
            </form>
        @endif
            
        
    </body>
</html>