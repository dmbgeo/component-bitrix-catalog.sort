<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */


function _var($var)
{
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
}

// if (!isset($arParams['SORT_FIELDS_NAME']))
// 	$arParams['SORT_FIELDS_NAME'] = '';
// if (!isset($arParams['SORT_FIELDS_VALUE']))
// 	$arParams['SORT_FIELDS_VALUE'] = '';
// if (!isset($arParams['FILTER_NAME']))
// 	$arParams['FILTER_NAME'] = 'arrFilter';

$arResult = array();
// if (!isset($_COOKIE['BADSROOM_CATALOG_SORT'])) {
// 	setcookie("BADSROOM_CATALOG_SORT", 'property_AFP_PRICE=ASC');
// } else {
// 	$sort_rab = explode("=", $_COOKIE['BADSROOM_CATALOG_SORT']);
// 	if (isset($sort_rab[0])) {
// 		$sort = $sort_rab[0];
// 	} else {
// 		$sort = "property_AFP_PRICE";
// 	}
// 	if (isset($sort_rab[1])) {
// 		$order = $sort_rab[1];
// 	} else {
// 		$order = "ASC";
// 	}
// }
foreach ($arParams['SORT_FIELDS_NAME'] as $key => $value) {
	if (isset($arParams['SORT_FIELDS_NAME'][$key]) && isset($arParams['SORT_FIELDS_VALUE'][$key])) {
		if ($arParams['SORT_FIELDS_NAME'][$key] != "" && $arParams['SORT_FIELDS_VALUE'][$key] != "") {
			$sort_rab = explode("=", $arParams['SORT_FIELDS_VALUE'][$key]);
			if (isset($sort_rab[0])) {
				$sort = $sort_rab[0];
			} else {
				$sort = $arParams['SORT_FIELDS_VALUE'][$key];
			}
			if (isset($sort_rab[1])) {
				$order = $sort_rab[1];
			} else {
				$order = "ASC";
			}
			$order = strtoupper($order);
			$arResult['ITEMS'][] = array('NAME' => $arParams['SORT_FIELDS_NAME'][$key], "SORT" => $sort, "ORDER" => $order, "ACTIVE" => false);
		}
	}
}

$SORT_FIELD_NUMBER = count($arResult['ITEMS']);
if (!isset($_COOKIE[$arParams['VAR_COOKIE_NAME']])) {
	$BITRIX_CATALOG_SORT = -1;
	setcookie($arParams['VAR_COOKIE_NAME'], $BITRIX_CATALOG_SORT);
} else {
	$BITRIX_CATALOG_SORT = (int)$_COOKIE[$arParams['VAR_COOKIE_NAME']];
	if ($BITRIX_CATALOG_SORT < 0 || $BITRIX_CATALOG_SORT>= $SORT_FIELD_NUMBER){
		$BITRIX_CATALOG_SORT=-1;
	}
}

if($BITRIX_CATALOG_SORT == -1){
	$GLOBALS[$arParams['VAR_COOKIE_NAME']]=array('SORT'=>$arParams['DEFAULT_SORT'],'ORDER'=>'RAND');
}

$GLOBALS[$arParams['VAR_COOKIE_NAME']]=array('SORT'=>"",'ORDER'=>"");
foreach($arResult['ITEMS'] as $key => $value){
	if($key==$BITRIX_CATALOG_SORT){
		$arResult['ITEMS'][$key]['ACTIVE']=true;
		$GLOBALS[$arParams['VAR_COOKIE_NAME']]=array('SORT'=>$value['SORT'],'ORDER'=>$value['ORDER']);
	}
}

$arResult['VAR_COOKIE_NAME']=$arParams['VAR_COOKIE_NAME'];
$arResult['BITRIX_CATALOG_SORT']=$BITRIX_CATALOG_SORT;
$arResult['SORT_FIELD_NUMBER']=$SORT_FIELD_NUMBER;
 $this->IncludeComponentTemplate();


