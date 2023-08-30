<div>
    <h3 class="titre">Bienvenue</h3>
    <table class="tableCmdLst" style="margin-right: auto; margin-left: auto;">
        <thead>
        <tr>
            <th class="ligne">Url</th>
            <th class="ligne">Paramètre(s)</th>
            <th class="ligne">Méthode</th>
            <th class="ligne">Statut</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($listeFonction as $uneFonction): ?>
            <tr>
                <td class="ligne"><?=$uneFonction->url?></td>
                <td class="ligne"><?=$uneFonction->param?></td>
                <td class="ligne"><?=$uneFonction->method?></td>
                <td class="ligne"><?=$uneFonction->statut?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>