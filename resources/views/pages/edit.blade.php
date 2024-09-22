<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gate Pass Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Simple Gate Pass Operation</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('data.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-header bg-dark">
                        <h3 class="text-white text-center">Edit Product</h3>
                    </div>
                    <form action="{{ route('data.update',$product->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label h5" for="">Asset Name</label>
                            <input type="text" value="{{ old('asset',$product->asset_name) }}" name="asset" id="" class="@error('asset') is-invalid @enderror form-control form-control-lg">
                            @error('asset')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label h5" for="">Person Name</label>
                            <input type="text" value="{{ old('person',$product->person_name) }}" name="person" id="" class=" @error('person') is-invalid @enderror form-control form-control-lg">
                            @error('person')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary" type="submit">Submit</button>
                        </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>