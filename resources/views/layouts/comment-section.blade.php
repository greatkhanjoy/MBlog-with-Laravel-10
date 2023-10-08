<h3 class="comment-box-title">{{$article->comments->count()}} Comments</h3>
<div class="comment-item-wrap">
   @foreach ($article->comments->where('parent_id', 0) as $comment )      
      <div class="comment-item">
         <div class="comment-author-img">
            <img src="{{asset($comment->user->image)}}" alt="{{$comment->user->name}}">
         </div>
         <div class="comment-author-wrap">
            <div class="comment-author-info">
               <div class="row align-items-start">
                  <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                     <div class="comment-author-name">
                        <h5>{{$comment->user->name}}</h5>
                        <span class="comment-date">{{$comment->created_at->format('M d, Y | g:i A')}}</span>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                     <a href="#cmt-form" data-id={{$comment->id}} class="reply-btn">Reply</a>
                  </div>
                  <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                     <div class="comment-text">
                        <p>{{$comment->comment}}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @if ($comment->children->count() > 0)
         @foreach ($comment->children as $children )         
         <div class="comment-item reply">
            <div class="comment-author-img">
               <img src="{{asset($children->user->image)}}" alt="{{$children->user->name}}">
            </div>
            <div class="comment-author-wrap">
               <div class="comment-author-info">
                  <div class="row align-items-start">
                     <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                        <div class="comment-author-name">
                           <h5>{{$children->user->name}} </h5>
                           <span class="comment-date">{{$children->created_at->format('M d, Y | g:i A')}}</span>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                        <a href="#cmt-form" data-id={{$children->id}} class="reply-btn">Reply</a>
                     </div>
                     <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                        <div class="comment-text">
                           <p>{{$children->comment}}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
            @if ($children->children->count() > 0)
               @foreach ($children->children as $grandchildren ) 
               <div class="comment-item sub-reply">
                  <div class="comment-author-img">
                     <img src="{{asset($grandchildren->user->image)}}" alt="{{$grandchildren->user->name}}">
                  </div>
                  <div class="comment-author-wrap">
                     <div class="comment-author-info">
                        <div class="row align-items-start">
                           <div class="col-md-9 col-sm-12 col-12 order-md-1 order-sm-1 order-1">
                              <div class="comment-author-name">
                                 <h5>{{$grandchildren->user->name}} </h5>
                                 <span class="comment-date">{{$grandchildren->created_at->format('M d, Y | g:i A')}}</span>
                              </div>
                           </div>
                           <div class="col-md-3 col-sm-12 col-12 text-md-end order-md-2 order-sm-3 order-3">
                              
                           </div>
                           <div class="col-md-12 col-sm-12 col-12 order-md-3 order-sm-2 order-2">
                              <div class="comment-text">
                                 <p>{{$grandchildren->comment}}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            @endif
         @endforeach

      @endif

   @endforeach

</div>
<div id="cmt-form">
   <div class="mb-30">
      <h3 class="comment-box-title">Leave A Comment</h3>
      <p>Your email address will not be published. Required fields are marked.</p>
   </div>
      
   @auth
   <form action="{{route('comments.store')}}" class="comment-form" method="POST">
      @csrf
      <div class="row">
         <div class="col-md-6">
            <div class="form-group">
               <input type="hidden" id="parent_id" name="parent_id" required value="0">
               <input type="hidden" id="article_id" name="article_id" required value="{{$article->id}}">
            </div>
         </div>
         <div class="col-lg-12">
            <div class="form-group">
               <textarea name="comment" id="messages" cols="30" rows="10" placeholder="Please Enter Your Comment Here"></textarea>
            </div>
         </div>

         <div class="col-md-12 mt-3">
            <button class="btn-two">Post A Comment<i class="flaticon-right-arrow"></i></button>
         </div>
      </div>
   </form>
   @else
      <p>Please <a href="{{route('login')}}">Login</a> in to comment.</p>
   @endauth
</div>

@push('scripts')
   <script>
      $(document).ready(function() {
         $(document).on('click', '.reply-btn', function(){
            $('#parent_id').val($(this).data('id'));
         })
      })
   </script>
@endpush