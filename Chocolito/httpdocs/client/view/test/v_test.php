<h3 class="titre">Détails du teste</h3>
<table class="tableCmdLst" style="margin-right: auto; margin-left: auto;">
    <thead>
    <tr>
        <th class="ligne">id</th>
        <th class="ligne">Nom</th>
        <th class="ligne">url</th>
        <th class="ligne">code</th>
        <th class="ligne">Date</th>
    </tr>
    </thead>
    <tbody>

            <td class="ligne"><?=$detailTest->id?></td>
            <td class="ligne"><?=$detailTest->Nom?></td>
            <td class="ligne"><?=$detailTest->Url?></td>
            <td class="ligne"><?=$detailTest->Code?></td>
            <td class="ligne"><?=$detailTest->date?></td>
            <td class="td-btn">
            </td>
        </tr>

    </tbody>

</table>
<table class="tableCmdLst" style="margin-right: auto; margin-left: auto;">

    <tr>
        <th class="ligne">json</th>
    </tr>

        <?php
        $jsonData = json_decode($detailTest->json, true);
        if (json_last_error() === JSON_ERROR_NONE) {

            foreach($jsonData as $data) {
                echo "<tr><td class='ligne'>" . nl2br(htmlspecialchars(wordwrap(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), 100, "\n", true))) . "</td></tr>";
            }
        } else {
            echo "<tr><td class='ligne'>" . $detailTest->json . "</td></tr>";

        }


        ?>

</table>






