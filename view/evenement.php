<link href="<?= BF::abs_path("CSS/evenement.css") ?>" rel="stylesheet"/>
<?php

if(BF::is_posted("id_event")){
    $id_event = $_GET["id_event"];
    $infos = BF::request("SELECT * FROM evenements WHERE id_event = ?",[$id_event],true,false,PDO::FETCH_ASSOC)[0];
    ?>
    <div class="case" style="width: 800px;<?php if(isset($_GET["iframe"]) ? 1 : 0){echo "margin: 0px;";}?>">
        <div class="titre_event">
            <?= $infos["nom_event"] ?>
        </div>
        <div>
        <?php
        //Affichage du logo
            $req = "SELECT valeur FROM prop_evenements WHERE id_event = ? AND prop_nom = ?";
            $logo = BF::request($req, [$id_event,"logo"],true,true);
            
            if(BF::equals($logo[0],"TRUE")? 1 : 0){
                foreach (glob($path."media/logo/event/".$id_event.".*") as $filename){
                    ?>
                    <img style ="width: 200px; float: left; height: 200px;" src="<?= BF::abs_path("media/logo/event/".basename($filename)) ?>">
                    <?php
                }
                ?>
            <div class="event_a_droite">
                <div class="event_infos">
                    <div class="titre_rubrique_event">
                        Date
                    </div>
                    De : <div style="float: right;"><img src="<?= BF::abs_path("media/img/calendar.png") ?>" style="width: 10px; display: inline-block;"> <?= date("Y/m/d  ",$infos["date_event_debut"]) ?><img src="<?= BF::abs_path("media/img/clock.png") ?>" style="height: 12px; display: inline-block;"><?= date(" H:i",$infos["date_event_debut"]) ?></div>
                    <div style="clear:both;"></div>
                    A : <div style="float: right;"><img src="<?= BF::abs_path("media/img/calendar.png") ?>" style="width: 10px; display: inline-block;"> <?= date("Y/m/d  ",$infos["date_event_fin"]) ?><img src="<?= BF::abs_path("media/img/clock.png") ?>" style="height: 12px; display: inline-block;"><?= date(" H:i",$infos["date_event_fin"]) ?></div>
                    <div style="clear: both"></div>
                </div>
                <div class="desc">
                    <div class="titre_rubrique_event">
                        Informations
                    </div>
                    <?php 
                        $frequence = "";
                        $freq = BF::request($req, [$id_event,"freq"],true,true);
                
                        if(BF::equals($freq[0],"annu")? 1 : 0){
                            $frequence = "Annuelle";
                        }elseif(BF::equals($freq[0],"mens")? 1 : 0){
                            $frequence = "Mensuelle";
                        }
                        elseif(BF::equals($freq[0],"hebd")? 1 : 0){
                            $frequence = "Hebdomadaire";
                        }
                        elseif(BF::equals($freq[0],"quot")? 1 : 0){
                            $frequence = "Quotidienne";
                        }
                        echo "Fréquence : ".$frequence."<br>";
                        
                        
                        $vis = "";
                        $visu = BF::request($req, [$id_event,"visu"],true,true);
                
                        if($visu[0]? 1 : 0){
                            $vis = $visu[0];
                        }
                        
                        echo " Visibilité : ".$vis;
                        ?>
                        <img src="<?= BF::abs_path("media/img/eye.png") ?>" style="width: 13px; display: inline-block;">
                        
                </div>
                
            </div>
            <div style="clear:both;">
            </div>
            <?php
            }
        ?>
        </div>
        <div style="display: flex">
            <div class="event_infos" style="flex: auto; margin-top: 5px;">
                <div class="titre_rubrique_event">
                            Description
                </div>
                <?php
                

                $desc = BF::request($req,[$id_event,"desc"],true,true);
                if($desc[0]? 1 : 0){
                    echo $desc[0];
                }
                ?>
            </div>
        </div>
    </div>
    <div style = "height: 20px;">
    </div>
    <?php
}
if(isset($_GET["iframe"]) ? 1 : 0){
    ?>
    <script>
        let body = document.body;
        body.style.width = "min-content";
        const html = document.documentElement;
        const height = body.scrollHeight;
        document.body.setAttribute("h_height",height);
        const width = body.scrollWidth;
        document.body.setAttribute("h_width",width);
    </script>
    <?php

}
?>