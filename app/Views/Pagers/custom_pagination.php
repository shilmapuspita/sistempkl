<?php if ($pager): ?>
    <nav class="pagination-container">
        <ul class="pagination">
            <!-- Tombol Previous -->
            <?php if ($pager->hasPrevious()) : ?>
                <li class="prev">
                    <a href="<?= $pager->getFirst() ?>">« First</a>
                </li>
                <li class="prev">
                    <a href="<?= $pager->getPrevious() ?>">‹ Prev</a>
                </li>
            <?php endif ?>

            <!-- Menampilkan hanya beberapa halaman pertama, saat ini, dan terakhir -->
            <?php
           $currentPage = $pager->getCurrentPageNumber();
           $totalPages = $pager->getPageCount();           
            ?>

            <?php foreach ($pager->links() as $link) : ?>
                <?php if ($link['active']) : ?>
                    <li class="active"><a href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
                <?php elseif ($link['title'] <= 3 || $link['title'] > ($totalPages - 3) || abs($link['title'] - $currentPage) <= 2) : ?>
                    <li><a href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
                <?php elseif ($link['title'] == 4 || $link['title'] == ($totalPages - 3)) : ?>
                    <li class="dots">...</li>
                <?php endif ?>
            <?php endforeach ?>

            <!-- Tombol Next -->
            <?php if ($pager->hasNext()) : ?>
                <li class="next">
                    <a href="<?= $pager->getNext() ?>">Next ›</a>
                </li>
                <li class="next">
                    <a href="<?= $pager->getLast() ?>">Last »</a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
<?php endif ?>
