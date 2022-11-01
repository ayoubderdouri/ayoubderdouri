@extends('app.layout')
@section('content')
{{-- <div class="card-body"> --}}
    <table  id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
    width="100%">
        <thead>
            <tr>
                <th>Source</th>
                 <th>Actuel</th>
                <th>Prevu</th>
                <th>Responsable</th>
                <th>Ressource</th>
                <th>Delai recommende</th>
                <th>Date de Realisation</th>
                <th>Delai de realisation</th>
                <th>Efficacite</th>
            </tr>
         </thead>
         <tbody>
             @foreach ($actions as $data )
             <tr>
                <td>{{$data->source1."(".$data->source2.")"}}  </td>
                 <td>{{$data->actuel}}</td>
                 <td>{{$data->prevu}} </td>
                 <td>{{$data->responsable}}</td>
                 <td>{{$data->ressource}}</td>
                 <td>{{$data->date_recommande}}</td>
                 @if ($data->date_realisation)
                 <td>{{$data->date_realisation}}</td>
                 @else
                 <td><span class="badge rounded-pill bg-success">En cours</span>
                 </td>
                 @endif
                 @if ($data->delay_realisation)
                 <td>{{$data->delay_realisation}}</td>
                 @else
                 <td><span class="badge rounded-pill bg-success">En cours</span>
                 </td>
                 @endif
                 @if ($data->efficacite)
                 <td>{{$data->efficacite}}</td>
                 @else
                 <td><span class="badge rounded-pill bg-success">En cours</span>
                 </td>
                 @endif

             </tr>
             @endforeach
         </tbody>
     </table>
{{-- </div> --}}
@endsection
@section('script')
<script>
    $(document).ready(function () {
    $('#dtHorizontalExample').DataTable({
      "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');
  });
</script>

@endsection
