<main>

  <section class="section wf-section">
    <div class="padding-vertical padding-40">
      <div class="container">
        <div class="flex-vertical">
          <div class="verify-content">

            <h1 class="semibolld text-align-center">Beri Penilaian kepada Kami</h1>
            <p class="blind-text width-80"><strong>Course:</strong> Nama Course yang di Nilai</p>
            <form method="post" class="form-field_wrapper" action="#" enctype="multipart/form-data" aria-label="Form" style="width: 100%;">

                <style>
                    .star {
                    cursor: pointer;
                    }

                    .star .fa-star {
                    color: gray;
                    }

                    .star.active .fa-star {
                    color: gold;
                    }
                </style>

                <div class="rating" style="margin: auto;">
                    <span class="star" data-rating="1"><i class="fas fa-star fa-4x"></i></span>
                    <span class="star" data-rating="2"><i class="fas fa-star fa-4x"></i></span>
                    <span class="star" data-rating="3"><i class="fas fa-star fa-4x"></i></span>
                    <span class="star" data-rating="4"><i class="fas fa-star fa-4x"></i></span>
                    <span class="star" data-rating="5"><i class="fas fa-star fa-4x"></i></span>
                </div>

                <input type="hidden" id="rating-input" name="rating" value="">

                <br>
                <textarea class="text-field w-input" name="review" id="review-textarea" rows="5" placeholder="Tulis ulasan Anda di sini..."></textarea>

                <input type="submit" value="SUBMIT FEEDBACK" data-wait="Please wait..." class="button is-yellow margin-top-24 w-button">
            </form>
            <br>
            <br>
            <!-- <a href="#" class="button is-yellow width-80 w-button">DOWNLOAD SERTIFIKAT</a> -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>