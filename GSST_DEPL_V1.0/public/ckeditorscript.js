
DecoupledEditor
.create( document.querySelector( '.document-editor__editable' ), {
    cloudServices: {
        // All predefined builds include the Easy Image feature.
        // Provide correct configuration values to use it.
        // tokenUrl: 'https://example.com/cs-token-endpoint',
        // uploadUrl: 'https://your-organization-id.cke-cs.com/easyimage/upload/'
        // Read more about Easy Image - https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/easy-image.html.
        // For other image upload methods see the guide - https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html.
    }
} )
.then( editor => {
    const toolbarContainer = document.querySelector( '.document-editor__toolbar' );
    const tableConfig = {
        contentToolbar: [ 'tableRow', 'tableColumn', 'mergeTableCells' ]
    };

    toolbarContainer.appendChild( editor.ui.view.toolbar.element );


    window.editor = editor;
} )
.catch( err => {
    console.error( err );
} );
