<h1 style="text-align: center">Update blog page</h1>
<p class="text-center text-success">{{Session::get('message')}}</p>

<div style="">
    <form action="{{route('update.blog', ['id' => $blog->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Blog Title :</p><input type="text" name="title" value="{{$blog->title}}" placeholder="Input Title Here"/>
        <p>Author Name :</p><input type="text" name="author" value="{{$blog->author}}" placeholder="Author Name"/>
        <p>Blog Description :</p><textarea type="text" name="description" placeholder="Input Blog Description Here" rows="10">{{$blog->description}}</textarea>
        <p>Blog Image :</p><input type="file" name="image"/>
            <img src="{{asset($blog->image)}}" height="100" width="100">
        <br/>
        <button style="margin-top: 10px; background-color: dodgerblue" type="submit">Update Blog</button>
    </form>
</div>
