

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

              <h3 class="box-title">Perfil</h3>
              <!-- tools box -->
              
              <div class="pull-right box-tools">
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <br>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <b>Nome:</b> <?php echo $dado->Nome; ?>
                      </div>
                      <div class="form-group">
                        <b>Cadastro: </b><?php echo $dado->CadastroData; ?>
                      </div>
                       <div class="form-group">
                        <b>Último Login: </b><?php echo $dado->UltimoLogin; ?>
                      </div>
                      <div class="form-group">
                        <a href="<?php echo base_url().'livro/meusLivros'?>" class="btn btn-success">Meus Livros</a>
                        <a href="<?php echo base_url().'livro/livrosLidos'?>" class="btn btn-info">Livros Livros</a>
                      </div>
                      
                    </div>
                  </div>
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
  