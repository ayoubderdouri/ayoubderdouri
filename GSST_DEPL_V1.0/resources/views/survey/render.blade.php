@extends('app.layout')
@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css">
@endsection
@section('content')
@if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
  @endif
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-stretch">
            <div class="p-2 bd-highlight">
                <img src="{{asset('images/logoMM.png')}}" alt="Image"  height="60" width="200">
            </div>
            <div class="d-flex" style="height: 60px;">
                <div class="vr">

                </div>
              </div>
             <div class="p-2 bd-highlight">{{$survey->name}}</div>
             <div class="d-flex" style="height: 60px;">
             <div class="vr"></div>
             </div>
            <div class="p-2 bd-highlight">{{$survey->referece}}</div>
            </div>
    </div>
    <div class="card-body">
        <form action="{{url('sent_answer_survey/'.$survey->id)}}" method="post">
            @csrf
        <div id="render"></div>
    </div>
    <div class="card-footer text-muted">
        <button type="submit" class="btn btn-info btn-sm">submit</button>
    </form>
    </div>
</div>

<pre><code id="markup"></code></pre>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-render.min.js"></script>
    <script>
        jQuery($ => {
  const escapeEl = document.createElement("textarea");
  const code = document.getElementById("markup");
  var formData = {!! $survey->content !!};
  const addLineBreaks = html => html.replace(new RegExp("><", "g"), ">\n<");
//
  // Grab markup and escape it
  const $markup = $("<div/>");
  $markup.formRender({ formData });
 document.getElementById('render').innerHTML=$markup.formRender("html");

  // set < code > innerText with escaped markup
//   code.innerText = addLineBreaks($markup.formRender("html"));

//   hljs.highlightBlock(code);
});
    </script>
@endsection

