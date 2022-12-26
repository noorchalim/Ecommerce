<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')


    <style>
        .title{
            color: white; 
            padding-top:25px; 
            font-size:25px
        }

        label{
          display: inline-block;
          width: 200px;
        }
    </style>


  </head>
  <body>
   
      <!-- partial -->

        @include('admin.sidebar')

        @include('admin.navbar')
        <!-- partial -->
       
        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center">

            <h1 class="title">Add Product</h1>

            @if(session()->has('message'))

            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">x</button>

            {{ session()->get('message') }}
          </div>
            @endif

            <form action="{{ url('uploadproduct') }}" method="post" enctype="multipart/form-data">

              @csrf
            <div style="padding: 15px;">
                <label>Product title</label>
                <input style="color:black;" type="text" name="title" placeholder="masukkan nama produk disini" required>
            </div>
            <div style="padding: 15px;">
                <label>Harga</label>
                <input style="color:black;" type="text" name="price" placeholder="masukkan harga disini" required>
            </div>
            <div style="padding: 15px;">
                <label>Description</label>
                <input style="color:black;" type="text" name="des" placeholder="masukkan deskripsi disini" required>
            </div>
            <div style="padding: 15px;">
                <label>Quantity</label>
                <input style="color:black;" type="text" name="quantity" placeholder="masukkan jumlah disini" required>
            </div>
            <div style="padding: 15px;">
               <input type="file" name="file">
            </div>

            <div style="padding: 15px;">
              <input class="btn btn-success" type="submit">
            </div>
          </form>

            </div>
        </div>
       
          <!-- partial -->

          @include('admin.script')
  </body>
</html>