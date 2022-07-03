<?php

use BlackCMS\Widget\AbstractWidget;

class RecentPropertiesWidget extends AbstractWidget
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
    protected $widgetDirectory = "recent-properties";

    /**
     * RecentPropertiesWidget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            "name" => __("Recent properties"),
            "description" => __("Recent properties widget."),
            "number_display" => 5,
        ]);
    }
}
