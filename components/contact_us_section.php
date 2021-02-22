<?php
require_once ("../lib/Database.php");
require_once ("../modules/ContactUs.php");
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Съобщения от клиенти
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Всички съобщения
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Име</th>
                                        <th>Имейл</th>
                                        <th>Как ни открихте</th>
                                        <th>Съобщение</th>
                                        <th>Дата</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Име</th>
                                        <th>Имейл</th>
                                        <th>Как ни открихте</th>
                                        <th>Съобщение</th>
                                        <th>Дата</th>
                                        <th>Действие</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                  <?php
                                      $contact = new ContactUs;
                                      $result = $contact->getAllMessages();
                                      foreach ($result as $row) {
                                        echo "<tr>";
                                        echo '<td>'.$row->name.'</td>';
                                        echo '<td>'.$row->email.'</td>';
                                        echo '<td>'.$row->how_find_us.'</td>';
                                        echo '<td>'.$row->message.'</td>';
                                        echo '<td>'.$row->date.'</td>';
                                        echo '<td><a href="actions/delete_message?delete='.$row->contact_us_id.'"><i class="material-icons">delete_forever</i></a></td>';
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
