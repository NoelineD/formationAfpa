<div>
<div><a class="btn btn-secondary"
                 href="index.php?entite=cart&action=save">
                 Sauvegarder le panier</a></div>
<br>
<table class="table">
    <tr>
        <th>Nom du vin</th>
        <th>Quantité</th>
        <th>Action</th>
    </tr>
<?php
    foreach ($itemCarts as $key => $item) {
        echo '<tr>
            <td>' . $item[0]->getNom() . '</td>
            <td>'.$item[1].'</td>
            <td><a class="btn btn-secondary"
                 href="index.php?entite=cart&action=add&id='.$item[0]->getId().'">
                 +</a>
                 <a class="btn btn-secondary"
                 href="index.php?entite=cart&action=remove&id='.$item[0]->getId().'">
                 -</a>
            </td>
        </tr>';
    }
    echo '<tr><td colspan="2">'.$prixHt.'</td></tr>';
?>
</table>

</div>