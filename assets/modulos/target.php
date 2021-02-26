<div class="col-lg-4 my-3" style="overflow: hidden;">
                    <div class="card " style="overflow-y: auto;
                        max-height: 50vh;
                        padding-bottom: 5rem;">
                      <div class="card-header bg-light">
                        <h6 class="font-weight-bold mb-lg-0">Cursos agregados Recientemente</h6>
                      </div>
                      <?php
                        $cursoAgr=targetas();
                        foreach ($cursoAgr as $lista) {
                          echo '
                          <div class="card-body">
                          <div class="d-flex border-bottom pb-lg-0 pt-lg-0">
                            <div class="d-flex me-lg-3">
                              <h2 class="mb-lg-0 align-self-center"><i class="bi bi-book"></i></h2>
                            </div>
                            <div class="align-self-center d-inline-block">
                              <h6 class="d-inline-block mb-lg-0">'.$lista['nivel'].' '.$lista['jornada'].'</h6><span class="badge bg-success mx-lg-2">'.$lista['COUNT(*)'].'</span>
                              <small class="d-block text-muted">'.$lista['nom_especia'].'</small>
                            </div>
                          </div>
                        </div>
                            ';    
                        }
                      ?>
                    </div>
                  </div>