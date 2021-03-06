@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center header-ppc">
        <div class="col-sm-8 item-header-ppc">

            <h3>PPCs finalizados</h3>

        </div>
        <div class="col-sm-4 item-header-ppc" >
            <div class="input-group">
                <input id="inputBusca" type="text"  class="form-control" placeholder="Buscar Curso, Ano, N° do Processo ou Status">
            </div>

        </div>

    </div>


    <div class="row justify-content-center">
        <table id="tabela" class="table table-responsive-lg table-hover table-borderless bg-light">
            <thead align="center">
                <th>ÚLTIMA ATUALIZAÇÃO</th>
                <th>VISUALIZAR</th>
                <th>DOWNLOAD</th>
                <th>RETOMAR</th>
            </thead>

            <tbody>
              @foreach($processos as $processo)
                <tr align="center">
                  <td>

                    <?php
                    $date = date_create($processo->update_at);
                    // dd($processo->updated_at);
                    // dd($date);
                    $date = date_format($date, 'd/m/Y');
                    ?>

                    {{ $date }}

                  </td>

                  <td>
                    <a href="{{ route('capr.acompanharProcesso', ['idProcesso' => $processo->id]) }}">
                      <img class="icone-eye" src="{{asset('images/eye-solid.svg')}}" alt="">
                    </a>
                  </td>
                  <td>
                    <a href="{{ route('download', ['file' => $processo->arquivo[0]->anexo])}}" target="_new">
                      <img src="{{asset('images/download-solid.svg')}}" style="width:20px">
                    </a>
                  </td>
                  <td>
                    <a href="{{ route('coordenador.retomar', ['idProcesso' => $processo->id]) }}">
                      Retomar
                    </a>
                  </td>
                </tr>
              @endforeach


            </tbody>
        </table>

    </div>


</div>


<script>

    // Usa a biblioteca quicksearch para buscar dados na tabela
    $('input#inputBusca').quicksearch('table#tabela tbody tr');

</script>
@endsection
