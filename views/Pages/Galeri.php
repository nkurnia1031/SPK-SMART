<div class="row ">
    <?php foreach ($data['a'] as $k): ?>

    <div class="col-3 mb-2">
       <a target="_blank" href="foto/<?php echo $k; ?>" >
           <img src="foto/<?php echo $k; ?>" class="img-fluid rounded" alt="Responsive image">
       </a>
    </div>
    <?php endforeach;?>


</div>
