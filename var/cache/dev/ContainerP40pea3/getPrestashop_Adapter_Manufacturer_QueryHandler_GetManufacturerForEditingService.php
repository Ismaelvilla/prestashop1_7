<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.adapter.manufacturer.query_handler.get_manufacturer_for_editing' shared service.

return $this->services['prestashop.adapter.manufacturer.query_handler.get_manufacturer_for_editing'] = new \PrestaShop\PrestaShop\Adapter\Manufacturer\QueryHandler\GetManufacturerForEditingHandler(${($_ = isset($this->services['prestashop.core.image.parser.image_tag_source_parser']) ? $this->services['prestashop.core.image.parser.image_tag_source_parser'] : $this->load('getPrestashop_Core_Image_Parser_ImageTagSourceParserService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->shop->id);
