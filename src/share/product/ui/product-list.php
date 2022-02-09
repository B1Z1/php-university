<?php

/**
 * @param Product[] $products
 * @param callable|null $bottomContentCb
 * @return void
 */
function renderProductList(array $products, callable $bottomContentCb = null): void { ?>
    <dl class="up-width-full">
        <?php foreach ($products as $product): ?>
            <div data-product="<?php echo $product->id; ?>"
                 data-product-name="<?php echo $product->name; ?>"
                 data-product-description="<?php echo $product->description; ?>"
                 data-product-price="<?php echo $product->price; ?>"
                 class="column">
                <dt class="mb-4">
                    <h4 class="subtitle">
                        <b><?php echo $product->name; ?></b>
                    </h4>
                </dt>

                <dd class="mb-4">
                    <?php echo $product->description; ?>
                </dd>

                <?php if ($bottomContentCb): ?>

                    <div class="is-flex is-align-items-center is-justify-content-end">
                        <?php $bottomContentCb($product); ?>
                    </div>

                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </dl>
<?php }
