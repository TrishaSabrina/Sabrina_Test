<!-- resources/views/products/create.blade.php -->


    <h1>Create Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" id="image" class="form-control" value="{{ old('image') }}">
        </div>
        <div class="form-group">
            <label for="shop_id">Shop ID</label>
            <input type="number" name="shop_id" id="shop_id" class="form-control" value="{{ old('shop_id') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

