<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

        <?php 
            $i = 1;
            while ($i <= $total_pages + 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>

        <?php 
            $i++;
            endwhile; ?>
    </ul>
</nav> 