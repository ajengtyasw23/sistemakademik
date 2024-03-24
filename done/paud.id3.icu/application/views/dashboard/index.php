<main id="main" class="main">

  <div class="pagetitle ">
    <h1>DASHBOARD GURU</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <div class="col-lg-8">
        <div class="row">
          <!-- Siswa Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Jumlah Siswa</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-fill-check"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $siswa; ?></h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Siswa Card -->
          <!-- Guru Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Jumlah Guru</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-fill-check"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $guru; ?></h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Jumlah Siswa Card -->
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->