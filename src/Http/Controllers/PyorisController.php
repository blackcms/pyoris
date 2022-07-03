<?php

namespace Theme\Pyoris\Http\Controllers;

use BlackCMS\Base\Http\Responses\BaseHttpResponse;
use BlackCMS\CustomField\Models\CustomField;
use BlackCMS\SEApp\Repositories\Interfaces\LocationInterface;
use BlackCMS\Slug\Models\Slug;
use BlackCMS\Theme\Http\Controllers\PublicController;
use Exception;
use File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Seo;
use SlugHelper;
use Str;
use Theme;

class PyorisController extends PublicController
{
    /**
     * {@inheritDoc}
     */
    public function getIndex()
    {
        Seo::setTitle(__("Homepage"))->setDescription(
            __("Home page of Immoveo app")
        );

        return parent::getIndex();
    }

    /**
     * {@inheritDoc}
     */
    public function getView($key = null)
    {
        return parent::getView($key);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteMap()
    {
        return parent::getSiteMap();
    }

    /**
     * Search locations
     *
     * @bodyParam q string required The search keyword.
     *
     * @group Blog
     *
     * @param Request $request
     * @param LocationInterface $locationRepository
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     *
     * @throws FileNotFoundException
     */
    public function getSearch(
        Request $request,
        LocationInterface $locationRepository,
        BaseHttpResponse $response
    ) {
        $query = $request->input("q");

        if (!empty($query)) {
            $locations = $locationRepository->getSearch($query);
            $data = [
                "items" => Theme::partial("search", compact("locations")),
                "query" => $query,
                "count" => $locations->count(),
            ];

            if ($data["count"] > 0) {
                return $response->setData(
                    apply_filters(BASE_FILTER_SET_DATA_SEARCH, $data, 10, 1)
                );
            }
        }

        return $response
            ->setError()
            ->setMessage(
                __("No results found, please try with different keywords.")
            );
    }
}
