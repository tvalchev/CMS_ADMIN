<?php
require_once ("../lib/Database.php");
require_once ("../modules/Newsletter.php");
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Абонирани за бюлетин
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Абонирани за бюлетин
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имейл</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имейл</th>
                                        <th>Действие</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                  <?php
                                      $newsletter_emails = "";
                                      $newsletter= new Newsletter;
                                      $result = $newsletter->getAllNewsletter();
                                      foreach ($result as $row) {
                                        echo "<tr>";
                                        echo '<td>'.$row->newsletter_id.'</td>';
                                        echo '<td>'.$row->email.'</td>';
                                        echo '<td><a href="actions/delete_newsletter?delete='.$row->newsletter_id.'"><i class="material-icons">delete_forever</i></a></td>';
                                        echo "</tr>";
                                        $newsletter_emails = $newsletter_emails.';'.$row->email;
                                      }
                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CKEditor -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Прати имейл
                        </h2>
                    </div>
                    <div class="body">
                        <textarea name="ckeditor" id="ckeditor">
                            <?php
                              $newsletter_emails = substr($newsletter_emails , 1);
                              echo $newsletter_emails;
                            ?>
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'ckeditor' );
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# CKEditor -->
    </div>
</section>
