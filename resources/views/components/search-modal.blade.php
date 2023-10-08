<div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('article.search')}}">
          <input type="text" name="q" class="form-control" placeholder="Search here....">
          <button type="submit">
            <i class="fi fi-rr-search"></i>
          </button>
        </form>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="ri-close-line"></i>
        </button>
      </div>
    </div>
  </div>