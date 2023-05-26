<h1>This is User Register Page</h1>
<p class="text-center text-success">{{Session::get('message')}}</p>

<div>
    <form action="{{route('create.user')}}" method="POST">
        @csrf
        <p>Your Full Name</p>
        <input type="text" name="name" placeholder="Your Full Name"/>
        <p>Your Email</p>
        <input type="email" name="email" placeholder="Your Email"/>
        <p>Your Phone Number</p>
        <input type="number" name="number" placeholder="Phone Number"/>
        <p>Your Password</p>
        <input type="password" name="password" placeholder="Your Password"/>
        <br>
        <br>
        <button type="submit">Register Now</button>
    </form>
    <br>
    <p>Already Have an Account!</p>
    <button><a href="{{route('login')}}">Login</a> </button>
</div>
