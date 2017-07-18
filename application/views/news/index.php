<?php foreach ($news as $news_item) { ?>
    <h3><?php echo $news_item['title']; ?></h3>
    <div><?php echo $news_item['text']; ?></div>
    <p><a href="/learnci/index.php/news/view/<?php echo $news_item['id'] ?>">查看文章</a></p>
<?php } ?>