
    <div class="container">

    <div class="row">
        <div class="col-4">
            <h3 style="color: #fff;" class="bg-info text-capitalize p-1">Recent Post</h3>
            <ul class="list-group list-group-flush">
              <?php foreach ($articleList as $key => $articleTitle): ?>
                  <li class="list-group-item"><a href = <?= $this->Url->build(['controller'=>'Blogs', 'action'=>'view', $key])?>><?= $articleTitle ?></a></li>
              <?php endforeach; ?>
            </ul>
        </div>

        <div class="col-8">
            <div class="row">
               <div class="list-group ">
                <?php foreach($articles  as $key => $articles): ?>
                  <a href=<?= $this->Url->build(['controller'=>'Blogs', 'action'=>'view',$articles->id]) ?> class="list-group-item list-group-item-action flex-column mb-2">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><?= $articles->title ?></h5>
                      <small>3 days ago</small>
                    </div>
                    <p class="mb-1"><?= $articles->details ?></p>
                    <small>Donec id elit non mi porta.</small>
                  </a>
                 <?php endforeach; ?>
            
                 <ul class='pagination'>
                  <?= $this->Paginator->prev("<<") ?>
                  <?= $this->Paginator->numbers() ?>
                  <?= $this->Paginator->next(">>") ?>
                 </ul>
                </div>
            </div>
        </div>
    </div>

    </div>
    
    </div>
