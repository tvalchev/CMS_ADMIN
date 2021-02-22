<?php
require_once ("../lib/Database.php");
require_once ("../modules/Account.php");
?>


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Потребители
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Всички портребители
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Потребителско име</th>
                                        <th>Парола</th>
                                        <th>Кога е регистриран</th>
                                        <th>Активност</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Потребителско име</th>
                                        <th>Парола</th>
                                        <th>Кога е регистриран</th>
                                        <th>Активност</th>
                                        <th>Действие</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  <?php
                                      $account = new Account;
                                      $result = $account->getAllAccounts();
                                      foreach ($result as $row) {
                                        echo "<tr>";
                                        echo '<td>'.$row->account_name.'</td>';
                                        echo '<td>'.$row->account_passwd.'</td>';
                                        echo '<td>'.$row->account_reg_time.'</td>';
                                        echo '<td>'.$row->account_enabled.'</td>';
                                        echo '<td><a href="actions/delete_account?delete='.$row->account_id.'"><i class="material-icons">delete_forever</i></a></td>';
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
                            Добави потребител
                        </h2>
                    </div>
                    <div class="body">
                        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>" id="add_acc_form">
                            <label for="username">Потребителско име</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="username" class="form-control" placeholder="Потребителско име" autocomplete="off" required>
                                </div>
                            </div>
                            <label for="password">Парола</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="password" class="form-control" placeholder="Парола" autocomplete="off" required>
                                </div>
                            </div>
                            <label for="confirm_password">Повтори парола</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="confirm_password" class="form-control" placeholder="Повтори парола" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <input type="submit" id="add_account" class="btn btn-primary m-t-15 waves-effect" value="Добави!"> -->
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="submit-registration">Добави</button>
                            </div>
                            <div class="form-group">
                              <div class="alert alert-success hidden" id="add_acc_succeed">
                                  Потребителят е добавен!
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="alert alert-danger hidden" id="add_acc_failed">
                                  Грешка при добавяне на потребител!
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="alert alert-danger hidden" id="add_acc_pass_failed">
                                  Паролата не съвпада!
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
