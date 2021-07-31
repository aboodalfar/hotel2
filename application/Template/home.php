 <!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>list of hotels</h1>


<table id="example">
    <tr>
        <th>
            hotel Name
        </th>
        <th>
            fare
        </th>
        <th>
            Amenities
        </th>
    </tr>
    <tr>
        <td>Excellent Hotel</td>
        <td>399.99</td>
        <td>TV,Wifi,Local travel guides</td>
    </tr>
    <tr>
        <td>Not Bad Hotel</td>
        <td>149.99</td>
        <td>Wifi,Local travel guides</td>
    </tr>
</table>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/dt-1.10.22/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.22/datatables.min.js"></script>
 <script>
 $(document).ready(function() {
    $('#example').DataTable();
} );
 </script>
</body>
</html> 