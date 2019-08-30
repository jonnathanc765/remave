<div class="col-md-6 col-lg-4 categories">
    <div class="card text-center card-categorie">
        <div class="card-product__img">
            <a href="{{ route('categories.show', $category) }}">
                <img class="card-img" src="{{ Storage::url($category->image) }}" alt="">
            </a>
        </div>
        <div class="card-body">
            <h4 class="card-product__title">
                <a href="{{ route('categories.show', $category) }}">
                    {{ $category->name }}
                </a>
            </h4>
        </div>
    </div>
</div>