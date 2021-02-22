<?php
require_once ("../lib/Database.php");
require_once ("../modules/Offers.php");
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Преглед на офертите
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Преглед на офертите
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Име на офертата</th>
                                        <th>Доставчик</th>
                                        <th>Дата</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Име на офертата</th>
                                        <th>Доставчик</th>
                                        <th>Дата</th>
                                        <th>Действие</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                  <?php
                                      $offers = new Offers;
                                      $result = $offers->getAllOffers();
                                      foreach ($result as $row) {
                                        echo "<tr>";
                                        echo '<td>'.$row->offers_id.'</td>';
                                        echo '<td>'.$row->offers_title.'</td>';
                                        echo '<td>'.$row->offers_supplier.'</td>';
                                        echo '<td>'.$row->offers_date.'</td>';
                                        echo '<td><a href="actions/delete_offer?delete='.$row->offers_id.'" title="Премахни"><i class="material-icons">delete_forever</i></a>
                                                  <a href="edit_offer?edit='.$row->offers_id.'" title="Редактирай"><i class="material-icons">edit</i></a></td>';
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
    </div>
</section>
