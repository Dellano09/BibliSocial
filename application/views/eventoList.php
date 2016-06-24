

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
              <a href="<?php echo base_url().'evento/novo/'; ?>" class="btn btn-success">Novo Evento</a>
              <table class="table">
                <thead>
                  <tr>
                    <th>Descrição</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Observação</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($dados) and count($dados)>0): ?>
                    <?php foreach ($dados as $key => $dado) :?>
                      <tr>
                        <td><a href="<?php echo base_url().'evento/editar/'.$dado->Codigo; ?>"> <?php echo $dado->Descricao; ?></a></td>
                        <td><?php echo $dado->DataInicio; ?></td>
                        <td><?php echo $dado->DataFim; ?></td>
                        <td><?php echo $dado->Observacao; ?></td>
                        <td><a href="<?php echo base_url().'evento/participar/'.$dado->Codigo; ?>">Participar</td>
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
  