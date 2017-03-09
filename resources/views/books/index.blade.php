<!DOCTYPE html>
<html >
<head>

 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Book Index</title>

	
</head>

<body>
 <h1>Welcome to Library</h1>
	<h2>Index of Books</h2>
	<br>

	<label> Category </label>
	<select >
		@foreach($books as $book)
		<option>{{ $book{'category'} }}</option>
		@endforeach
	</select>

	<label> Tri </label>
	<select ng-model="order">
		<option value="asc">A -> Z</option>
		<option value="desc">Z -> A</option>
	</select>

	<label> Filter </label><input type="text">

	<br><br>

	<table border="1"  class="table table-striped table-bordered dataTable no-footer dtr-inline">
		<th>ISBN</th><th>Book Title</th><th>Author</th><th>Category</th><th>Action</th>
		
		<tbody>
			@foreach ($books as $book)


			<tr >


				<td>{{ isset( $book{'isbn'} ) ?  $book{'isbn'} : ' - ' }}</td>
				<td>{{ $book{'title'} }}</td>
				<td>{{ $book{'author'} }}</td>
				<td>{{ $book{'category'} }}</td>

				<td><form action="books/{{ $book{'_id'} }}" method="POST">
						{{ csrf_field() }}
						<input type="button" class="book-action" value="View" onclick="window.location='{{ route('books.show', ['book' => $book{'_id'}]) }}'"> &nbsp;
						<input type="button" class="book-action" value="Edit" onclick="window.location='{{ route('books.edit', ['book' => $book{'_id'}]) }}'"> &nbsp;
						<input type="hidden" class="book-action" name="_method" value="DELETE"/>
						<input type="submit" class="book-action" name="del" value="Delete"/>
					</form>
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
	<hr/>

	<input type="button" class="book-action big" value="Add a Book" onclick="window.location='{{ route('books.create') }}'">




  	   </div>
   	</div>

   	

</body>

</html>