<nav class="container my-2 nav-secundario">
    <ul class="main">
        @foreach ($categories as $category)
        <li>
            <div>
                <span>{{ $category->name }}</span>

                <div class="submenu">
                    <ul>
                        <li>
                            <h4>{{ $category->name }}</h4>
                        </li>
                        @foreach ($category->subcategories->take(12) as $subcategory)
                            <li><a href="{{ route('categories.show',$category) }}">{{ $subcategory->name }}</a></li>
                        @endforeach
                    </ul>
                    <img src="{{ Storage::url($category->image) }}" alt="">
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</nav>
