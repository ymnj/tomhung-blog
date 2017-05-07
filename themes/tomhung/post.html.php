
<!-- An individual blog post. -->

<article class="post type-post hentry <?php if (!empty($p->image) || !empty ($p->audio) || !empty ($p->video)):?>has-post-thumbnail<?php endif;?>">
    <?php if (!empty($p->image)):?>
    <div class="post-thumbnail">
        <img style="width:100%;" title="<?php echo $p->title; ?>" alt="<?php echo $p->title; ?>" class="attachment-post-thumbnail wp-post-image" src="<?php echo $p->image; ?>">
    </div>
    <?php endif; ?>

		<?php if (login()) { echo tab($p); } ?>

		<div class="cat-links">
        <span><?php echo $p->ct; ?></span>
    </div>

    <header class="entry-header">
      <?php if (!empty($p->link)) {?>
          <div class="post-link"><h1 class="entry-title"><a href="<?php echo $p->link ?>" target="_blank"><?php echo $p->title; ?></a></h1></div>
      <?php } else { ?>
          <h1 class="entry-title"><?php echo $p->title; ?></h1>
      <?php } ?>
    </header>

    <div class="entry-date">
      <span class="posted-on">
        <time class="entry-date published updated"><?php echo date('F d, Y', $p->date) ?></time>
      </span>
    </div>

    <div class="entry-content">
        <?php echo $p->body; ?>
    </div>
    <style>.related {padding-bottom:2em;}.related p {margin-top:0;margin-bottom:0.5em;} .related ul {margin-left:1em;}</style>

    <div class="related entry-content">
        <hr>
        <p><strong>Related Posts</strong></p>
        <?php echo get_related($p->related);?>
    </div>

    <footer class="entry-footer">
        <span class="cat-links">
          Category: <?php echo $p->category; ?>
        </span>
   
        <?php if (disqus_count()) { ?>
            <span class="comments-link"><a href="<?php echo $p->url ?>#disqus_thread"> comments</a></span>
        <?php } elseif (facebook()) { ?>
            <span class="comments-link"><a href="<?php echo $p->url ?>#comments"><span><fb:comments-count href=<?php echo $p->url ?>></fb:comments-count> comments</span></a></span>
        <?php } ?>

        <nav role="navigation" class="navigation post-navigation">
    <div class="nav-links">
        <?php if (!empty($prev)): ?>
            <div class="nav-previous"><a rel="prev" href="<?php echo($prev['url']); ?>"><span aria-hidden="true" class="meta-nav">Previous</span> <span class="screen-reader-text">post:</span> <span class="post-title"><?php echo($prev['title']); ?></span></a></div>
        <?php endif; ?>
        <?php if (!empty($next)): ?>
            <div class="nav-next"><a rel="next" href="<?php echo($next['url']); ?>"><span aria-hidden="true" class="meta-nav">Next</span> <span class="screen-reader-text">post:</span> <span class="post-title"><?php echo($next['title']); ?></span></a></div>
        <?php endif; ?>
    </div>
</nav>
    </footer>
</article>

<?php if (disqus()): ?>
    <?php echo disqus($p->title, $p->url) ?>
<?php endif; ?>
<?php if (disqus_count()): ?>
    <?php echo disqus_count() ?>
<?php endif; ?>
<?php if (facebook() || disqus()): ?>
<div class="comments-area" id="comments">
    <?php if (facebook()): ?>
        <div class="fb-comments" data-href="<?php echo $p->url ?>" data-numposts="<?php echo config('fb.num') ?>" data-colorscheme="<?php echo config('fb.color') ?>"></div>
    <?php endif; ?>
    <?php if (disqus()): ?>
        <div id="disqus_thread"></div>
    <?php endif; ?>
</div>
<?php endif; ?>