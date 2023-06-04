<h1>Edit Product</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="text" name="image" id="image" class="form-control" value="{{ old('image', $product->image) }}">
</div>

<button type="submit" class="btn btn-primary">Edit</button>
    </form>