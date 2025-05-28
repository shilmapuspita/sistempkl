<?php if ($pager): ?>
    <nav class="pagination-container">
        <ul class="pagination">
            <?php
            $currentPage = $pager->getCurrentPageNumber();
            $totalPages = $pager->getPageCount();

            // Ambil semua link dari pager
            $allLinks = [];
            foreach ($pager->links() as $link) {
                $allLinks[(int)$link['title']] = $link;
            }

            // Tampilkan halaman 1
            if (isset($allLinks[1])) {
                $link = $allLinks[1];
                $class = $link['active'] ? ' class="active"' : '';
                echo "<li{$class}><a href=\"{$link['uri']}\">1</a></li>";
            }

            // Tampilkan ... jika perlu
            if ($currentPage > 4) {
                echo '<li class="dots"><span onclick="togglePopup(this)">...</span>
                    <div class="popup-jump">
                        <form class="row" onsubmit="goToPage(event)">
                            <label>Page:</label>
                            <div class="input-group" style="flex-wrap: nowrap !important;">
                            <input type="number" min="1" max="' . $totalPages . '" name="page" required>
                            <button type="submit">Go</button>
                            </div>
                        </form>
                    </div>
                </li>';
            }

            // Tampilkan halaman sekitar current
            for ($i = $currentPage - 1; $i <= $currentPage + 1; $i++) {
                if ($i > 1 && $i < $totalPages && isset($allLinks[$i])) {
                    $link = $allLinks[$i];
                    $class = $link['active'] ? ' class="active"' : '';
                    echo "<li{$class}><a href=\"{$link['uri']}\">{$link['title']}</a></li>";
                }
            }

            // ... sebelum halaman terakhir
            if ($currentPage < $totalPages - 3) {
                echo '<li class="dots"><span onclick="togglePopup(this)">...</span>
                    <div class="popup-jump">
                        <form class="row" onsubmit="goToPage(event)">
                            <label>Page:</label>
                            <div class="input-group" style="flex-wrap: nowrap !important;">
                            <input type="number" min="1" max="' . $totalPages . '" name="page" required>
                            <button type="submit">Go</button>
                            </div>
                        </form>
                    </div>
                </li>';
            }

            // Tampilkan halaman terakhir
            if ($totalPages > 1 && isset($allLinks[$totalPages])) {
                $link = $allLinks[$totalPages];
                $class = $link['active'] ? ' class="active"' : '';
                echo "<li{$class}><a href=\"{$link['uri']}\">{$link['title']}</a></li>";
            } ?>
        </ul>
    </nav>

    <script>
        function togglePopup(el) {
            const popup = el.nextElementSibling;
            popup.style.display = (popup.style.display === 'block') ? 'none' : 'block';
        }

        function goToPage(event) {
            event.preventDefault();
            const form = event.target;
            const page = form.page.value;
            const url = new URL(window.location.href);
            url.searchParams.set('page', page);
            window.location.href = url.toString();
        }
    </script>

<?php endif ?>