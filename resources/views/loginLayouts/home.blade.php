
{{-- <div class="category-row">
    @foreach ($featured_category as $category)
        <div class="category">
            <img src="{{ asset('assets/uploads/category/' . $category->image) }}"
                class="featurette-image img-fluid mx-auto" alt="{{ $category->name }}" width="70">
            <h4 class="category-name">{{ $category->name }}</h4>
            <div class="subcategories hidden">
                @foreach ($category->subcategories as $subcategory)
                    <a href="{{ route('viewsubcategory', $subcategory->slug) }}">
                        <p>{{ $subcategory->name }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</div> --}}