<main>
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
<main>
  <section class="section wf-section">
    <div class="padding-vertical padding-40">
      <div class="container">
        <div class="flex-vertical">
          <div class="verify-content">

            <h1 class="semibolld text-align-center">Beri Penilaian kepada Kami</h1>
            <p class="blind-text width-80"><strong>Course: <?= $course->judul ?></strong></p>
            <form method="post" class="form-field_wrapper" action="<?= site_url('review/' . $course->flag . '/action') ?>" enctype="multipart/form-data" aria-label="Form" style="width: 100%;">
              <?php if(@$cekReview->num_rows() > 0): $rate = $cekReview->row()->rating; ?>
                <div class="rating" style="margin: auto;">
                  <?php for($i=1; $i<= 5; $i++){ ?>
                    <?php if($i <= $rate): ?>
                      <span class="star active" data-rating="<?= $i ?>"><i class="fas fa-star fa-4x"></i></span>
                    <?php else: ?>
                      <span class="star" data-rating="<?= $i ?>"><i class="fas fa-star fa-4x"></i></span>
                    <?php endif; ?>
                  <?php } ?>
                </div>
              <?php else: ?>
                <div class="rating" style="margin: auto;">
                  <span class="star" data-rating="1"><i class="fas fa-star fa-4x"></i></span>
                  <span class="star" data-rating="2"><i class="fas fa-star fa-4x"></i></span>
                  <span class="star" data-rating="3"><i class="fas fa-star fa-4x"></i></span>
                  <span class="star" data-rating="4"><i class="fas fa-star fa-4x"></i></span>
                  <span class="star" data-rating="5"><i class="fas fa-star fa-4x"></i></span>
                </div>
              <?php endif; ?>

              <input type="hidden" id="rating-input" name="rating" value="">
              <input type="hidden" name="courseid" value="<?= $course->id ?>">

              <br>
              <textarea class="text-field w-input" name="review" id="review-textarea" rows="10" placeholder="Tulis ulasan Anda di sini..."><?= ($cekReview->num_rows() > 0) ? $cekReview->row()->review : '' ?></textarea>
              <input type="submit" value="SUBMIT FEEDBACK" data-wait="Please wait..." class="button is-yellow margin-top-24 w-button">
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>