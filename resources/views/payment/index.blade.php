<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="/payments" class="form" method="post">
        @csrf
        <div class="row">
        <div class="form-control col-4">
            <input type="text" name="name" class="form-control col-4 mb-4"  placeholder="tambah payment">
            <button class="btn btn-success">Tambah</button>
        </div>
        </div>
        </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Payment Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <form action="payments" method="post">
   @method('DELETE')
   @csrf
  @foreach($payments as $payment)
    <tr>
      <td>{{$payment->id}}</td>
      <td>{{$payment->payment_name}}</td>
      <td><input type="checkbox" name="id_payment[]" value="{{$payment->id}}"></td>
    </tr>
@endforeach
  </tbody>
</table>
<button class="btn btn-danger">Delete</button>
</form>
    </div>
</body>
</html>
