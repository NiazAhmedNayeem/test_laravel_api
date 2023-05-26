<h1>This is User Login Page</h1>
<p style="color: red">{{Session::get('message')}}</p>

<div>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <p>Your Phone Number</p>
        <input type="number" name="number" placeholder="Phone Number"/>
        <p>Your Password</p>
        <input type="password" name="password" placeholder="Your Password"/>
        <br>
        <br>
        <button type="submit">Login Now</button>
    </form>
    <br>
    <p>Have no Account! Register First</p>
    <button><a href="{{route('register')}}">Register</a> </button>
</div>
