@include('layout.header')
<div class="well">
    <h2>Password Reset</h2>
    <p>
        Hello  {{$name}}
    </p>
    <p>You are receiving this email because we received a password reset request for your account</p>
    <a href="{{url('user/activation',$token)}}"><button class="btn btn-primary">Reset Password</button> </a>
</div>
@include('layout.footer')