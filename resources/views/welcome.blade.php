<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stripe Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  

  <form action="{{ route('stripe.payment') }}" method="post">
@csrf
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Net Price</th>
          
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td> <input type="text" name="product_name" value="Tsirt" readonly></td>
            <td>
                <input type="text" name="quantity" value="2">
            </td>
            <td>
                <input type="text" name="price" value="20">
            </td>
            <td><input type="text" name="net_total" value="40"></td>
          </tr>
      
          <tr>
           
            <td colspan="4" style="text-align: right">
              Total
            </td>
            <td >
                <input type="text" name="subtotal" value="40" readonly>
            
            </td>
          </tr>
          <tr>
           
            <td colspan="4" style="text-align: right">
             
            </td>
            <td >
                <button type="submit" class="btn btn-info" style="text-align: right">
                    Checkout
                </button>
            
            </td>
          </tr>
          
        </tbody>
       
      </table>
     
    </form>   
  
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>