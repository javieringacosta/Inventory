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
                <h3>Products:</h3>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                           <th>ID</th>   
                           <th>Name</th>   
                           <th>Quantity</th>   
                           <th>Lot Number</th>   
                           <th>Expiration Date</th>   
                           <th>Price</th>   
                       </tr>
                   </thead>
                   <tbody>
                    @foreach($products as $product)
                    <form action="{{route('shopping.add')}}" method="POST">
                        <tr>
                            <td>{{ $product->id }}<input class="col-sm-4" type="hidden" value="{{$product->id}}" name="produc_id"><label></td>
                                <td >{{ $product->name }}</td>
                                <td>
                                    <input class="col-sm-6" type="number" name="quantity" value="{{ $product->quantity }}"><label> / {{ $product->quantity }}</label>
                                </td>   
                                <td>{{ $product->lot_number }}</td>
                                <td>{{ $product->expiration_date }}</td>
                                <td>{{ $product->price }}</td><input class="col-sm-4" type="hidden" value="{{$product->price}}" name="price"><label></td>
                                    <td>
                                        @csrf
                                        <input type="submit" value="Add Cart" class="btn btn-sm btn-warning" onclick="return alert('Added at shopping cart')">
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>    
                    </table>
                    <hr>
                    <h3>Shopping Cart:</h3>
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
                      <form action="{{ route('shopping.pay')}}" method="GET">
                          <button type="submit" class="btn btn-success">Pay</button>
                      </form>
                      <form action="{{ route('shopping.cancel')}}" method="GET">
                          <button type="submit" class="btn btn-danger">Cancel</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
