
<x-layout :username="$username">
    

  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>Ad</span>Server</h1>
      <h2>Creating content takes time, making it profitable shouldn't</h2>
      <div class="d-flex">
        @if(!isset($username) || $username == "")
          <a href="/register" class="btn-get-started scrollto">Register</a>
          <a href="/login" class="mt-2 ml-2"><span style="height:100px" class="py-2.5 px-5 mr-2 text-base font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Log In</span></a>
        @else
        <a href="/advertiser/dashboard" class="btn-get-started scrollto">Dashboard</a>
        @endif
      </div>
    </div>
  </section>

  <main id="main">
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Easy To Use</a></h4>
              <p class="description">Create your Ads and watch them get served. Just like a game, easy and fun!</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Unlimited Ads</a></h4>
              <p class="description">Create Ads as many as you like, we'll serve them all. Kidding maybe only 10k!</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Fast Serve</a></h4>
              <p class="description">Rest assure, your ads will be served in no time. Done!</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Global Serve</a></h4>
              <p class="description">Your Ads can be served to anywhere on this globe. Try it out!</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <h3>Find Out More <span>About Us</span></h3>
          <p>Welcome To AdServe! Easiest Platform to manage your advertisements. Create, store and monitor all your advertisements</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="/img/AdServer.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>AdServer is a websites that allows you to upload your ads, specify audience and monitor your served ads.</h3>
            
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                  <h5>Ability To Modify!</h5>
                  <p>Once created and stored, you can modify your ads with ease.</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                  <h5>Create Mulitple Types of Ads!</h5>
                  <p>From images to GIFS to videos, You can create the ad you like!</p>
                </div>
              </li>
            </ul>
            <p style="font-size:17px">
              Our target is to have both publishers and advertisers share ads with the highest interset satisfied for both sides.
              We offer high serve chances for all our users. With only few clicks, you can advertise your products and get useful stats 
              after serving.
            </p>
          </div>
        </div>

      </div>
    </section>



    <section id="pricing" class="pricing">
      <div class="container " data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <h3>Check our <span>Pricing</span></h3>
          <p>you can start as normal, or you can choose to be Premium or VIP!</p>
        </div>

        <div class="row  flex-row flex justify-content-around">

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Normal</h3>
              <h4><sup>$</sup>7<span> / month</span></h4>
              <ul>
                <li>Base chance for your ad to be served</li>
                <li>Normal people pick this, are you?</li>
                <li>no? You know what to do</li>
              </ul>
              <div class="btn-wrap">
                <a href="/register" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Premium</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>(1.5x) chance better than normal</li>
                <li>Here's a good place to stay</li>
                <li>But maybe there's something else you can do : )</li>
              </ul>
              <div class="btn-wrap">
                <a href="/register" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <h3>VIP</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Yet Better chance than anything else!</li>
                <li>Welcome Mr.Advertiser</li>
                <li>Please rest untill we serve your ads!</li>
              </ul>
              <div class="btn-wrap">
                <a href="/register" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          

        </div>

      </div>
    </section>
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Contact Us</span></h3>
          <p>Feel free to contact us, We'll always listen!</p>
        </div>

        <div class="row flex-row flex justify-content-around" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Adress</h3>
              <p>Barza, HIAST</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>AdServer@company.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+963 994 832 234</p>
            </div>
          </div>

        </div>


      </div>
    </section>

  </main>

</x-layout>