<div class="sidebar-categories">
    <div class="head">Explora las categorias</div>
    <ul class="main-categories">
        <li class="common-filter">
            <ul>
                @foreach ($categoriesSideBar as $category)
                <li class="filter-list" onclick="location.href='{{ route('categories.show', $category) }}'">
                    <input class="pixel-radio" type="radio" id="{{ $category->name }}" name="brand">
                    <label for="{{ $category->name }}">{{ $category->name }}
                        <span>
                            ({{ $category->products->count() }})
                        </span>
                    </label>
                </li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
