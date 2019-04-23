<?php include 'common/header.php' ?>

    <section class="slide whiteSlide hideForMobile home" id="home" name="home" style="background-image: url('assets/img/home-K.jpg'); background-repeat: no-repeat; background-position: center center; background-attachment: fixed; background-size: cover;" data-midnight="menudefault">
      <div class="content">
        <div class="container">
          <div class="wrap">
            <div class="katana-10-12" id="vidbg">
              <!--
                Anh comment tag video, rồi uncomment tag iframe
                Sau khi chèn embed của Youtube, anh thêm class="fullvid" vào nhé
              -->
              <?php
              $url = '';

              if(isset($home)){
                $url = $home['url'];
              }
              ?>
              <iframe class="fullvid" id="kantana_cover" src="<?php echo $url;?>" width="1280" height="720" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              <!-- <iframe class="fullvid" id="kantana_cover" src="https://player.vimeo.com/video/260001330?autoplay=1&loop=1&autopause=0&background=1" width="1280" height="720" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
              <!-- <video poster="https://www.blue-zoo.co.uk/static/video/websiteloop.jpg" preload="auto" loop autoplay muted class="fullvid">
                <source src='https://www.blue-zoo.co.uk/static/video/websiteloop.mp4' type='video/mp4' />
                <source src='https://www.blue-zoo.co.uk/static/video/websiteloop.webm' type='video/webm' />
              </video> -->
              <div class="scroll_btn scroll-arrow" onclick="smoothScroll(document.getElementById('about'))" style="margin-top: 10px"><span>ABOUT US</span></div>
              <div class="video-overlay"></div>
              <!-- <div class="banner_content">
                <h1>Welcome to Katana</h1>
                <p>Hello</p>
              </div> -->
            </div>
                <div class="katana-10-12 toCenter margin-bottom-5 hello destination">
                  <div class="hello overlay_aboutus">
                     <div id="about">
                        <h1 class="hello_text">'ONE-STOP STATION TO YOUR DREAMS'</h1>
                        <br>
                        <p class="hello_text">FOUNDED IN 2008, <span style="color: #3AC3F9">KANTANA POST PRODUCTION</span> IS THE REPRESENTATIVE <br>OF THAI MEDIA* IN VIETNAM. HERE IN HCMC, WE CREATE ENGAGING STORIES<br>
                        AND PROVIDE POST-PRODUCTION SERVICES WITH LATEST DIGITAL EFFECTS.</p>
                        <p class="hello_text">A DECADE OF SOLID EXPERIENCE IN FEATURE FILMS & TVCS HAS WON US<br> THE TRUST OF NUMEROUS LOCAL AND INTERNATIONAL <a href="client.html" class="text-hightlighted">CLIENTS</a>.
                        <br>OUR DIVERSIFIED STAFFS WITH CONTINUOUSLY DEVELOPING TECHNIQUES<br> WOULD SOLVE YOUR PROBLEM SWIFTLY AND COMPETENTLY.</p>
                        <p class="hello_text">WE STRIVE FOR CLIENTS’ WHOLEHEARTED SATISFACTION,<br>
                          UPLIFTING THE AESTHETIC+CONTENT OF COMMERCIALS IN GENERAL<br>
                        & CREATING MAJOR CHANGES IN THE COMING YEARS.</p>
                        <br>
                        <p class="small_hello_text">*KANTANA GROUP : FOUNDED IN I951 BY MR. PRADIT & MR. SOMSOOK KAUARUEK</p>
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Home -->
    <div class="hideForDesktop showForMobile">
      <section class="slide whiteSlide home_mobile" id="home_mobile" name="home_mobile" style="background-image: url('assets/img/bg_video.jpg'); background-repeat: no-repeat; background-position: center center; background-attachment: fixed; background-size: cover;">
        <div class="content">
          <div class="container">
            <div class="wrap">
              <div class="katana-10-12">
                <a href="https://player.vimeo.com/video/260001330" data-lity class="video-buttons video-buttons-play">Kantana Reel</a>
                <div class="scroll_btn scroll-arrow" onclick="smoothScroll(document.getElementById('about'))" style="margin-top:10px"><span>ABOUT US</span></div>
              </div>

            </div>
          </div>

        </div>
          <div class="container">
            <div class="katana-12-12 toCenter margin-bottom-5 hello destination" style="background-image: url('assets/img/home-K.jpg'); background-repeat: no-repeat; background-position: center center; background-attachment: fixed; background-size: cover;">

              <div class="hello overlay_aboutus">
                <div id="about">
                <h1 class="hello_text">'ONE-STOP STATION TO YOUR DREAMS'</h1>
                <br>
                <p class="hello_text">FOUNDED IN 2008, <span style="color: #3AC3F9">KANTANA POST PRODUCTION</span> IS THE REPRESENTATIVE<br /> OF THAI MEDIA* IN VIETNAM. HERE IN HCMC, WE CREATE ENGAGING STORIES<br /> AND PROVIDE POST-PRODUCTION SERVICES WITH LATEST DIGITAL EFFECTS.</p>
                <p class="hello_text">A DECADE OF SOLID EXPERIENCE IN FEATURE FILMS & TVCS HAS WON US<br /> THE TRUST OF NUMEROUS LOCAL AND INTERNATIONAL <a href="client.html" class="text-hightlighted">CLIENTS</a>.
                  <br>OUR DIVERSIFIED STAFFS WITH CONTINUOUSLY DEVELOPING TECHNIQUES<br /> WOULD SOLVE YOUR PROBLEM SWIFTLY AND COMPETENTLY.</p>
                  <p class="hello_text">WE STRIVE FOR CLIENTS’ WHOLEHEARTED SATISFACTION,<br>
                    UPLIFTING THE AESTHETIC+CONTENT OF COMMERCIALS IN GENERAL<br />
                  & CREATING MAJOR CHANGES IN THE COMING YEARS.</p>
                  <br>
                  <p class="small_hello_text">*KANTANA GROUP : FOUNDED IN I951 BY MR. PRADIT & MR. SOMSOOK KAUARUEK</p>
                </div>
              </div>
            </div>
          </div>

      </section>

    </div>
    <!-- End Home -->
<?php include 'common/footer.php' ?>
