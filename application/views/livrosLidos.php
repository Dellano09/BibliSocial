

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

              <h3 class="box-title">Livros Lidos</h3>
              <!-- tools box -->
              
              <div class="pull-right box-tools">
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="row">
                  <div class="col-md-2">Pesquisar por nome:</div>
                  <div class="col-md-2"><input type="text" name="pesquisar" class="form-control" ></div>
                  <div class="col-md-2"><input type="submit" name="acao" class="btn btn-primary" value="Pesquisar" ></div>
                </div>
                <br>
                <?php if(!empty($dados) and count($dados)>0): ?>
                  <?php foreach ($dados as $key => $dado) :?>
                    <div class="row">
                      <div class="col-md-2"><img width="100"  src="<?php echo base_url().$dado->Imagem; ?>"></div>
                      <div class="col-md-10">
                        <div class="form-group">
                          <b>Nome:</b> <a href="<?php echo base_url()."livro/detalhe/".$dado->Codigo;?>"><?php echo $dado->Nome; ?></a>
                        </div>
                        <div class="form-group">
                          <b>Gênero: </b><?php echo $dado->Genero; ?>
                        </div>
                        <div class="form-group">
                          <a href="<?php echo base_url().'livro/avaliar/'.$dado->Codigo;?>" class="btn btn-success">Avaliar</a>
                          <a href="<?php echo base_url().'livro/remover/'.$dado->Codigo;?>" class="btn btn-danger">Remover</a>
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
  