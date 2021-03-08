<html> 
<head>
    <title>Data Record</title>
      
    <meta charset="UTF-8"  />
    <meta name="description" content="Non-profit service that allows individual local artists and crafts persons around the world to be able to market their products directly to a global audience." />
    <link href="./styleSheets/styles.css"
          rel="stylesheet"
          type="text/css"  />
          <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Roboto Condensed" rel="stylesheet">

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  
       
<style>
td.details-control {
    background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
}
</style>





</head>

<body>
<a class="skipLink" href="#mainContent">Skip to Main Content</a>

<script src="jquery.js"></script>
<script src="jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


    <header>
    <?php include 'htmlheader_index.php';?>
    </header>



<article id="readDisplay">
<br /><br />
<h3>Search results</h3><br/>



<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>TItle</th>
                <th>Author</th>
                <th>Category Id</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>TItle</th>
                <th>Author</th>
                <th>Category Id</th>
            </tr>
        </tfoot>
  </table>
            
              
     <script type='text/javascript'>

             /* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>TItle:</td>'+
            '<td>'+d.title+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Author:</td>'+
            '<td>'+d.author+'</td>'+
        '</tr>'+
       '</table>';
}
 
$(document).ready(function() {
   
   
    var table = $('#example').DataTable( {
        "ajax": "http://localhost/testing/php_rest_myblog/api/post/read.php",
       

       // "ajax": "C:\wamp64\www\testing\test_data.txt",
       
       // http://localhost/testing/php_rest_myblog/api/post/read.php
       
        "columns": [
            // {
            //     "className":      'details-control',
            //     // "orderable":      false,
            //     // "data":           null,
            //     // "defaultContent": '',
            // },
            { "data": "title" },
            { "data": "author" },
            { "data": "category_id" }   
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );

                </script>



</body>
</html> 