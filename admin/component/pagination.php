<div class="d-flex justify-content-between align-items-center mt-4">
    <div class="text-muted">
        <?php
        $showing_form = $page->offset + 1;
        $showing_to = $page->offset + $total_leads_show;
        echo 'Showing ' . $showing_form . ' to ' . $showing_to . ' of ' . $page->total_row . ' entries';
        ?>
    </div>
    <nav>
        <ul class="pagination mb-0">
            <?php
            if (isset($_GET['page'])) {
                unset($_GET['page']);
            }

            if ($page->previous_page > 0) {
                echo '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $page->previous_page . '&' . http_build_query($_GET) . '" tabindex="-1">
                        <i class="mdi mdi-chevron-left"></i> Previous
                    </a></li>';
            } else {
                echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">
                        <i class="mdi mdi-chevron-left"></i> Previous
                    </a></li>';
            }

            for ($i = 4; $i >= 1; $i--) {
                $n = $page->page - $i;
                if ($n > 0) {
                    echo '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $n . '&' . http_build_query($_GET) . '">' . $n . '</a></li>';
                }
            }
            echo '<li class="page-item active"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $page->page . '&' . http_build_query($_GET) . '">' . $page->page . '</a></li>';

            for ($i = 1; $i <= 4; $i++) {
                $n = $page->page + $i;
                if ($n <= $page->total_page) {
                    echo '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $n . '&' . http_build_query($_GET) . '">' . $n . '</a></li>';
                }
            }

            if ($page->next_page <= $page->total_page) {
                echo '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $page->next_page . '&' . http_build_query($_GET) . '">
                        Next <i class="mdi mdi-chevron-right"></i>
                    </a></li>';
            } else {
                echo '<li class="page-item disabled"><a class="page-link" href="#">
                        Next <i class="mdi mdi-chevron-right"></i>
                    </a></li>';
            }
            ?>
        </ul>
    </nav>
</div>