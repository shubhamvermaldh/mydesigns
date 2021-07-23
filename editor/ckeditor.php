<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <style>
        .ck-editor__editable_inline {
            /*max-height: 200px;*/
        }
      
        .ck-editor__editable {
            height: 400px !important;
        }
    </style>
</head>
<body>
    <h1>Classic editor</h1>
    <textarea id="editor">
        <p>This is some sample content.</p>
    </textarea>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),{
            	ckfinder: {
    				uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
    			},
				toolbar: ['heading', '|', 'imageUpload', 'link', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo' ],
            } )
            .then( editor => {
                console.log( editor );
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>