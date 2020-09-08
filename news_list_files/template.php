<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<? //echo '<pre>';print_r($arResult);echo '</pre>';?>


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<p class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

		<?foreach($arItem["DISPLAY_PROPERTIES"]["FILES"]["FILE_VALUE"] as $pid=>$arProperty):?>
			<p class="doc-item">
				<a
					href="<? echo $arProperty['SRC']; ?>"
					title="Скачать <? echo $arProperty['FILE_NAME']; ?>">
						<strong>
							<? echo $arProperty['ORIGINAL_NAME']; ?>
							<span> —
								<?
								$strKb = $arProperty['FILE_SIZE']/1024;
								echo round($strKb) . ' Кб';
								?>
							</span>
						</strong>
				</a>
			</p>
		<?endforeach;?>

	</p>

<?endforeach;?>

<? //echo '<pre>';print_r($arResult);echo '</pre>';?>