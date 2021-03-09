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
  
       



</head>

<body>
<a class="skipLink" href="#mainContent">Skip to Main Content</a>

<!-- <script src="jquery.js"></script>
<script src="jquery.dataTables.min.js"></script> -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


    <header>
    <?php include 'htmlheader_index.php';?>
    </header>



<article id="readDisplay">
<br /><br />
<h3>Search results</h3><br/>



<?php

    require_once('./includeFiles/connectvars.php');

    

   
    /**
     * The below code opens local db, inserts form data, and closes the db. 
     */

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('Error connecting to MariaDB server.');
        //echo '<p>Database opened!</p>';

        
        $link = './docs/';
        $link1 = '.txt';

        $keyword = mysqli_real_escape_string($dbc, trim($_POST['keyword']));
        $category = mysqli_real_escape_string($dbc, trim($_POST['category']));
        $institution = mysqli_real_escape_string($dbc, trim($_POST['institution']));
        
        

        $select = "SELECT series.number, series.title, series.desc, LEFT(series.desc, 30) AS descsmall, campus.campus_name, functional_area.functional_area FROM 
        series_campus join series on series.id = series_campus.series_id
        join campus on campus.id = series_campus.campus_id 
        join functional_area on functional_area.id = series.functional_area_id
        ";
        
        //original
        // $select = "SELECT series.number, series.title, series.desc, campus.campus_name, functional_area.functional_area FROM 
        // series_campus join series on series.id = series_campus.series_id
        // join campus on campus.id = series_campus.campus_id 
        // join functional_area on functional_area.id = series.functional_area_id
        // ";
        





        // Build WHERE query
        $whereconditions =[];
        if (!empty($keyword)) {
            //todo revisit this method laters
            // $whereconditions []= 'MATCH(textFull) AGAINST ("'.$keyword.'" IN NATURAL LANGUAGE MODE)';
            $whereconditions []= 'series.desc LIKE "%'.$keyword.'%"';
        }

        if (!empty($category)) {
            $whereconditions []= 'functional_area.id = "' .$category. '"';
        }

        if (!empty($institution)) {
            $whereconditions []= 'campus.id = "' . $institution. '"';
        }

        //echo $whereconditions[0];


        $where = '';

        if (!empty($whereconditions)) {
            $where = " WHERE " . implode(" AND ", $whereconditions);
        }





        $order = "ORDER BY series.number, campus.campus_name";

        $query1 = $select . $where . $order;
       // echo var_dump($query1);

        // $query1 = "SELECT * FROM `rdadatabase` WHERE MATCH(textFull) AGAINST ('".$keyword."' IN NATURAL LANGUAGE MODE) ORDER BY campusName, categoryName";

        /** HEIDI STUFF */
        // todo: consider alternate query if query1 returns nothing.  Maybe something like...
        // but note that, as-is, it's only matching a single keyword or phrase (this is not an "OR" search)
      
      
      //  $query1alt = "SELECT * FROM `rdadatabase` WHERE textFull LIKE '%".$keyword."%' ORDER BY campusName, categoryName, fileName";
        
        // $query2 = "SELECT * FROM `rdadatabase` WHERE categoryName='$category'";
       
        
        

        $result1 = mysqli_query($dbc, $query1)
            or die('Error querying database.');
        $result1 = $dbc->query($query1);


        if ($result1->num_rows == 1) {
            echo "<p>Your search returned " . $result1->num_rows . " result.</p><br>";
        } else { 
            echo "<p>Your search returned " . $result1->num_rows . " results.</p><br>";
        }

        /* HEIDI COMMENTED OUT
        // What Jason had before
        if ($result1->num_rows < 1) {
            echo '<p>That file is not in the database, please click Search Records above to try again' . '</p>';
            echo '<p><br>' . '</p>';
            die();
        }
        */
        /* HEIDI added this: */
    //    if ($result1->num_rows < 1) {

    //    // $result1 =  $dbc->query($query1alt);  // TODO not sure if you have to pre-test the query with the "or die" part??
    //    }
        
        /**
         * display query results on page
         */
            // $result1 = $dbc->query($query1); // HEIDI commented this out - JASON already did this.
            if ($result1->num_rows > 0) {
           

                
                // output data of each row
                $results = array();
                while($row = $result1->fetch_assoc()) {
                $results[] = $row; 

            }

            $dataobject = new jdata($results);
        }

        class jdata {
            public $data;

           public function __construct($results) {
                $this->data = $results;

            }
        }

           ?> 

        <script type="text/javascript">
            var obj1 = <?php echo json_encode($results); ?>;
            //console.log(obj1);
            //var s = obj1;
            //var obj = JSON.parse(s);
            console.log(obj1);
            
        </script>


        



<table id="jasonTable" class="display" style="width:100%">
        <thead>
            <tr>
            <th></th>
                <th>Number</th>
                <th>Title</th>
                <th>Number</th>
                <th>Title</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th>Number</th>
                <th>Title</th>
                <th>Number</th>
                <th>Title</th>
            </tr>
        </tfoot>
  </table>
            
          
<script type='text/javascript'>

             /* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Title:</td>'+
            '<td>'+d.title+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Name:</td>'+
            '<td>'+d.campus_name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Desc:</td>'+
            '<td>'+d.desc+'</td>'+
        '</tr>'+
       '</table>';
}
 
$(document).ready(function() {
   
   var table = $('#jasonTable').DataTable( {
       
    //"ajax": "json.txt",
      "data": obj1, 
       
        
       // "data": "obj1", 
     
        //alert(obj):
       
        "columns": [
             { 
                 "className":      'details-control',
                 "orderable":      false,
                 "data":           null,
                 "defaultContent": '',
             },
            { "data": "number" },
            { "data": "title" },
            { "data": "campus_name" },
            { "data": "descsmall" }
          
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#jasonTable tbody').on('click', 'td.details-control', function () {
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