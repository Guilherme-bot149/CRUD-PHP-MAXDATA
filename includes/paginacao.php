    <!-- PAGINAÇÃO DE REGISTROS -->

    <nav aria-label="Paginação">
        <ul style="text-align: center;" class="pagination">
            <?php

               if($pagina > 1){
                ?>
            <?php
             echo "
                <a class=\"page-link active\" href=\"?&pagina=1#paginacao\">
                    <span aria-hidden=\"true\">Inicio</span>
                </a>"
            ?>
            <li class="page-item">
                <a class="page-link active" href="?&pagina=<?php echo $pagina-1?>#paginacao" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php 
            }
            
            for($i=1;$i<=$totalPagina;$i++){

                if($i>=($pagina-2) && $i <= ($pagina+2)){
                    if($i==$pagina){
                        echo $i;
                    }else{
                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?&pagina=$i#paginacao\">$i</a></li>";
                    }
                }
            }

            if($pagina < ($totalPagina)){
                ?>
            <li class="page-item">
                <a class="page-link active" href="?&pagina=<?php echo $pagina+1?>#paginacao" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <?php
             echo "
             <a class=\"page-link active\" href=\"?&pagina=$totalPagina&#paginacao\">
                 <span aria-hidden=\"true\">Fim</span>
             </a>"
            ?>
            <?php }?>
        </ul>
    </nav>