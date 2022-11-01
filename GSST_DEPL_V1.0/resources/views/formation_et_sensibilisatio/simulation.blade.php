@extends('app.layout')
@section('css')
<style>
    #container {
        width: 1000px;
        margin: 20px auto;
    }
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }
    .ck-content .image {
        /* block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>


@endsection

@section('content')
<div class="modal fade" id="rapport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">generer rapport</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('add-rapport')}}">
                @csrf
                <div id="container">
                    <div id="editor">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
{{-- import excel --}}

  <!-- Modal -->
  <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Exporter les donnees via excel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('import')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="mb-3">
                <label for="formFile" class="form-label">choisi un fichier excel</label>
                <input class="form-control" type="file" name="excel" id="formFile" required>
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Démarrer l'exportation</button>
        </div>
    </form>
      </div>
    </div>
  </div>
{{-- editer --}}
@foreach ($simulation as $SM)
<div class="modal fade" id="exampleModal{{$SM->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editer Exercice/simulation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('edit_simulation/'.$SM->id)}}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Domaine de l'exercice/simulation</label>
                <input type="text" class="form-control" name="domaine" value="{{$SM->domaine}}" id="inputEmail4">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Thème de l'exercice/simulation</label>
                <input type="text" class="form-control" name="theme" value="{{$SM->theme}}" id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Superviseur de l'operation</label>
                <input type="text" class="form-control" name="superviseur" value="{{$SM->superviseur}}" id="inputEmail4">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Duree l'exercice/simulation</label>
                <input type="number" class="form-control" name="duree" value="{{$SM->duree}}" id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">les participants</label>
                <input type="text" class="form-control" name="participant" value="{{$SM->participant}}" id="inputEmail4">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">La date de l'exercice/simulation</label>
                <input type="date" class="form-control" name="date" value="{{$SM->date}}" id="inputPassword4">
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endforeach

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Exercice/simulation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('add_simulation')}}" method="POST" class="row g-3">
                @csrf

            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Domaine de l'exercice/simulation</label>
                <input type="text" class="form-control" name="domaine" id="inputEmail4">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Thème de l'exercice/simulation</label>
                <input type="text" class="form-control" name="theme" id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Superviseur de l'operation</label>
                <input type="text" class="form-control" name="superviseur" id="inputEmail4">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Duree l'exercice/simulation</label>
                <input type="number" class="form-control" name="duree" id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">les participants</label>
                <input type="text" class="form-control" name="participant" id="inputEmail4">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label">La date de l'exercice/simulation</label>
                <input type="date" class="form-control" name="date" value="{{now()->toDateString('Y-m-d')}}" id="inputPassword4">
              </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
  @endif
<div class="card">
    <div class="card-header">
     <h6>Planning des exersices & simulations des situations d'urgences
            <a  href="#" role="button" class="btn btn-secondary btn-sm float-end" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i class='bx bx-chevron-down'></i>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                <a href="" class="dropdown-item" titre="ajouter" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter planning</a>
                </li>
              {{-- <li><a href="{{url('about_travailleur/'.$ST->id)}}" class="dropdown-item" title="voir plus d'informations">plus d'informations</a></li> --}}
              <li>
                <a href="{{url('reponce')}}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#import">Importer Excel</a>
              </li>

            </ul>
     </h6>
    </div>
    <div class="card-body">
        <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
        width="100%">
        <thead>
          <tr>
            <th>Domaine de l'exercice/simulation</th>
            <th>Thème de l'exercice/simulation</th>
            <th>Superviseur de l'operation</th>
            <th>Duree l'exercice/simulation</th>
            <th>les participants</th>
            <th>La date de l'exercice/simulation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($simulation as $ST )
              <tr>
                <td>{{$ST->domaine}}</td>
                <td>{{$ST->theme}}</td>
                <td>{{$ST->superviseur}}</td>
                <td>{{$ST->duree}} h</td>
                <td>{{$ST->participant}}</td>
                <td>{{$ST->date}}</td>
                <td>
                    <div class="dropdown">
                        <a  href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-chevron-down'></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li><a href="#" role="button" class="dropdown-item" title="editer" data-bs-toggle="modal" data-bs-target="#exampleModal{{$ST->id}}">editer</a></li>
                          {{-- <li><a href="{{url('about_travailleur/'.$ST->id)}}" class="dropdown-item" title="voir plus d'informations">plus d'informations</a></li> --}}
                          <li>
                            <form method="POST" action="{{url('delete_simulation/'.$ST->id)}}">
                                @csrf
                                <button type="submit" class="dropdown-item show_confirm" data-toggle="tooltip" title='supprimer'>supprimer</button>
                            </form>
                          </li>
                          <li>
                            <a href="{{url('rapportSimulation_situation/'.$ST->id)}}" class="dropdown-item" >voir le rapport</a>
                            {{-- data-bs-toggle="modal" data-bs-target="#rapport" --}}
                          </li>
                        </ul>
                      </div>
                </td>
              </tr>
          @endforeach
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
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script>
<!--
    Uncomment to load the Spanish translation
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/translations/es.js"></script>
-->
<script>
    // This sample still does not showcase all CKEditor 5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'exportPDF','exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: '',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });
</script>

{{-- <script  type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}" ></script>

<script src="{{asset('ckeditorscript.js')}}"> --}}

@endsection
