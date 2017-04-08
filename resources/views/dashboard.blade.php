@extends('layouts.master')
@section('title')
DashBoard
@endsection
@section('content')
@include('includes.message-block')
<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header>
            <h3><b>What do you have to say?</b></h3>
            <form action="{{ route('post.create')}}" method="post">
            <div class="form-group">
                <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post..."></textarea>
            </div>
             <button class="btn btn-primary" type="submit">Submit</button>
             <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </header>
    </div>
</section>
<section class="row posts">
     <div class="col-md-6 col-md-offset-3">
        <header>
            <h3><b>What other people say...</b></h3>
            @foreach($posts as $post)
            <article class="post" data-postid="{{$post->id}}">
                <p>{{ $post->body }}</p>
                <div class="info">Posted By {{ $post->user->first_name }} on {{ $post->user->created_at }}</div>
                <div class="interaction">
                    <a href="#" class="like">{{ Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like==1 ? 'Already You Liked this' : 'Like' : 'Like' }}  </a>|
                    <a href="#" class="like"> {{ Auth::user()->likes()->where('post_id',$post->id)->first() ? Auth::user()->likes()->where('post_id',$post->id)->first()->like==0 ? 'Already You DisLiked this' : 'DisLike' : 'DisLike' }}   </a>|
                    @if(Auth::user()==$post->user)
                    <a href="#" class="edit">  Edit  </a>|
                    <a href="{{ route('post.delete',['post_id'=> $post->id])}}">  Delete </a>
                    @endif
                </div>
            </article>
            @endforeach
          </header>
     </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
          <form>
              <div class="form-group">
                  <label for="post-body">Edit The Post</label>
                  <textarea class="form-control" name="post-body" id="post-body" rows="6"></textarea>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
var token= '{{ Session::token() }}';
var urlEdit="{{ route('edit') }}";
var urlLike="{{ route('like') }}";
</script>
@endsection
