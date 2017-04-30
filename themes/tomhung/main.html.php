<!-- Each article post -->

<?php foreach ($posts as $p): ?>
<article class="post type-post hentry <?php if (!empty($p->image) || !empty ($p->audio) || !empty ($p->video)):?>has-post-thumbnail<?php endif;?>">
    
    <?php if (!empty($p->image)):?>
    <div class="post-thumbnail">
        <img style="width:100%;" title="<?php echo $p->title; ?>" alt="<?php echo $p->title; ?>" class="attachment-post-thumbnail wp-post-image" src="<?php echo $p->image; ?>">
    </div>
    <?php endif; ?>

    <?php if (!empty($p->audio)):?>
    <div class="post-thumbnail">
        <iframe width="100%" height="200px" class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
    </div>
    <?php endif; ?>

    <?php if (!empty($p->video)):?>
    <div class="post-thumbnail">
        <iframe width="100%" height="315px" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $p->video; ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <?php endif; ?>

    <?php if (!empty($p->quote)):?>
    <div class="post-blockquote">
        <blockquote class="quote"><?php echo $p->quote ?></blockquote>
    </div>
    <?php endif; ?>

    <!---------------------------- MAIN CONTENT ---------------------------->
    
    <!-- Title -->
    <?php if (!empty($p->link)) { ?>
    <header class="entry-header">
        <div class="post-link"><h2 class="entry-title"><a target="_blank" href="<?php echo $p->url; ?>"><?php echo $p->title; ?></a></h2></div>
    </header>
    <?php } else { ?>
    <header class="entry-header">
        <h2 class="entry-title"><a href="<?php echo $p->url; ?>"><?php echo $p->title; ?></a></h2>
    </header>
    <?php } ?>
    <div class="entry-date">
      <span class="posted-on">
        <time class="entry-date published updated"><?php echo date('F d, Y', $p->date) ?></time>
      </span>
    </div>

    <!-- 450 char snippet -->
    <div class="entry-content">
        <?php echo get_teaser($p->body, $p->url); ?>
        <?php if (config('teaser.type') === 'trimmed'):?>
        <div class="more-link">
          <a href="<?php echo $p->url; ?>">Continue reading</a>
        </div>
        <?php endif;?>
    </div>
</article>
<?php endforeach; ?>

<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
<div class="navigation pagination">
    <div class="nav-links">
        <?php if (!empty($pagination['prev'])): ?>
            <a class="prev page-numbers" href="?page=<?php echo $page - 1 ?>">«</a>
        <?php endif; ?>
        <span class="page-numbers"><?php echo $pagination['pagenum'];?></span>
        <?php if (!empty($pagination['next'])): ?>
            <a class="next page-numbers" href="?page=<?php echo $page + 1 ?>">»</a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
