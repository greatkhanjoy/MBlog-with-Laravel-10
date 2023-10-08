<div class="row mb-5">
    <div class="col-lg-12 justify-center d-flex gap-3">
        <a href="{{route('admin.dashboard')}}" class="@if(request()->routeIs('admin.dashboard')) btn-two @else btn-one @endif">Dashboard</a>
        <a href="{{route('admin.article.index')}}" class="@if(request()->routeIs('admin.article.index')) btn-two @else btn-one @endif">Articles</a>
        <a href="{{route('admin.article.create')}}" class="@if(request()->routeIs('admin.article.create')) btn-two @else btn-one @endif">Add New Article</a>
        <a href="{{route('admin.category.index')}}" class="@if(request()->routeIs('admin.category.index')) btn-two @else btn-one @endif">Categories</a>
        <a href="{{route('admin.tag.index')}}" class="@if(request()->routeIs('admin.tag.index')) btn-two @else btn-one @endif">Tags</a>
    </div>
</div>