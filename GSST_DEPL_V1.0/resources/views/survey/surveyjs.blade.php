@extends('app.layout')
@section('css')
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
  rel="stylesheet"
/>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-stretch">
            <div class="p-2 bd-highlight">
                <img src="{{asset('images/logoMM.png')}}" alt="Image"  height="60" width="200">
            </div>
            <div class="d-flex" style="height: 60px;">
                <div class="vr"></div>
              </div>
             <div class="p-2 bd-highlight">{{$survey->name}}</div>
             <div class="d-flex" style="height: 60px;">
             <div class="vr"></div>
             </div>
            <div class="p-2 bd-highlight">{{$survey->referece}}</div>
            </div>
    </div>
    <div class="card-body">
        <form action="{{url('save_content_survey/'.$survey->id)}}" method="POST">
            @csrf
            <input name="survey" type="hidden" id="survey" value="">
        <div id="fb-editor"></div>
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary btn-sm" type="submit">save survey</button>
    </form>
    <button id="setData" class="btn btn-info btn-sm float-end" >set data</button>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script>
jQuery(function($) {
  var $fbEditor = document.getElementById('fb-editor');
  var formBuilder = $($fbEditor).formBuilder();

  document.getElementById('setData').addEventListener('click', function() {
    formBuilder.actions.setData({!! json_encode($survey->content) !!});
});
    document.addEventListener('fieldAdded', function(){
    document.getElementById('survey').value=formBuilder.formData;
  });
});
</script>
@endsection
