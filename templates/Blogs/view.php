

<?php $this->Breadcrumbs->add([
    ['title' =>'Home', 'url' => ['controller'=>'Blogs', 'action'=>'home'], 'options'=>['class' => 'breadcrumb-item' ]],
    ['title' =>'View-'.$article->title, 'url' => ['controller'=>'Blogs', 'action'=>'view',$article->id],'options'=>['class' => 'breadcrumb-item active' ]],
]) ?>

<div class="col-8 mx-auto p-4">
    <h2 class="text-info"><?= $article->title ?></h2>
    <p><?= $article->details ?></p>
</div>
