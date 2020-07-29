<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shopping Cart</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <h2>Bill:</h2>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                           <th>ID</th>   
                           <th>Name</th>   
                           <th>Quantity</th>   
                           <th>Price</th>   
                       </tr>
                   </thead>
                   <tbody>
                    @foreach($shoppingCart as $shopp)
                    <tr>
                        <td>{{ $shopp->productos[0]->id }}</td>
                        <td>{{ $shopp->productos[0]->name }}</td>
                        <td>{{ $shopp->quantity }}</td>
                        <td>{{ $shopp->cost }}</td>
                    </tr>
                    @endforeach
                </tbody>    
            </table>
            <label>Total: $</label><label id='total'>{{$totalCant}}   </label>
            <br>
            <div class="btn-group" role="group" aria-label="Basic example">
                <form action="{{ route('index')}}" method="GET">
                  <button type="submit" class="btn btn-secondary">List Products</button>
              </form>
              <form action="{{ route('admin.products')}}" method="GET">
                  <button type="submit" class="btn btn-secondary">Add Products</button>
              </form>
              <form action="{{ route('user.shopping')}}" method="GET">
                  <button type="submit" class="btn btn-secondary">Buy More Products</button>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
</body>

</html>
