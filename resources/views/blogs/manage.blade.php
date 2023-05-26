<h1 style="text-align: center">Manage Blog Page</h1>
<button style="background-color: blue;"><a style="color: white; text-decoration: none" href="{{route('add.blog')}}">Add Blog</a></button>
<p style="color: chartreuse">{{Session::get('message')}}</p>

<div style="text-align: center">
    <table style="border: 1px solid black; text-align: center">
        <thead>
            <th style="border: 1px solid black">Blog Title</th>
            <th style="border: 1px solid black">Author Name</th>
            <th style="border: 1px solid black">Blog Description</th>
            <th style="border: 1px solid black">Blog Image</th>
            <th style="border: 1px solid black">Action</th>
        </thead>
        @foreach($blogs as $blog)
        <tbody>
            <td style="border: 1px solid black">{{$blog->title}}</td>
            <td style="border: 1px solid black; text-align: center;">{{$blog->author}}</td>
            <td style="border: 1px solid black">{{$blog->description}}</td>
            <td style="border: 1px solid black; text-align: center;">
                <img src="{{asset($blog->image)}}" alt="{{$blog->title}}" height="50" width="70"/>
            </td>
            <td style="border: 1px solid black">
                <button style="background-color: mediumspringgreen"><a href="{{route('edit.blog', ['id' => $blog->id])}}" style="text-decoration: none; color: white">Edit</a></button>
                <button style="background-color: red"><a href="{{route('delete.blog', ['id' => $blog->id])}}" style="text-decoration: none; color: white">Delete</a></button>
            </td>
        </tbody>
        @endforeach
    </table>
</div>
