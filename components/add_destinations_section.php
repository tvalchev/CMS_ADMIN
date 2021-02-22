<?php
require_once ("../lib/Database.php");
require_once ("../modules/Destination.php");
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
            Дестинации
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Дестинации
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Име</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Име</th>
                                        <th>Действие</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                  <?php
                                      $destinations= new Destination;
                                      $result = $destinations->getAllDestinations();
                                      foreach ($result as $row) {
                                        echo "<tr>";
                                        echo '<td>'.$row->destinations_id.'</td>';
                                        echo '<td>'.$row->destinations_name.'</td>';
                                        echo '<td><a href="actions/delete_destination?delete='.$row->destinations_id.'"><i class="material-icons">delete_forever</i></a></td>';
                                        echo "</tr>";
                                      }
                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Добави Дестинация
                        </h2>
                    </div>
                    <div class="body">
                        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>" id="add_destination">
                            <label for="destination">Дестинация</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="destination" class="form-control" placeholder="Име на дестинацията" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="submit-destination">Добави</button>
                            </div>
                            <div class="form-group">
                              <div class="alert alert-success hidden" id="add_destination_succeed">
                                Дестинацията е добавена!
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="alert alert-danger hidden" id="add_destination_failed">
                                  Грешка при добавяне на дестинация!
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
