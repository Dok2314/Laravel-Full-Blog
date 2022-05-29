<div class="comment-box">
    <span class="commenter-pic">
        <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-High-Quality-Image.png" class="img-fluid">
    </span>
    <span class="commenter-name">
        <a href="#">{{ $comment->user->name }}</a>
        <span>id{{ $comment->id }}</span>
        <span class="comment-time">
            {{ optional($comment->created_at)->diffForHumans() }}
        </span>
    </span>
    <p class="comment-txt more">{{ $comment->comment }}</p>
    <div class="comment-meta">
{{--        <button class="comment-like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 99</button>--}}
{{--        <button class="comment-dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 149</button>--}}
        <button class="comment-reply reply-popup"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>
    </div>
    <div class="comment-box add-comment reply-box pb-4">
        <span class="commenter-pic">
            <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-High-Quality-Image.png" class="img-fluid">
        </span>
        <span class="commenter-name">
            <form action="{{ route('comment.create') }}" method="post">
                @csrf
                <input type="text" name="title" id="title" placeholder="Введите название" value="{{ old('title') }}" class="form-control">
                <br>
                <input name="comment" id="comment" class="form-control" value="{{ old('comment') }}" placeholder="Ваш коментарий">
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <button type="submit" class="btn btn-default">Reply</button>
                <button type="cancel" class="btn btn-default reply-popup">Cancel</button>
            </form>
        </span>
    </div>
    @foreach($comment->descendants AS $comment)
        @include('CRUD.articles.comments.body')
    @endforeach
</div>
@php /** @var \App\Models\Comment $comment */ @endphp
