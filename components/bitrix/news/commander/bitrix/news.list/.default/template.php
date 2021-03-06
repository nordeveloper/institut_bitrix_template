<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<section>

		

		<?if($arParams["DISPLAY_TOP_PAGER"]):?>
			<?=$arResult["NAV_STRING"]?>
		<?endif;?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					
					<div class="commander-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="row">
							<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
								<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
									

							<div class="col-md-4">
										<div class="commander-img">
													<img
													class="img-responsive"
													src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
													width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
													height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
													alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
													title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
													>
										</div>
							</div>	
								<?else:?>
							<div class="col-md-4">
										<div class="commander-img">
													<img
													class="img-responsive"
													src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
													width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
													height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
													alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
													title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
													>
										</div>
							</div>	
								<?endif;?>
							<?endif?>
							
								
							<div class="col-md-8">
								<div class="commander-text">
									<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
										<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
											<h3><?echo $arItem["NAME"]?></h3>
										<?else:?>
											<h3><?echo $arItem["NAME"]?></h3>
										<?endif;?>
									<?endif;?>
									<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
										<p><?echo $arItem["PREVIEW_TEXT"];?></p>
										
									<?endif;?>
								
									<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
										<div style="clear:both"></div>
									<?endif?>
									<?foreach($arItem["FIELDS"] as $code=>$value):?>
										<small>
										<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
										</small><br />
									<?endforeach;?>
									<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
										<small>
										<?=$arProperty["NAME"]?>:&nbsp;
										<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
											<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
										<?else:?>
											<?=$arProperty["DISPLAY_VALUE"];?>
										<?endif?>
										</small><br />
									<?endforeach;?>
								</div>
							</div>
						</div>
					</div>
			
		<?endforeach;?>

</section>
	

