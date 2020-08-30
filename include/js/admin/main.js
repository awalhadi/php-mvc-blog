// adding data table
$('#post_list').DataTable( {
} );

// addming ck editor
ClassicEditor
.create( document.querySelector( '#ckeditor' ) )
.catch( error => {
    console.error( error );
} );