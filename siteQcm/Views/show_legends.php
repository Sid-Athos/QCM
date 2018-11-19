<div class="row">
<div class="col-xs-12" style="display:block;margin:auto">
  <div id="accordion" style="width:700px;margin:auto;margin-top:100px">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" style="margin-left:175px" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <center>Élèves avec les meilleurs moyennes
            </center>
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
      <?php
          if(!empty($res0)){
      ?>
          <table class="table" style="width:450px;border:0.5px solid #decba4;margin:auto">
          <thead>
              <tr>
              <th scope="col">Moyenne</th>
              <th scope="col">Élève</th>
              <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
          <?php
              for($i = 0;$i < count($res0);$i++){
                  ?>
                  <tr>
                  <td><?php echo $res0[$i]['Moyenne']; ?></td>
                  <td><?php echo $res0[$i]['pseudo']; ?></td>
                  <td><?php if($res0[$i]['pic'] !== "") { ?><img src="<?php echo $res0[$i]['pic'];?>" style="width:50px;height:50px;border-radius:50%;opacity: 0.75;filter: alpha(opacity=50)"><?php } ?></td>
                  </tr>
                  <?php
                      }
                  ?>
              </tbody>
              </table>
              <?php
          } else {
              echo "Aucun élève n'a passé de QCM!";
          }
          ?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0" style="text-align:center">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Élèves avec les meilleurs notes, tout QCM confondu
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
        <?php
          if(!empty($res1)){
      ?>
          <table class="table" style="width:450px;border:0.5px solid #decba4;margin:auto">
          <thead>
              <tr>
              <th scope="col">Note</th>
              <th scope="col">Élève</th>
              <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
          <?php
              for($i = 0;$i < count($res1);$i++){
                  ?>
                  <tr>
                  <td><?php echo $res1[$i]['note']; ?></td>
                  <td><?php echo $res1[$i]['pseudo']; ?></td>
                  <td><?php if($res1[$i]['pic'] !== "") { ?><img src="<?php echo $res1[$i]['pic'];?>" style="width:50px;height:50px;border-radius:50%;opacity: 0.75;filter: alpha(opacity=50)"><?php } ?></td>
                  </tr>
                  <?php
                      }
                  ?>
              </tbody>
              </table>
              <?php
          } else {
              echo "Aucun élève n'a passé de QCM!";
          }
          ?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h5 class="mb-0" style="text-align:center">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            QCM les mieux réussis
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body" style="color:#333333;text-align:center">
        <?php
          if(!empty($res2)){
      ?>
          <table class="table" style="width:450px;border:0.5px solid #decba4;margin:auto">
          <thead>
              <tr>
              <th scope="col">Moyenne</th>
              <th scope="col">Qcm</th>
              </tr>
          </thead>
          <tbody>
          <?php
              for($i = 0;$i < count($res2);$i++){
                  ?>
                  <tr>
                  <td><?php echo $res2[$i]['Moyenne']; ?></td>
                  <td><?php echo $res2[$i]['nom']; ?></td>
                  </tr>
                  <?php
                      }
                  ?>
              </tbody>
              </table>
              <?php
          } else {
              echo "Aucun élève n'a passé de QCM!";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>