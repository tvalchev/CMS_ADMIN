<?php

if(isset($_GET['edit'])){

require_once ("../lib/Database.php");
require_once ("../modules/Destination.php");
require_once ("../modules/Offers.php");

$offers = new Offers;

$offer = $offers->getOffersById($_GET['edit']);

?>

<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Редактиране на оферта
                        </h2>
                    </div>
                     <div class="body">
                         <form method="post" action="<?=$_SERVER['PHP_SELF'];?>" id="edit_offer_form">

                            <label for="offer_id">Оферта Номер</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo 'value="'.$offer->offers_id.'"';?> type="text" id="offer_id" class="form-control"  autocomplete="off" readonly="readonly" required>
                                </div>
                            </div>

                            <label for="title">Заглавие на офертата</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo 'value="'.$offer->offers_title.'"';?> type="text" id="title" class="form-control" placeholder="Заглавие на офертата" autocomplete="off" required>
                                </div>
                            </div>

                            <label for="title_short">Заглавие на офертата - съкратена версия(това се показва при общите оферти)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo 'value="'.$offer->offers_title_short.'"';?> type="text" id="title_short" class="form-control" placeholder="Заглавие на офертата - съкратена версия" autocomplete="off" required>
                                </div>
                            </div>

                            <label for="destination">Дестинация</label>
                            <div class="form-group">
                                <select <?php echo 'value="'.$offer->offers_destination.'"';?> id="destination" class="form-control show-tick" required>
                                    <?php
                                        $destinations= new Destination;
                                        $result = $destinations->getAllDestinations();
                                        foreach ($result as $row) {
                                            if (strcmp($offer->offers_destination, $row->destinations_name) !== 0){
                                                echo '<option>'.$row->destinations_name.'</option>';
                                            }
                                            else{
                                                echo '<option selected>'.$row->destinations_name.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                            <label for="offer_img">Добави профилна снимка</label>
                            <div class="form-group">
                                <div class="fallback">
                                    <input name="file" type="file" accept=".jpg, .jpeg, .png" />
                                </div>
                            </div>

                            <label for="transport_type">Вид транспорт</label>
                            <div class="form-group">
                                <select id="transport_type" class="form-control show-tick">
                                    <?php
                                        $transport_type = array(
                                            'Самолет',
                                            'Автобус',
                                            'Собствен транспорт'
                                        );

                                        foreach ($transport_type as &$value) {
                                            echo $value;
                                            if (strcmp($offer->offers_transport_type, $value) !== 0){
                                                echo '<option>'.$value.'</option>';
                                            }
                                            else{
                                                echo '<option selected>'.$value.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                       
                            <label for="route">Маршрут</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo 'value="'.$offer->offers_route.'"';?> type="text" id="route" class="form-control" placeholder="Маршрут" autocomplete="off" required>
                                </div>
                            </div>

                            <label for="duration">Продължителност</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo 'value="'.$offer->offers_duration.'"';?> type="text" id="duration" class="form-control" placeholder="Продължителност" autocomplete="off" required>
                                </div>
                            </div>

                            <label for="add_information">Допълнителна информация(показва се като кратък текст, след като се зареди офертата - Самолетна екскурзия + почивка с група)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo 'value="'.$offer->offers_add_information.'"';?> type="text" id="add_information" class="form-control" placeholder="Информация" autocomplete="off">
                                </div>
                            </div>

                            <label for="price">Цена от</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo 'value="'.$offer->offers_price.'"';?> type="text" id="price" class="form-control" placeholder="Цена от" autocomplete="off" required>
                                </div>
                            </div>

                            <label for="date">Дата(Ако са повече от 1, добавете първата дата с от ...)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input <?php echo 'value="'.$offer->offers_date.'"';?> type="text" id="date" class="form-control" placeholder="Дата" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label for="program">Програма</label>
                                    <textarea name="ckeditor" id="program" required>
                                        <?php echo $offer->offers_program;?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace( 'program' );
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="prices">Цени</label>
                                    <textarea name="ckeditor" id="prices" required>
                                        <?php echo $offer->offers_prices;?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace( 'prices' );
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label for="conditions">Условия</label>
                                    <textarea name="ckeditor" id="conditions" required>
                                        <?php echo $offer->offers_conditions;?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace( 'conditions' );
                                    </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label for="excursions">Допълнителни екскурзии</label>  
                                    <textarea name="ckeditor" id="excursions">
                                        <?php echo $offer->offers_excursions;?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace( 'excursions' );
                                    </script>
                                </div>
                            </div>
                            
                            <label for="last_minute">Last minute</label>
                            <div class="switch">
                                <?php 
                                if($offer->offers_last_minute == 1){
                                ?>
                                    <label>НЕ<input type="checkbox" id="last_minute" checked><span class="lever switch-col-red"></span>ДА</label>
                                <?php 
                                }
                                else {
                                ?>
                                    <label>НЕ<input type="checkbox" id="last_minute" unchecked><span class="lever switch-col-red"></span>ДА</label>
                                <?php 
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="supplier">Доставчик</label>
                                <div class="form-line">
                                    <input <?php echo 'value="'.$offer->offers_supplier.'"';?> readonly="readonly" type="text" id="supplier" class="form-control" placeholder="Доставчик" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" id="submit-offer">Запази</button>
                                <a href="review_offers" class="btn btn-warning m-t-15 waves-effect">Назад</a>
                            </div>
                            <div class="form-group">
                              <div class="alert alert-success hidden" id="add_offer_succeed">
                                  Промените са запазени!
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="alert alert-danger hidden" id="add_offer_failed">
                                  Грешка при запазване на промените!
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

   
<?php
}
?>