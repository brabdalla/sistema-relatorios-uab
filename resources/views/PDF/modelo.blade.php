<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Relatório UAB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
        th{
            text-align: center;
            vertical-align:sub;
            height: 25px;
            width:20%
        }
        .assinatura{
            height: 150px;
            vertical-align: bottom;
            padding: 0px;
        }
        
    </style>
</head>
<body>

<div class="container mt-3">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2">RELATÓRIO MENSAL DE ATIVIDADES</th>
        </tr>
         <tr>
          <th>UAB - Universidade Aberta do Brasil</th>
          <th>Período: <br/>
        @php
            $date = \Carbon\Carbon::parse($relatorio->mes_ano_referencia);
            $startOfMonth = $date->copy()->startOfMonth();
            $endOfMonth = $date->copy()->endOfMonth();
        @endphp
           {{$startOfMonth->format('d/m/Y')}} à {{$endOfMonth->format('d/m/Y')}}</th>
        </tr>
      </thead>
      <tbody>
       <tr>
          <td><b>Nome do bolsista:</b></td>
          <td>{{$vinculo->user->name}}</td>
        </tr>
        <tr>
          <td><b>Tipo de vínculo:</b></td>
          <td>Bolsista</td>
        </tr>
        <tr>
          <td><b>Periodo do vínculo:</b></td>
          <td>{{\Carbon\Carbon::parse($relatorio->vinculo->data_inicio)->format('d/m/Y')}} à {{\Carbon\Carbon::parse($relatorio->vinculo->data_fim)->format('d/m/Y')}}</td>
        </tr>
        <tr>
          <td><b>Curso:</b></td>
          <td>{{$vinculo->curso->nome_curso}} - {{$vinculo->curso->oferta}}</td>
        </tr>
        <tr>
          <td><b>Função UAB:</b></td>
          <td>{{$vinculo->funcao->nome_funcao}}</td>
        </tr>
        <tr>
          <td><b>Edital:</b></td>
          <td>{{$relatorio->vinculo->edital}}</td>
        </tr>
        <tr>
          <td><b>Responsável:</b></td>
          <td>{{$relatorio->coordenador->name}}</td>
        </tr>
        <tr>
          <td colspan="2"><h4>Descrição das atividades realizadas:</h4>
      
                    <p>{{$relatorio->descrição_atividades}}</p>
               
           </td>
        </tr>
        <tr>
          <td colspan="2" class="text-center">Cuiabá - MT {{ date('d/m/Y') }}</td>
        </tr>
         <tr>
          <td colspan="2" class="text-center">Atesto que as atividades foram desenvolvidas, conforme descrição acima.</td>
        </tr>
        <tr>
          <td class="assinatura text-center">
            @if ($relatorio->hash_validacao_bolsista == NULL)
              _________________________________<br/>
            @else
              {{$vinculo->user->name}} <br/> 
              Assinado em: {{$relatorio->data_validacao_bolsista}}<br/>
            @endif
            Bolsista</p>
            </td>
            <td class="assinatura text-center">
            <p>
              @if ($relatorio->hash_validacao_coordenador == NULL)
                _________________________________<br/>
              @else
                {{$relatorio->coordenador->name}} <br/> 
                Assinado em: {{$relatorio->data_validacao_bolsista}}<br/> 
              @endif
              Responsável
            </p>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
