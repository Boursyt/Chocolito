<div>
    <h3 class="titre">Test</h3>

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
        <?php foreach ($ListeTest as $unTest) : ?>
            <tr>

                <td class="ligne"><?=$unTest->id?></td>
                <td class="ligne"><?=$unTest->Nom?></td>
                <td class="ligne"><?=$unTest->Url?></td>
                <td class="ligne"><?=$unTest->Code?></td>
                <td class="ligne"><?=$unTest->date?></td>
                <td class="td-btn">
                    <form action="<?=$_GET['url']?>" method="post">
                        <button class="bouton" name="details-id_test" value="<?=$unTest->id?>">
                            voir
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
