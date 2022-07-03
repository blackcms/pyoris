<?php

use BlackCMS\Widget\AbstractWidget;

class TaxonomiesWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var string
     */
    protected $widgetDirectory = "taxonomies";

    /**
     * TaxonomiesWidget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            "name" => __("Taxonomies"),
            "description" => __("Popular taxonomies"),
            "number_display" => 5,
        ]);
    }
}
