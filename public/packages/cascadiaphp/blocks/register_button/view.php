<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var string $registerLink */
$registerLink = $registerLink ?? null;
/** @var int $price */
$price = $price ?? null;
?>

<div class="flex pt4 pb4">
    <a class="cp-register-button" href="<?= $registerLink ?>">
        <div class="flex">
            <div class="cp-price-cell flex flex-column">
                <div class="cp-price-from">from</div>
                <div class="cp-price-price-container">
                    <div class="cp-price-price"><?= (int) $price ?></div>
                </div>
            </div>
            <div class="cp-register-cell flex">
                <span>register now</span>
            </div>
        </div>
    </a>
</div>
