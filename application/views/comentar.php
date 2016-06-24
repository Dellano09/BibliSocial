

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

              <h3 class="box-title">Comentar</h3>
              <!-- tools box -->
              
              <div class="pull-right box-tools">
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="<?php echo base_url()?>/livro/salvarComentario/" method="post">
                <div class="row">
                  <div class="col-md-2"><img width="100"  src="<?php echo base_url().$dados->Imagem; ?>"></div>
                  <div class="col-md-10">
                    <div class="form-group">
                      <b>Nome:</b> <?php echo $dados->Nome; ?>
                    </div>
                    <div class="form-group">
                      <b>Gênero: </b><?php echo $dados->Genero; ?>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="avaliacao"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="hidden" value="<?php echo $dados->Codigo; ?>" name="codigoLivro" >
                      <input type="submit" value="Comentar" class="btn btn-success">
                    </div>

                    
                  </div>
                </div>
                <br>
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
  