@extends('layouts.master')

@section('content')
    <div class="profile-wrap ptb-100">
        <div class="container">
            @include('editor.nav')
            @include('components.error')
            @include('components.success')
            <div class="row mb-5 flex-d gap-4">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{Auth()->user()->articles->count()}}</h5>
                      <p class="card-text">Total Articles</p>
                    </div>
                  </div>
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{Auth()->user()->articles->where('status', 'published')->count()}}</h5>
                      <p class="card-text">Published</p>
                    </div>
                  </div>
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{Auth()->user()->articles->where('status', 'pending')->count()}}</h5>
                      <p class="card-text">Pending</p>
                    </div>
                  </div>
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{Auth()->user()->articles->where('status', 'rejected')->count()}}</h5>
                      <p class="card-text">Rejected</p>
                    </div>
                  </div>
            </div>

            <div class="row mb-5">
              <div class="d-flex gap-2">
                <form action="{{route('notification.bulkupdate', Auth()->user()->id)}}" method="post">
                  @csrf
                    @method('PUT')
                  <button type="submit" class="btn-one" >Mark all as Read </button>
                </form>
                <form action="{{route('notification.destroyAll', Auth()->user()->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-one">Delete All</button>
                </form>
                <form action="{{route('notification.destroyAllRead', Auth()->user()->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-one">Delete All Read</button>
                </form>
              </div>
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Message</th>
                      <th scope="col">status</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  @if ($notifications->count() > 0)
                  <tbody>

                    @foreach ($notifications as $notification )    
                    <tr>
                      <td>{!! $notification->message!!}</td>
                      <td>{{ $notification->status}}</td>
                      <td>{{$notification->created_at->format('M d, Y | g:i A')}}</td>
                      <td class="d-flex gap-2">
                        @if($notification->status === 'unread')
                        <form action="{{route('notification.update', $notification->id)}}" method="post">
                          @csrf
                            @method('PUT')
                          <button type="submit" class="btn-two" >Mark as Read </button>
                        </form>
                          @endif
                        <form action="{{route('notification.destroy', $notification->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-two" >Delete </button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                  @else
                  <tbody>
                    <tr>
                      <td colspan="5">Sorry no notifications available!</td>
                    </tr>

                </tbody>
                  @endif
                  
                </table>
                {{$notifications->links('components.pagination')}}
          </div>
        </div>
    </div>
@endsection