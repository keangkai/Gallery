<!-- Content -->
    <div id="result">
        <?php while ($row = $statement->fetch_assoc()):?>
            <section>
                <header class="main">
                    <a href="showContent.php?id=<?php echo $row['id'];?>&category=<?php echo urlencode($row['Category']);?>"><h1 id="title_name"><?php echo $row['name']; ?></h1></a>
                </header>
                <!-- <span class="image main"><img src="images/test1.jpg" alt="" /></span> -->
                <a href="showContent.php?id=<?php echo $row['id'];?>&category=<?php echo urlencode($row['Category']);?>"><span class="image main"><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>'; ?></span></a>
                <a href="showContent.php?id=<?php echo $row['id'];?>&category=<?php echo urlencode($row['Category']);?>"><p><?php echo $row['Description'];?></p></a>
            </section>
        <?php endwhile; ?>
        <center>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <li><a href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>" class="page"><?php echo $i; ?></a></li>
                <?php endfor;?>
            </ul>
        </center>
    </div>