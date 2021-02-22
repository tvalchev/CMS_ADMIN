<?php
require_once ("../lib/Database.php");
require_once ("../modules/Destination.php");
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
            Добавяне на снимки
            </h2>
        </div>
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Добавяне на снимка в галерията за оферти
                        </h2>
                    </div>
                    <div class="body">
                        <form method="post" action="<?=$_SERVER['PHP_SELF'];?>" id="add_photo_offer" enctype="multipart/form-data">
                        <!-- <form method="post" action="actions/add_photo_offer" id="add_photo_offer" enctype="multipart/form-data"> -->
                            <label for="offer_img">Добави снимка</label>
                            <div class="form-group">
                                <div class="fallback">
                                    <input title="Изберете снимка" name="file" id="file" type="file" accept=".jpg, .jpeg, .png" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="submit-offer">Добави</button>
                            </div>
                            <div class="form-group">
                              <div class="alert alert-success hidden" id="add_photo_succeed">
                                Файлът е добавен!
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="alert alert-danger hidden" id="add_photo_failed">
                                Грешка при добавяне на файл!
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
