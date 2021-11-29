@extends('layouts.app')

@section('content')

  <img class="blob_img" src="/images/blob.svg" alt="">
  <section class="hero-area hero-bg d-flex align-items-center dot-bg mb-5" id="home">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 pl-0">
          <div class="hero-content">
            <div class="section-content">
              <h1 class="section__title text-color---gradient text-dark fw-bold">
                Lorem ipsum dolor sit amet consectetur.
              </h1>

              <p class="section__desc text-dark pt-3">
                Suspendisse potenti. Phasellus quis magna ac elit gravida
                feugiat. Morbi eu ultricies sem. Proin iaculis est eget tortor
                blandit aliquam.
              </p>
            </div>

            <div class="section-btn-box hero-btn-box pt-4">
              <a class="btn theme-btn" href="#"><i class="fab fa-apple btn-icon mr-1"></i> Google Play</a>

              <a class="btn theme-btn" href="#"><i class="fab fa-google-play btn-icon btn-icon-2"></i> App
                Store</a>
            </div>
          </div>
        </div>
        <!-- end col-lg-6 -->
        <div class="col-lg-6">
          <div class="hero-img text-right margin-top-30px">
            <img src="/images/Phones.png" alt="hero-app" />
          </div>
        </div>
        <!-- end col-lg-6 -->
      </div>
      <!-- end row -->
    </div>
  </section>

  <div class="container">
    <div class="row">

      <div class="col-md-6 mb-4">
        <div style="background: #f5faf7;" class="card p-5">
          <h5 class="mb-4">Lorem ipsum</h5>
          <h3 class="mb-3 fw-bold">
            lorem
          </h3>
          <p class="fw-light">Maecenas faucibus mollis interdum sed posuere porta consectetur cursus porta lobortis.
            Scelerisque id ligula felis nterdum sed posuere porta consectetur cursus porta lobortis. Scelerisque id
            ligula felis.</p>

            <img class="mt-5" src="/images/Phones.png" alt="">
        </div>
      </div>

      <div class="col-md-6">
        <div style="background: #fcf4f6;" class="card p-5">
          <h5 style="color: #d16b86;" class="mb-4">Lorem ipsum</h5>
          <h3 class="mb-3 fw-bold">
            lorem
          </h3>
          <p class="fw-light">Maecenas faucibus mollis interdum sed posuere porta consectetur cursus porta lobortis.
            Scelerisque id ligula felis nterdum sed posuere porta consectetur cursus porta lobortis. Scelerisque id
            ligula felis.</p>

            <img class="mt-5" src="/images/Phones.png" alt="">
        </div>
      </div>


      </div>
    </div>

    <section class="section about my-5">
      <div class="container">
        <div class="row">

          <div class="col-lg-7 col-md-7">
            <div class="about-content-wrap mt-5 mt-md-0">
              <span class="stroke-text">Lorem</span>
              <div class="">
                <h2 class="text-lg mb-3 mt-3 fw-bold">The New Era of Tech Companies </h2>
                <p>Lorem ipsum proin gravida nibh vel velit auctor aliquet. Aeneansollicitudin, lorem quis bibendum
                  auctonisi elit consequat ipsum nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
                  cursusa sit nibh vel velit.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-5 col-md-5">
            <div class="about-img position-relative">
              <img src="/images/id2.svg" class="img-fluid w-100">
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="section-feature" class="mt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="feature-box active">
              <i class="fas fa-heart"></i>
              <h4 class="mt-3 mb-3 fw-bold">Valuable Insight</h4>
              <div class="divider"></div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="feature-box mb-md-3 mt-3">
              <i class="fas fa-globe-europe"></i>
              <h4 class="mt-3 mb-3 fw-bold">Global Audience</h4>
              <div class="divider"></div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit distinctio voluptatem modi non
                dignissimos debitis praesentium. Magnam minima sapiente quidem?</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="feature-box mt-3 mt-lg-5">
              <i class="fas fa-share"></i>
              <h4 class="mt-3 mb-3 fw-bold">Great Community</h4>
              <div class="divider"></div>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore provident temporibus officia delectus,
                harum adipisci. Aliquid possimus doloribus veritatis dicta!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="about-us section pt-5 mb-5">
      <img class="round-shape wow zoomInLeft" data-wow-delay="0.3s" src="/images/round-shape.png" alt="#" />
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 col-12 mb-5">
            <div class="about-left">
              <div class="section-title align-left">
                <span class="wow mb-5" data-wow-delay=".2s">EXPERTS IN FIELD</span>
                <h2 class="wow fadeInUp fw-bold" data-wow-delay=".4s">
                  The WALLID Concept
                </h2>
                <p class="wow fadeInUp" data-wow-delay=".6s">
                  WALLID is a tech driven identity management solution that helps
                  individuals, groups and organisations easily manage membership
                  and facilitate access control via a simple mobile application.
                </p>
                <p class="wow fadeInUp" data-wow-delay=".8s">
                  Everyone with a smart phone can have access to WALLID, and
                  since human beings are social by nature, we all have some
                  affiliation or group we belong to, at the very least, our
                  family.
                </p>
                <div class="author wow fadeInUp" data-wow-delay="1s">
                  <img src="/images/author.png" alt="#" />
                  <div class="content">
                    <h5>FOUNDER<a href="#">@WALLID</a></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-12">
            <div class="about-right wow fadeInRight" data-wow-delay=".4s">
              <img src="/images/id3.svg" alt="#" />
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <img src="/images/animation.svg" alt="">
        </div>
      </div>
    </section>

    <section class="video" id="video">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 align-self-center">
            <div class="row">
              <div class="col-lg-12 ">
                <div class="section-title">
                  <h2 class="fw-bold mb-4">Lorem ipsum dolor.</h2>
                  <p class="fw-light">
                    A animi quae aliquid culpa accusantium
                    dolorum provident dolor repudiandae enim maxime, quo fuga eveniet iure consequatur suscipit eos.
                    Consectetur exercitationem voluptatem minima, ipsam quis laudantium quod vero inventore. Ut dolores
                    ratione velit exercitationem repudiandae dicta placeat delectus ab, soluta consequatur libero.
                  </p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="fun-box">
                  <div class="inner-content">
                    <h5 class="categori"><i class="far fa-check-circle"></i>1 Year Guarantee</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="fun-box">
                  <div class="inner-content">
                    <h5 class="categori"><i class="far fa-check-circle"></i>Free Shipping</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="fun-box mb-0">
                  <div class="inner-content">
                    <h5 class="categori"><i class="far fa-check-circle"></i>Product Return</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="fun-box mb-0">
                  <div class="inner-content">
                    <h5 class="categori"><i class="far fa-check-circle"></i>Dedicated Support</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ai_img col-lg-6">
            <img src="/images/ai-features.png" alt="">
          </div>

        </div>
      </div>
    </section>

      <section class="section section-pricing py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="heading mb-5">
                <span class="stroke-text">Why choose us</span>
                <div class="pl-90">
                  <h2 class="text-white mt-3 fw-bold"> Lorem ipsum dolor</h2>
                  <p class="text-white fw-light">Accusantium provident suscipit dicta magni dolor deserunt nam obcaecati non
                    veritatis optio.</p>
                </div>
              </div>
            </div>
          </div>

          <section class="feature-area section--padding bg-gray patter-bg" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="info-card">
                            <div class="info__icon">
                                <svg class="info__svg" width="35" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m236 452c-5.519531 0-10 4.480469-10 10s4.480469 10 10 10 10-4.480469 10-10-4.480469-10-10-10zm0 0"/><path d="m363.070312 303.070312c3.121094-3.121093 3.828126-7.917968 1.738282-11.804687l-99.957032-185.921875c-.085937-.164062-.175781-.324219-.273437-.480469-1.007813-1.6875-2.441406-2.976562-4.089844-3.800781-.578125-.289062-1.1875-.527344-1.828125-.703125-2.34375-.644531-4.921875-.445313-7.246094.753906 0 0-.003906 0-.007812.003907 0 0 0 0-.003906 0-.175782.09375-.355469.191406-.527344.292968-.003906.003906-.003906.003906-.007812.007813-1.644532.980469-2.914063 2.371093-3.742188 3.96875l-99.933594 185.878906c-2.089844 3.886719-1.382812 8.683594 1.738282 11.804687 23.90625 23.90625 37.070312 55.691407 37.070312 89.5v28.199219l-19.699219 78.804688c-.75 2.988281-.078125 6.152343 1.816407 8.582031 1.894531 2.425781 4.804687 3.84375 7.882812 3.84375h160c3.078125 0 5.988281-1.417969 7.882812-3.847656 1.894532-2.425782 2.566407-5.589844 1.816407-8.578125l-19.699219-78.804688v-28.199219c0-32.902343 12.867188-65.292968 37.070312-89.5zm-107.070312-17.070312c5.515625 0 10 4.484375 10 10s-4.484375 10-10 10-10-4.484375-10-10 4.484375-10 10-10zm-87.765625 8.359375 77.765625-144.640625v118c-11.640625 4.128906-20 15.246094-20 28.28125 0 16.542969 13.457031 30 30 30s30-13.457031 30-30c0-13.035156-8.359375-24.152344-20-28.28125v-118l77.765625 144.640625c-24.046875 26.609375-37.765625 61.566406-37.765625 98.210937v19.429688h-100v-19.429688c0-36.644531-13.355469-71.234374-37.765625-98.210937zm20.574219 197.640625 15-60h104.382812l5 20h-37.191406c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10h42.191406l5 20zm0 0"/><path d="m482 60c16.542969 0 30-13.457031 30-30s-13.457031-30-30-30c-13.035156 0-24.152344 8.359375-28.28125 20h-167.71875v-10c0-5.523438-4.476562-10-10-10h-40c-5.523438 0-10 4.476562-10 10v10h-167.71875c-4.128906-11.640625-15.246094-20-28.28125-20-16.542969 0-30 13.457031-30 30s13.457031 30 30 30c13.035156 0 24.152344-8.371094 28.28125-20.011719h102.804688c-73.738282 32.316407-128.492188 100.480469-139.121094 180.011719h-11.964844c-5.523438 0-10 4.476562-10 10v40c0 5.523438 4.476562 10 10 10h40c5.523438 0 10-4.476562 10-10v-40c0-5.523438-4.476562-10-10-10h-7.835938c13.371094-90.632812 89.75-164.558594 183.835938-177.867188v7.867188c0 5.523438 4.476562 10 10 10h40c5.523438 0 10-4.476562 10-10v-7.867188c94.085938 13.308594 170.464844 87.234376 183.835938 177.867188h-7.835938c-5.523438 0-10 4.476562-10 10v40c0 5.523438 4.476562 10 10 10h40c5.523438 0 10-4.476562 10-10v-40c0-5.523438-4.476562-10-10-10h-11.964844c-10.628906-79.53125-65.382812-147.683594-139.117187-180h102.800781c4.128906 11.640625 15.246094 20 28.28125 20zm-452-20c-5.515625 0-10-4.484375-10-10s4.484375-10 10-10 10 4.484375 10 10-4.484375 10-10 10zm10 220h-20v-20h20zm206-220c0-23.980469 0-17.179688 0-20h20v20zm246 220h-20v-20h20zm-10-240c5.515625 0 10 4.484375 10 10s-4.484375 10-10 10-10-4.484375-10-10 4.484375-10 10-10zm0 0"/>
                                </svg>
                            </div>
                            <h3 class="info__title">Clean Design</h3>
                            <p class="info__desc">Quisque ac quam nibh. Nullam nunc tortor, malesuada sed est eu, ultricies egestas risus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                        </div><!-- end info-card -->
                    </div><!-- end col-lg-4 -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="info-card">
                            <div class="info__icon">
                            <svg class="info__svg" width="35" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M501.23,106.623H266.24l-30.986-58.259c-1.87-3.516-5.527-5.714-9.509-5.714H10.77C4.823,42.65,0,47.473,0,53.42v405.16
                                                c0,5.946,4.823,10.77,10.77,10.77h490.46c5.947,0,10.77-4.824,10.77-10.77V117.393C512,111.446,507.177,106.623,501.23,106.623z
                                                 M21.54,447.811V64.191h197.734l30.986,58.26c1.87,3.515,5.527,5.712,9.509,5.712h230.69v319.647H21.54z"/>
                                            <path d="M163.34,106.842h0.255c5.948,0,10.77-4.822,10.77-10.77c0-5.947-4.822-10.77-10.77-10.77h-0.255
                                                c-5.947,0-10.77,4.823-10.77,10.77C152.57,102.021,157.393,106.842,163.34,106.842z"/>
                                            <path d="M132.711,85.299H53.417c-5.947,0-10.77,4.823-10.77,10.77c0,5.948,4.823,10.77,10.77,10.77h79.294
                                                c5.947,0,10.77-4.822,10.77-10.77C143.481,90.122,138.658,85.299,132.711,85.299z"/>
                                            <path d="M358.173,202.366c-32.76-8.975-67.102-23.54-96.698-41.013c-3.378-1.994-7.572-1.994-10.951,0
                                                c-30.889,18.236-62.52,31.651-96.697,41.013c-4.681,1.282-7.925,5.536-7.925,10.388v52.666c0,56.184,25.936,93.39,47.693,114.708
                                                c25.059,24.552,52.051,35.989,62.405,35.989s37.347-11.437,62.405-35.989c21.756-21.318,47.693-58.524,47.693-114.708v-52.666
                                                C366.097,207.902,362.852,203.649,358.173,202.366z M344.558,265.42c0,48.076-21.891,80.024-40.255,98.359
                                                c-21.746,21.712-43.863,30.273-48.303,30.787c-4.44-0.514-26.557-9.075-48.303-30.787
                                                c-18.364-18.335-40.255-50.283-40.255-98.359v-44.532c31.039-9.147,60.141-21.571,88.562-37.809
                                                c27.799,15.83,58.146,28.782,88.555,37.802V265.42z"/>
                                            <path d="M210.851,280.607c-4.207-4.206-11.024-4.206-15.232,0c-4.206,4.206-4.206,11.025,0,15.231l35.021,35.021
                                                c2.103,2.103,4.859,3.155,7.615,3.155s5.512-1.051,7.615-3.155l70.513-70.512c4.206-4.206,4.206-11.025,0-15.232
                                                c-4.206-4.206-11.023-4.205-15.232,0l-62.897,62.897L210.851,280.607z"/>
                                            <path d="M380.647,405.166h-0.256c-5.947,0-10.77,4.822-10.77,10.77c0,5.947,4.823,10.77,10.77,10.77h0.256
                                                c5.947,0,10.77-4.824,10.77-10.77C391.417,409.988,386.594,405.166,380.647,405.166z"/>
                                            <path d="M458.579,405.164h-47.302c-5.948,0-10.77,4.822-10.77,10.77c0,5.947,4.823,10.77,10.77,10.77h47.302
                                                c5.947,0,10.77-4.823,10.77-10.77C469.349,409.986,464.526,405.164,458.579,405.164z"/>
                                        </g>
                                    </g>
                                </g>
                                </svg>
                            </div>
                            <h3 class="info__title">Secure Data</h3>
                            <p class="info__desc">Quisque ac quam nibh. Nullam nunc tortor, malesuada sed est eu, ultricies egestas risus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                        </div><!-- end info-card -->
                    </div><!-- end col-lg-4 -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="info-card">
                            <div class="info__icon">
                                <svg class="info__svg" width="35" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m490.033 221.672c14.166-14.166 21.967-33 21.967-53.033 0-11.086-2.419-21.931-7.052-31.82 4.633-9.888 7.052-20.733 7.052-31.819 0-20.033-7.801-38.867-21.967-53.033s-33-21.967-53.033-21.967c-11.086 0-21.931 2.419-31.82 7.052-9.888-4.633-20.734-7.052-31.82-7.052-20.033 0-38.867 7.801-53.033 21.967-2.51 2.51-4.839 5.195-6.97 8.033h-114.715c-2.13-2.837-4.46-5.523-6.97-8.033-14.165-14.166-32.999-21.967-53.032-21.967-11.086 0-21.931 2.419-31.82 7.052-9.889-4.633-20.734-7.052-31.82-7.052-20.033 0-38.867 7.801-53.033 21.967-14.166 14.166-21.967 33-21.967 53.033 0 11.086 2.419 21.931 7.052 31.82-4.633 9.888-7.052 20.734-7.052 31.82 0 20.033 7.801 38.867 21.967 53.033 2.51 2.51 5.195 4.839 8.033 6.97v54.716c-2.837 2.13-5.522 4.459-8.033 6.969-14.166 14.165-21.967 32.999-21.967 53.032 0 11.086 2.419 21.931 7.052 31.82-4.633 9.889-7.052 20.734-7.052 31.82 0 20.033 7.801 38.867 21.967 53.033s33 21.967 53.033 21.967c11.086 0 21.931-2.419 31.82-7.052 9.889 4.633 20.734 7.052 31.82 7.052 20.033 0 38.867-7.801 53.032-21.966 2.51-2.51 4.84-5.196 6.97-8.034h114.716c2.13 2.838 4.459 5.523 6.97 8.033 14.166 14.166 33 21.967 53.033 21.967 11.086 0 21.931-2.419 31.82-7.052 9.888 4.633 20.733 7.052 31.819 7.052 20.033 0 38.867-7.801 53.033-21.967s21.967-33 21.967-53.033c0-11.086-2.419-21.931-7.052-31.82 4.633-9.889 7.052-20.734 7.052-31.82 0-20.033-7.801-38.867-21.968-53.034-2.51-2.51-5.195-4.838-8.032-6.968v-54.716c2.837-2.13 5.523-4.46 8.033-6.97zm-30.553 82.694c3.415 1.979 6.557 4.393 9.34 7.174 8.5 8.5 13.18 19.8 13.18 31.82 0 8.503-2.355 16.749-6.81 23.843l-5.009 7.977 5.009 7.977c4.455 7.095 6.81 15.34 6.81 23.843 0 12.02-4.681 23.32-13.18 31.82s-19.8 13.18-31.82 13.18c-8.503 0-16.749-2.355-23.843-6.81l-7.977-5.009-7.977 5.009c-7.095 4.455-15.34 6.81-23.843 6.81-12.02 0-23.32-4.681-31.82-13.181-2.781-2.781-5.195-5.923-7.174-9.338l-4.333-7.48h-148.066l-4.333 7.48c-1.979 3.416-4.393 6.558-7.174 9.339-8.5 8.5-19.8 13.18-31.82 13.18-8.503 0-16.749-2.355-23.843-6.81l-7.977-5.009-7.977 5.009c-7.094 4.455-15.34 6.81-23.843 6.81-12.02 0-23.32-4.681-31.82-13.18s-13.18-19.8-13.18-31.82c0-8.503 2.355-16.749 6.81-23.843l5.009-7.977-5.009-7.977c-4.455-7.095-6.81-15.34-6.81-23.843 0-12.02 4.681-23.32 13.18-31.819 2.783-2.783 5.926-5.197 9.34-7.175l7.48-4.334v-88.064l-7.48-4.334c-3.416-1.979-6.558-4.393-9.34-7.174-8.5-8.5-13.18-19.8-13.18-31.82 0-8.503 2.355-16.749 6.81-23.843l5.009-7.977-5.009-7.977c-4.455-7.094-6.81-15.34-6.81-23.843 0-12.02 4.681-23.32 13.18-31.82s19.8-13.18 31.82-13.18c8.503 0 16.749 2.355 23.843 6.81l7.977 5.009 7.977-5.009c7.095-4.455 15.34-6.81 23.843-6.81 12.02 0 23.32 4.681 31.82 13.18 2.782 2.782 5.195 5.924 7.174 9.34l4.334 7.48h148.064l4.334-7.48c1.979-3.416 4.393-6.558 7.174-9.34 8.5-8.5 19.8-13.18 31.82-13.18 8.503 0 16.749 2.355 23.843 6.81l7.977 5.009 7.977-5.009c7.094-4.455 15.34-6.81 23.843-6.81 12.02 0 23.32 4.681 31.82 13.18s13.18 19.8 13.18 31.82c0 8.503-2.355 16.749-6.81 23.843l-5.009 7.977 5.009 7.977c4.455 7.095 6.81 15.34 6.81 23.843 0 12.02-4.681 23.32-13.18 31.82-2.782 2.782-5.924 5.195-9.34 7.174l-7.48 4.334v88.064z"/><path d="m90 392h332v-272h-332zm64.457-30c4.404-1.88 9.279-3.792 14.698-5.703 80.28-28.318 82.976-29.264 222.845-29.296v34.999zm-34.457-16.37v-68.414c30.76 2.188 60.158 11.12 87.574 26.671 4.727 2.681 9.036 5.37 12.92 7.964-50.274 9.707-81.453 22.61-100.494 33.779zm272-195.63v147.075c-51.971.502-95.104 3.604-130.864 8.269-16.268-14.695-65.958-53.511-141.136-58.203v-97.141z"/><path d="m317 270c24.813 0 45-20.187 45-45s-20.187-45-45-45-45 20.187-45 45 20.187 45 45 45zm0-60c8.271 0 15 6.729 15 15s-6.729 15-15 15-15-6.729-15-15 6.729-15 15-15z"/></g>
                                </svg>
                            </div>
                            <h3 class="info__title">Retina Ready Design</h3>
                            <p class="info__desc">Quisque ac quam nibh. Nullam nunc tortor, malesuada sed est eu, ultricies egestas risus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                        </div><!-- end info-card -->
                    </div><!-- end col-lg-4 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        </div>
      </section>
  @endsection
