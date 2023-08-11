<ul>
    @foreach($categories as $category)
        <li>
            {{$category->title}}
            @if(count($category->subCategories))
                @include('admin.categories.category', ['categories' => $category->subCategories])
            @else
        </li>
        @endif
    @endforeach
</ul>
