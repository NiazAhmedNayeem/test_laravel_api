<h1 style="text-align: center">Add blog page</h1>
<p class="text-center text-success">{{Session::get('message')}}</p>

<div style="">
    <form action="{{route('create.blog')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Blog Title :</p><input type="text" name="title" placeholder="Input Title Here"/>
        <p>Author Name :</p><input type="text" name="author" placeholder="Author Name"/>
        <p>Blog Description :</p><textarea type="text" name="description" placeholder="Input Blog Description Here" rows="5"></textarea>
        <p>Blog Image :</p><input type="file" name="image"/><br/>
        <button style="margin-top: 10px; background-color: dodgerblue" type="submit">Create Blog</button>
    </form>
</div>
