<!-- banner -->
<div id="banner">
  <div class="container">
    <h2 class="title-banner">FAQ</h2>  
</div>
</div>  

<!-- konten blog -->
<div id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <h3 class="title-main">List semua pertanyaan</h3><br>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php foreach ($faqs as $key => $value): ?>
                
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                <?php echo $value->faq_question ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                          <?php echo $value->faq_answer ?>
                      </div>
                  </div>
              </div>
          <?php endforeach ?>

          
          
      </div>
  </div>
</div>
</div>
</div>