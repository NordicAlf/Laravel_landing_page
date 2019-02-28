<footer class="footer_wrapper" id="contact">
  <div class="container">
    <section class="page_section contact" id="contact">
      <div class="contact_section">
        <h2>Contact Us</h2>
        <div class="row">
          <div class="col-lg-4">

          </div>
          <div class="col-lg-4">

          </div>
          <div class="col-lg-4">

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 wow fadeInLeft">
		 <div class="contact_info">
                            <div class="detail">
                                <h4>Где я</h4>
                                <p>Беларусь, г.Минск</p>
                            </div>
                            <div class="detail">
                                <h4>Мой телефон</h4>
                                <p>+375 25 000-00-00</p>
                            </div>
                            <div class="detail">
                                <h4>Моя почта</h4>
                                <p>sver4ok@protonmail.com</p>
                            </div>
                        </div>



          <ul class="social_links">
            <li class="twitter animated bounceIn wow delay-02s"><a href="https://github.com/sver4-ok"><i class="fab fa-github"></i></i></a></li>
          </ul>
        </div>
        <div class="col-lg-8 wow fadeInLeft delay-06s">
          <div class="form">
          <form action="{{ route('home') }}" method="POST">
            <input class="input-text" type="text" name="name" placeholder="Ваше имя *">
            <input class="input-text" type="text" name="email" placeholder="Ваш email *">
            <textarea name="text" class="input-text text-area" cols="0" rows="0" placeholder="Ваше сообщение *"></textarea>
            <input class="input-btn" type="submit" value="Отправить">

            {{ csrf_field() }}
          </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="container">
    <div class="footer_bottom"><span>Copyright © 2019</span> </div>
  </div>
</footer>
