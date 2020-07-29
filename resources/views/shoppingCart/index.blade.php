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
                    <h2>Products:</h2>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                             <th>Name</th>   
                             <th>Quantity</th>   
                             <th>Lot Number</th>   
                             <th>Expiration Date</th>   
                             <th>Price</th>   
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->lot_number }}</td>
                                    <td>{{ $product->expiration_date }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user)  }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" value="Add Cart" class="btn btn-sm btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
