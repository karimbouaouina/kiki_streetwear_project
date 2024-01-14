@extends('layouts.landingLayout')

@section('content')
<div class="mobile-container">
    <header>

    </header>
    <main>
      <article class="text-info">
        <h2>DROP 1</h2>
        <h2>IS LIVE</h2>
        <p style="text-align: left; !important">Add your email address below to stay up-to-date with announcements and our launch proposals.</p>
        <section class = "email-signup">
          <form>
            <input class="email-input" type="email" required placeholder="Email Address" name="email-address">
            <input class="email-submit" value="Go" type="submit" text="Go" for="email-address"></input>
          </form>
        </section>
      </article>
    </main>
  </div>
  <div class="hero-image-desktop">
    <img src="https://i.ibb.co/f1CngbG/Tshirtt3.png" alt="Femail athlete squinting towards the camera.">
  </div>
@endsection
