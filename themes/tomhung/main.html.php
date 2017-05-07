<!-- Each article post -->

<?php foreach ($posts as $p): ?>

    <a href="<?php echo $p->url; ?>">
    <article class="post type-post hentry <?php if (!empty($p->image) || !empty ($p->audio) || !empty ($p->video)):?>has-post-thumbnail<?php endif;?>">
        
        <?php if (!empty($p->image)):?>
        <div class="post-thumbnail">
            <img style="width:100%;" title="<?php echo $p->title; ?>" alt="<?php echo $p->title; ?>" class="attachment-post-thumbnail wp-post-image" src="<?php echo $p->image; ?>">
        </div>
        <?php endif; ?>

        <!---------------------------- MAIN CONTENT ---------------------------->
        
        <div class="cat-links">
            <span><?php echo $p->ct; ?></span>
        </div>

        <!-- Title -->
        <?php if (!empty($p->link)) { ?>
        <header class="entry-header">
            <div class="post-link"><h2 class="entry-title"><?php echo $p->title; ?></h2></div>
        </header>
        <?php } else { ?>
        <header class="entry-header">
            <h2 class="entry-title"><?php echo $p->title; ?></h2>
        </header>
        <?php } ?>
        <div class="entry-date">
          <span class="posted-on">
            <time class="entry-date published updated"><?php echo date('F d, Y', $p->date) ?></time>
          </span>
        </div>
    </article>
</a>
<?php endforeach; ?>

<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
<div class="navigation pagination">
    <div class="nav-links">
        <?php if (!empty($pagination['prev'])): ?>
            <a class="prev page-numbers" href="?page=<?php echo $page - 1 ?>">«</a>
        <?php endif; ?>
        
        <?php if (!empty($pagination['next'])): ?>
            <a class="next page-numbers" href="?page=<?php echo $page + 1 ?>">»</a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
