<h2>Pantalons pour femmes</h2>

<?php if (!empty($products)): ?>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <strong><?= htmlspecialchars($product['name']) ?></strong><br>
                Prix : <?= number_format($product['price'], 2, ',', ' ') ?> €<br>
                <!-- Si tu veux ajouter une description ou un lien -->
                <p>Description: <?= htmlspecialchars($product['description']) ?></p>
                <a href="product_details.php?id=<?= $product['id'] ?>">Voir plus</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun produit trouvé.</p>
<?php endif; ?>
