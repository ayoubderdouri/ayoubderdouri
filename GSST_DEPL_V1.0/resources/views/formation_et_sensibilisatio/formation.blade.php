@extends('app.layout')
@section('css')

@section('content')
<div class="card">
    <div class="card-header">
     <h6>PLAN D’ACTION FORMATION
        <a href="" class="btn btn-primary btn-sm float-end" titre="ajouter "> +</a>
     </h6>
    </div>
    <div class="card-body">
        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
        width="100%">
        <thead>
          <tr>
            <th>Domaine de formation</th>
            <th>Thème</th>
            <th>Durée en jours</th>
            <th>DOM</th>
            <th>SSST</th>
            <th>DFCCB</th>
            <th>DE</th>
            <th>DRHCCG</th>
            <th>SI</th>
            <th>DED</th>
            <th>Total</th>
            <th>Nb group</th>
            <th>Domiciliation</th>
            <th>Montant / participant</th>
            <th>Montant total HT /groupe</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tiger</td>
            <td>Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
            <td>5421</td>
            <td>t.nixon@datatables.net</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
            <td>5421</td>
            <td>t.nixon@datatables.net</td>
          </tr>
          <tr>
            <td>Garrett</td>
            <td>Winters</td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>$170,750</td>
            <td>8422</td>
            <td>g.winters@datatables.net</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
            <td>5421</td>
            <td>t.nixon@datatables.net</td>
          </tr>
          <tr>
            <td>Ashton</td>
            <td>Cox</td>
            <td>Junior Technical Author</td>
            <td>San Francisco</td>
            <td>66</td>
            <td>2009/01/12</td>
            <td>$86,000</td>
            <td>1562</td>
            <td>a.cox@datatables.net</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
            <td>5421</td>
            <td>t.nixon@datatables.net</td>
          </tr>
          <tr>
            <td>Cedric</td>
            <td>Kelly</td>
            <td>Senior Javascript Developer</td>
            <td>Edinburgh</td>
            <td>22</td>
            <td>2012/03/29</td>
            <td>$433,060</td>
            <td>6224</td>
            <td>c.kelly@datatables.net</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
            <td>5421</td>
            <td>t.nixon@datatables.net</td>
          </tr>
        </tbody>
        </table>
    </div>
</div>

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
