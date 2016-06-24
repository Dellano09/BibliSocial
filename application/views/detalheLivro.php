

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

              <h3 class="box-title">Detalhe Livro</h3>
              <!-- tools box -->
              
              <div class="pull-right box-tools">
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <br>
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
                        <b>Qtd Pessoa Avaliaram: </b><?php echo $dados->mediaestrelas->qtd; ?>
                      </div>
                      <div class="form-group">
                        <b>Total de Estrelas: </b><?php echo $dados->mediaestrelas->qtdestrelas; ?>
                      </div>
                      <div class="form-group">
                        <table>
                          <tr>
                            <td><b>Avaliação Geral</b></td>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><div style="height: '10px' ;"  id="" class="rating">
                            <?php for ($i=1; $i <=5 ; $i++) :?>
                              <?php 
                                if ($dados->mediaestrelas->qtd>0)
                                  $qtd= $dados->mediaestrelas->qtdestrelas / $dados->mediaestrelas->qtd; 
                                else
                                  $qtd=0;

                              ?>
                              <div class="star <?php if ($i <=$qtd) echo "on"; ?>">
                                <a title="1" style="width: 100%;"></a>
                              </div>
                            <?php endfor; ?>
                          </div></td>
                          </tr>
                        </table>
                      </div> 
                    </div>
                  </div>
                  <?php if(!empty($dados->comentarioeavaliacoes) and count($dados->comentarioeavaliacoes)>0): ?>
                    <?php foreach ($dados->comentarioeavaliacoes as $key => $comentarioeavaliacoes) :?>
                      <div class="row">
                        <div class="col-md-10">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-12"><b><?php echo $comentarioeavaliacoes->NomeUsuario; ?></b></div>
                            </div>
                          </div>
                          <div class="form-group">
                            <?php if ($comentarioeavaliacoes->Tipo==1){ ?>
                              <div class="row">
                                <div class="col-md-12">
                                  <table>
                                    <tr>
                                      <td><b>Avaliou</b></td>
                                      <td>&nbsp;&nbsp;&nbsp;</td>
                                      <td> <?php
                                      if($comentarioeavaliacoes->Estrela != -1){?>
                                      <div style="height: '10px' ;"  id="" class="rating">
                                      <?php for ($i=1; $i <=5 ; $i++) :?>
                                        <div class="star <?php if ($i <= $comentarioeavaliacoes->Estrela) echo "on"; ?>">
                                          <a title="1" style="width: 100%;"><?php echo $i; ?></a>
                                        </div>
                                      <?php endfor; ?>
                                    </div>
                                      <?php }?>
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                            <?php } else if ($comentarioeavaliacoes->Tipo==2){ ?>
                              <div class="row">
                                <div class="col-md-2"><b>Curtiu </b></div>
                              </div>
                            <?php } else if ($comentarioeavaliacoes->Tipo==3){ ?>
                              <div class="row">
                                <div class="col-md-1"><b>Comentou </b></div>
                                <?php  echo "<div class='col-md-10'>$comentarioeavaliacoes->Comentario </div>";?> 
                              </div>
                            <?php } ?>
                          </div>
                          <div class="form-group">
                            <?php if ($comentarioeavaliacoes->Tipo==1 ){
                              echo $comentarioeavaliacoes->Comentario;
                            } ?>
                          </div>
                        </div>
                      </div>
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
  