<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                * {{$error}}<br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('products.store')}}" method="POST">
                            <br>
                            <h3>Add Products:</h3>
                            <br>
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" name="quantity" class="form-control" placeholder="Quantity" value="{{ old('quantity') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="lot_number" class="form-control" placeholder="Lot Number" value="{{ old('lot_number') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" name="expiration_date" class="form-control" placeholder="Expiration Date" value="{{ old('expiration_date') }}">
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <input type="number" name="price" class="form-control" placeholder="Price" value="{{ old('price') }}">
                                </div>
                                
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>
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
                                </tr>
                            @endforeach
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
