

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
              <i class="glyphicon glyphicon-sunglasses"></i>

              <h3 class="box-title">Eventos</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">

              <form action="/dellano/evento/salvar" method="post">
                <div class="form-group has-feedback">
                  <label>Descrição do Evento</label>
                  <input type="text" name="Descricao" class="form-control" placeholder="Descrição Evento" maxlength="250"  value="<?php echo @$dado->Descricao ?>">
                  <input type="hidden" name="Codigo" value="<?php echo @$dado->Codigo ?>">
                </div>
                <div class="form-group has-feedback">
                  <label>Data de Início</label>
                  <input type="date" name="DataInicio" class="form-control" placeholder="Data de Início" maxlength="250"  value="<?php echo @$dado->DataInicio ?>">
                </div>
                <div class="form-group has-feedback">
                  <label>Data de Fim</label>
                  <input type="date" name="DataFim" class="form-control" placeholder="Data de Fim" maxlength="50" value="<?php echo @$dado->DataFim ?>">
                </div>
                <div class="form-group has-feedback">
                  <label>Observação</label>
                  <textarea class="form-control" name="observacao"  placeholder="Observação"><?php echo @$dado->Observacao ?></textarea>
                </div>
                <div class="row">
                  <div class="col-xs-8">
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Salvar</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
              <h3>Usuários Participantes deste Evento</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($usuarios) and count($usuarios)>0): ?>
                    <?php foreach ($usuarios as $key => $usuario) :?>
                      <tr>
                        <td><?php echo $usuario->Nome; ?></td>
                        <td><?php echo $usuario->Email; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
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
  