<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true);
?>

<? if ($arResult['SORT_FIELD_NUMBER'] > 0) : ?>
	<div class="sort" id="<?= $arParams['VAR_COOKIE_NAME'] ?>"><span class="default" title="Сбросить сортировку">Сортировать по</span>: 
		<? foreach ($arResult['ITEMS'] as $key => $value) : ?>
			<p><a class="sort_a <?= $value['ACTIVE'] == true ? "active" : "" ?>" data-sort-active="<?=$value['ACTIVE']==true?1:0?>" data-sort-value='<?= $key ?>' href=""><?= $value['NAME'] ?></a></p><?= $key !== ($arResult['SORT_FIELD_NUMBER'] - 1) ? "&nbsp;•&nbsp;" : "" ?>
		<? endforeach; ?>
	</div>
<? else : ?>
	<p style="font-size:16px;color:red;font-style:bold;text-align-center;">
		<? echo  GetMessage('NOT_RESULT'); ?>
	</p>
<? endif; ?>

<script>
	document.dmbgeo_catalog_sort = {
		"VAR_COOKIE_NAME": "<?= $arResult['VAR_COOKIE_NAME']; ?>",
		"SORT_FIELD_NUMBER": <?= $arResult['SORT_FIELD_NUMBER']; ?>,
		"BITRIX_CATALOG_SORT": <?= $arResult['BITRIX_CATALOG_SORT']; ?>
	};
</script>