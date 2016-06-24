

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Notícias</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <?php if(!empty($dados) and count($dados)>0): ?>
                  <?php foreach ($dados as $key => $dado) :?>
                   
                    <div class="row">
                      <div class="col-md-2"><img width="100"  src="<?php echo base_url().$dado->Imagem; ?>"></div>
                      <div class="col-md-10">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-12"><b><?php echo $dado->NomeUsuario; ?></b></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <?php if ($dado->Tipo==1){ ?>
                            <div class="row">
                              <div class="col-md-12"><b>Avaliou o livro: </b><a href="<?php echo base_url()."livro/detalhe/".$dado->Codigo;?>"><?php echo $dado->Nome; ?></a></div>
                            </div>
                          <?php } else if ($dado->Tipo==2){ ?>
                            <div class="row">
                              <div class="col-md-12"><b>Curtiu o livro: </b><a href="<?php echo base_url()."livro/detalhe/".$dado->Codigo;?>"><?php echo $dado->Nome; ?></a></div>
                            </div>
                          <?php } else if ($dado->Tipo==3){ ?>
                            <div class="row">
                              <div class="col-md-12"><b>Comentou o livro: </b><a href="<?php echo base_url()."livro/detalhe/".$dado->Codigo;?>"><?php echo $dado->Nome; ?></a></div>
                            </div>
                          <?php } ?>
                        </div>
                        <div class="form-group">
                          <b>Gênero: </b><?php echo $dado->Genero; ?>
                        </div>
                        <?php if ($dado->Tipo==1 and $dado->Estrela!= -1){ ?>
                          <div class="form-group">
                            <div id="" class="rating">&nbsp;
                                <?php for ($i=1; $i <=5 ; $i++) :?>

                                  <div class="star <?php if ($i <= $dado->Estrela) echo "on"; ?>">
                                    <a title="1" style="width: 100%;"><?php echo $i; ?></a>
                                  </div>
                              <?php endfor; ?>
                            </div>
                          </div>
                        <?php } ?>
                        <div class="form-group">
                          <?php if ($dado->Tipo==1 || $dado->Tipo==3){
                            echo $dado->Comentario;
                          } ?>
                        </div>
                        <div class="form-group">
                          <a href="<?php echo base_url().'livro/curtir/'.$dado->Codigo;?>" class="btn btn-success">Curtir</a>
                          <a href="<?php echo base_url().'livro/comentar/'.$dado->Codigo;?>" class="btn btn-info">Comentar</a>
                        </div>
                        
                      </div>
                    </div>
                    <br>
                  <?php endforeach; ?>
                <?php endif; ?>
              </form>
            </div>
          </div>

        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  