<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gate Pass Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
  </head>
  <body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Gate Pass Operation</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('data.create') }}" class="btn btn-dark">Create</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            </div>
        @endif
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-header bg-dark">
                        <h3 class="text-white text-center">Products</h3>
                    </div>
                   <div class="card-body">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Asset Name</th>
                                <th>Person Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->isNotEmpty())
                                @foreach ($products as $i)
                                    
                               
                            
                            <tr>
                                <td>{{ $i->id }}</td>
                                <td>{{ $i->asset_name }}</td>
                                <td>{{ $i->person_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($i->created_at)->format('d M, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($i->created_at)->format('h:i:s') }}</td>
                                <td><a href="{{ route('data.edit',$i->id) }}" class="btn btn-dark">Edit</a>
                                     <a href="#" onclick="deletion({{ $i->id }})" class="btn btn-danger">Delete</a></td>
                                     <form id="form-action-{{ $i->id }}" action="{{ route('data.delete',$i->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        
                                     </form>
                                
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Asset Name</th>
                                <th>Person Name</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                   </div>

                </div>
            </div>
        </div>
    </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example');
        function deletion(id){
            if(confirm("Are you sure you want to delete this product?")){
                document.querySelector('#form-action-'+id).submit();
            }
        }
    </script>
  </body>
</html>