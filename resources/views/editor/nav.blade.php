<div class="row mb-5">
    <div class="col-lg-12 justify-center d-flex gap-3">
        <a href="{{route('editor.dashboard')}}" class="@if(request()->routeIs('editor.dashboard')) btn-two @else btn-one @endif">Dashboard</a>
        <a href="{{route('editor.article.index')}}" class="@if(request()->routeIs('editor.article.index')) btn-two @else btn-one @endif">Articles</a>
        <a href="{{route('editor.article.create')}}" class="@if(request()->routeIs('editor.article.create')) btn-two @else btn-one @endif">Add New Article</a>
    </div>
</div>