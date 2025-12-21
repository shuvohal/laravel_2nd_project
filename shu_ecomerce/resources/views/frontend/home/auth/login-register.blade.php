
@extends('frontend.master')

@section('content')

<div class="breadcrumbs d-flex flex-row align-items-center">
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Login / Register</a></li>
    </ul>
</div>

<style>
  /* IMPORTANT: scoped styles only (no body, no global *) */
  .auth-page{
    padding: 40px 0 80px;
    background: #f4f6fb;
  }

  .auth-wrap{
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 15px;
    display: flex;
    justify-content: center;
  }

  .auth-box{
    width: 900px;
    max-width: 100%;
    height: 520px;
    background:#fff;
    border-radius: 12px;
    box-shadow: 0 12px 35px rgba(0,0,0,.12);
    overflow: hidden;
    position: relative;
  }

  .auth-form{
    position:absolute;
    top:0; height:100%;
    width:50%;
    transition: all .6s ease-in-out;
  }

  .auth-signin{ left:0; z-index:2; }
  .auth-signup{ left:0; opacity:0; z-index:1; }

  .auth-box.right-panel-active .auth-signin{ transform: translateX(100%); }
  .auth-box.right-panel-active .auth-signup{
    transform: translateX(100%);
    opacity:1;
    z-index:5;
    animation: authShow .6s;
  }

  @keyframes authShow {
    0%,49.99% { opacity:0; z-index:1; }
    50%,100% { opacity:1; z-index:5; }
  }

  .auth-box form{
    background:#fff;
    height:100%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding: 0 70px;
    text-align:center;
  }

  .auth-box h1{ font-size:28px; margin-bottom: 10px; color:#111; }
  .auth-subtext{ font-size:12px; color:#888; margin: 10px 0 18px; }

  .auth-socials{ display:flex; gap:10px; margin: 10px 0; }
  .auth-socials a{
    width:36px; height:36px;
    display:flex; align-items:center; justify-content:center;
    border:1px solid #ddd;
    border-radius: 50%;
    text-decoration:none;
    color:#333;
    font-weight:bold;
    transition:.2s;
  }
  .auth-socials a:hover{ background:#f3f3f3; }

  .auth-box input{
    width: 100%;
    background:#f2f3f5;
    border:none;
    padding: 12px 14px;
    margin: 8px 0;
    border-radius: 6px;
    outline:none;
    font-size: 13px;
  }

  .auth-btn{
    border:none;
    padding: 12px 32px;
    border-radius: 22px;
    background: #ff3c3c;
    color:#fff;
    font-weight: 700;
    letter-spacing:.6px;
    cursor:pointer;
    margin-top: 14px;
    transition: .2s;
  }
  .auth-btn:hover{ filter: brightness(.95); transform: translateY(-1px); }
  .auth-btn:active{ transform: translateY(0px); }

  .auth-ghost{ background: transparent; border: 1.8px solid #fff; }

  .auth-overlay-container{
    position:absolute;
    top:0; left:50%;
    width:50%; height:100%;
    overflow:hidden;
    transition: transform .6s ease-in-out;
    z-index: 100;
  }
  .auth-box.right-panel-active .auth-overlay-container{
    transform: translateX(-100%);
  }

  .auth-overlay{
    position:relative;
    left:-100%;
    height:100%;
    width:200%;
    background: linear-gradient(135deg, #ff3c3c, #ff6a4a);
    color:#fff;
    transform: translateX(0);
    transition: transform .6s ease-in-out;
  }
  .auth-box.right-panel-active .auth-overlay{
    transform: translateX(50%);
  }

  .auth-overlay-panel{
    position:absolute;
    top:0;
    height:100%;
    width:50%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    padding: 0 60px;
  }

  .auth-overlay-left{ transform: translateX(-20%); left:0; }
  .auth-overlay-right{ right:0; transform: translateX(0); }

  .auth-box.right-panel-active .auth-overlay-left{ transform: translateX(0); }
  .auth-box.right-panel-active .auth-overlay-right{ transform: translateX(20%); }

  .auth-overlay-panel h2{ font-size: 30px; margin-bottom: 10px; }
  .auth-overlay-panel p{
    font-size: 12px;
    opacity: .95;
    line-height: 1.6;
    margin-bottom: 18px;
    max-width: 320px;
  }

  @media (max-width: 820px){
    .auth-box{ height:auto; }
    .auth-overlay-container{ display:none; }
    .auth-form{ width:100%; position:relative; transform:none !important; opacity:1 !important; }
    .auth-signup{ display:none; }
    .auth-box.right-panel-active .auth-signin{ display:none; }
    .auth-box.right-panel-active .auth-signup{ display:block; }
    .auth-box form{ padding: 35px 25px; }
  }
</style>

<div class="auth-page">
  <div class="auth-wrap">
    <div class="auth-box" id="authBox">

      <!-- SIGN UP -->
      <div class="auth-form auth-signup">
        <form action="{{url('/user/registation')}}" method="post">
            @csrf
          <h1>Create Account</h1>

          <div class="auth-socials">
            <a href="#" title="Facebook">f</a>
            <a href="#" title="Google">G+</a>
            <a href="#" title="LinkedIn">in</a>
          </div>

          <div class="auth-subtext">or use your email for registration</div>

          <input type="text" name="name" placeholder="Name" />
          <input type="email" name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Password" />
          <input type="text" name="phone" placeholder="Phone" />


          <button class="auth-btn" type="submit">SIGN UP</button>
        </form>
      </div>

      <!-- SIGN IN -->
      <div class="auth-form auth-signin">
        <form action="{{url('/user/login')}}" method="post">
            @csrf
          <h1>Sign in</h1>

          <div class="auth-socials">
            <a href="#" title="Facebook">f</a>
            <a href="#" title="Google">G+</a>
            <a href="#" title="LinkedIn">in</a>
          </div>

          <div class="auth-subtext">or use your account</div>

          <input type="email" name="email" placeholder="Email" />
           <input type="password" name="password" placeholder="Password" />

          <button class="auth-btn" type="submit">SIGN IN</button>
        </form>
      </div>

      <!-- OVERLAY -->
      <div class="auth-overlay-container">
        <div class="auth-overlay">

          <div class="auth-overlay-panel auth-overlay-left">
            <h2>Welcome Back!</h2>
            <p>To keep connected with us please login with your personal info</p>
            <button class="auth-btn auth-ghost" type="button" id="authSignIn">SIGN IN</button>
          </div>

          <div class="auth-overlay-panel auth-overlay-right">
            <h2>Hello, Friend!</h2>
            <p>Enter your personal details and start journey with us</p>
            <button class="auth-btn auth-ghost" type="button" id="authSignUp">SIGN UP</button>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const box = document.getElementById('authBox');
    const signUpBtn = document.getElementById('authSignUp');
    const signInBtn = document.getElementById('authSignIn');

    if (signUpBtn && signInBtn && box) {
      signUpBtn.addEventListener('click', () => box.classList.add('right-panel-active'));
      signInBtn.addEventListener('click', () => box.classList.remove('right-panel-active'));
    }
  });
</script>




{{-- show messages --}}
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $err)
        <li>{{ $err }}</li>
      @endforeach
    </ul>
  </div>
@endif

{{-- YOUR LOGIN / REGISTER UI CODE HERE --}}

@endsection
