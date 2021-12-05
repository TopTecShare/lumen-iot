<html>
<head>
    <title>CNAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

</head>
<body class="container">
    <form action="/interface" accept-charset="UTF-8" method="post">
        <p>
            Komenda:
            <br>
            <textarea type="query" name="query" class="form-control" rows="15">{{$query}}</textarea>
        </p>
        <p><input type="submit" name="commit" class="btn btn-success" value="Załaduj" class="btn"></p>
    </form>
    <table class="table datatable table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Uuid</th>
                <th>Json</th>
                <th>Created at</th>
            </tr>
        </tbody>
            <tbody>
@foreach($results as $result)
<tr>
    <td>{{ ++$loop->index }}</td>
    <td>{{$result->uuid}}</td>
    <td>{{$result->json}}</td>
    <td>{{$result->created_at}}</td>
</tr>
@endforeach
</tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('.datatable').DataTable({
      "language": {
	"sProcessing":   "Przetwarzanie...",
	"sLengthMenu":   "Pokaż _MENU_ pozycji",
	"sZeroRecords":  "Nie znaleziono pasujących pozycji",
	"sInfoThousands":  " ",
	"sInfo":         "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
	"sInfoEmpty":    "Pozycji 0 z 0 dostępnych",
	"sInfoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
	"sInfoPostFix":  "",
	"sSearch":       "Szukaj:",
	"sUrl":          "",
	"oPaginate": {
		"sFirst":    "Pierwsza",
		"sPrevious": "Poprzednia",
		"sNext":     "Następna",
		"sLast":     "Ostatnia"
	},
	"sEmptyTable":     "Brak danych",
	"sLoadingRecords": "Wczytywanie...",
	"oAria": {
		"sSortAscending":  ": aktywuj, by posortować kolumnę rosnąco",
		"sSortDescending": ": aktywuj, by posortować kolumnę malejąco"
	}
}
    });
} );
</script>
</html>
