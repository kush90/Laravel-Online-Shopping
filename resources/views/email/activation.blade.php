@include('layout.header')
<div class="well">
    <h2>Account Activation</h2>
     <p>
         Hello  {{$name}}
     </p>
    <p>To activate your account, please click the following link below..</p>
    <a href="{{url('user/activation',$token)}}"><button class="btn btn-primary">Verify</button> </a>
</div>
@include('layout.footer')